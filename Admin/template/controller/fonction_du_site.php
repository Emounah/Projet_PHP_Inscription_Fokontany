<?php
function chiffrement($text)
{
    $ciphering = "AES-128-CTR";
    $option = 0;
    $keyIV = "1234567890123456";
    $key = "ar546r312rtdoipz";
    return openssl_encrypt($text, $ciphering, $key, $option, $keyIV);
}
function dechiffrement($text)
{
    $ciphering = "AES-128-CTR";
    $option = 0;
    $keyIV = "1234567890123456";
    $key = "ar546r312rtdoipz";
    return openssl_decrypt($text, $ciphering, $key, $option, $keyIV);
}
   function insertionRegion(){
     global $db;
     $region = htmlentities($_POST['region']);
     $imgFokontany = $_FILES['imgFokontany'];
     $error=[];
     $validation = true;

     if (!empty($region) && !empty($imgFokontany)) {
        $regionExist = $db->prepare("SELECT * FROM faritra WHERE nomfaritra = ?");
        $regionExist->execute([$region]);
        $nbregion = $regionExist->rowCount();
        if ($_FILES["imgFokontany"]["error"]==0){
            if ($nbregion == 0) {
                $error [0] = "Région est inserer avec succés";
                $validation = true;
            }else{
                $error [3] = "Région est existe deja dans la base de donnée";
                $validation = false;
            }
        }else{
            $error[2] = "Impossible d'importer l'image";
            $validation =false;
        }
     }else{
         $error [1] = "Remplir le champ";
         $validation = false;
     }
     if ($validation) {
        $inserRegion = $db->prepare("INSERT INTO faritra(nomfaritra,saryregion) VALUE(:nomfaritra,:saryregion)");
        $inserRegion->execute([
            "nomfaritra"=>$region,
            "saryregion"=>$imgFokontany["name"],
        ]);
        move_uploaded_file($_FILES["imgFokontany"]["tmp_name"],'../../Public/img/image_region/'.basename($imgFokontany["name"]));
     }
     return $error;
   }

   function affichageRegion($page, $search = null, $orderById): array
{
    global $db;
    global $LIMIT;

    $startIndex = $page === 1 ? 0 : ($page * $LIMIT)-$LIMIT;

    $defaultSql = "SELECT * FROM faritra";

    $defaultSqlLimit = " limit " . $startIndex . ", " . $LIMIT;

    $defaultSqlOrder = " ORDER BY faritra.idfaritra " . $orderById . " " . $defaultSqlLimit;

    if ($search === null || $search === "") {
        $sql =  $defaultSql . $defaultSqlOrder;
        $statment = $db->query($sql);
        return [
            "faritra" => $statment->fetchAll(),
            "count" => $statment->rowCount(),
        ];
    } else {
        $sql = $defaultSql . " WHERE faritra.nomfaritra LIKE :search " . $defaultSqlOrder;
        $statment = $db->prepare($sql);
        $statment->execute([
            ":search" => "%{$search}%"
        ]);
        return [
            "faritra" => $statment->fetchAll(),
            "count" => $statment->rowCount(),
        ];
    }
}
function getRegionCount(): int
{
    global $db;
    $sql = "SELECT * FROM faritra";
    $statment = $db->query($sql);
    return $statment->rowCount();
}

function deleteentity($tablename,$id,$idname){
    global $db;
    $sql="DELETE FROM $tablename WHERE $idname=$id";
    $stmt=$db->prepare($sql);
    $stmt->execute();
}
function updateentity($table,$params,$id,$idname){
    global $db;
    $setClause='';
    $values=[];
    foreach($params as $key => $value){
       $setClause.= "$key = ?,";
       $values[]=$value;
    }
    $trimClause=trim($setClause,",");
    $sql="UPDATE $table SET $trimClause WHERE $idname=$id";
    $stmt=$db->prepare($sql);
    $stmt->execute($values);
}
function getentitybyid($tablename,$id,$idname){
    global $db;
    $sql="SELECT * FROM $tablename WHERE $idname = $id";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $NomTable=$stmt->fetchAll();
    return $NomTable;
}
function updateRegion($oldimage,$id){
    global $db;
     $region = htmlentities($_POST["region"]);
     $imgFokontany = $_FILES["imgFokontany"];
     $error=[];
     $validation = true;

     if (!empty($region)) {
        $regionExist = $db->prepare("SELECT * FROM faritra WHERE nomfaritra = ? and not idfaritra = $id");
        $regionExist->execute([$region]);
        $nbregion = $regionExist->rowCount();
        if ($nbregion == 0) {
            $error [0] = "Région est inserer avec succés";
            $validation = true;
        }else{
            $error [1] = "Région est existe deja dans la base de donnée";
            $validation = false;
        }
     }else{
         $error [2] = "Remplir le champ";
         $validation = false;
     }
     if ($validation) {
        if ($imgFokontany["name"]!="") {
            $table="faritra";
            $params = [
                "nomfaritra"=>$region,
                "saryregion"=>$imgFokontany["name"],
            ];
            if ($_FILES["imgFokontany"]["error"]==0) {
                updateentity($table,$params,$_GET['idfaritra'],"idfaritra");
                $message="Modification est effectuer avec succés";
                header("Location:listeregion.php");
                  move_uploaded_file($imgFokontany["tmp_name"],"../../Public/img/image_region/".basename($imgFokontany["name"]));
                  unlink("../../Public/img/image_region/".$oldimage);
            }else{
                $error[3] = "Impossible d'importer image";
            }
        }else{
            $table="faritra";
            $params = [
                "nomfaritra"=>$region,
                "saryregion"=>$oldimage,
            ];
            updateentity($table,$params,$_GET['idfaritra'],"idfaritra");
            $message="Modification est effectuer avec succés";
            header("Location:listeregion.php");
        }
    }
     return $error;
}

function affichageCommune($page, $search = null, $orderById): array
{
    global $db;
    global $LIMIT;

    $startIndex = $page === 1 ? 0 : ($page * $LIMIT)-$LIMIT;

    $defaultSql = "SELECT kaominina.idkaominina, kaominina.nomkaominina, (SELECT faritra.nomfaritra  from faritra where faritra.idfaritra  = kaominina.idfaritra) AS region FROM kaominina";

    $defaultSqlLimit = " limit " . $startIndex . ", " . $LIMIT;

    $defaultSqlOrder = " ORDER BY kaominina.idkaominina " . $orderById . " " . $defaultSqlLimit;

    if ($search === null || $search === "") {
        $sql =  $defaultSql . $defaultSqlOrder;
        $statment = $db->query($sql);
        return [
            "kaominina" => $statment->fetchAll(),
            "count" => $statment->rowCount(),
        ];
    } else {
        $sql = $defaultSql . " WHERE kaominina.nomkaominina LIKE :search " . $defaultSqlOrder;
        $statment = $db->prepare($sql);
        $statment->execute([
            ":search" => "%{$search}%"
        ]);
        return [
            "kaominina" => $statment->fetchAll(),
            "count" => $statment->rowCount(),
        ];
    }
}

function getCommuneCount(): int
{
    global $db;
    $sql = "SELECT * FROM kaominina";
    $statment = $db->query($sql);
    return $statment->rowCount();
}

function get($nomentity){
    global $db;
    $stmt=$db->prepare("SELECT*FROM $nomentity");
    $stmt->execute();
    $all=$stmt->fetchAll();
    return $all;
}

function insertionCommune(){
    global $db;
    $idregioncommune = intval($_POST['idregioncommune']);
    $commune = htmlentities($_POST['commune']);
    $nomregion = htmlentities($_POST['nomregion']);
    $error=[];
    $validation = true;

    if (!empty($idregioncommune) && !empty($nomregion)) {
       $error [0] = "Commune est inserer avec succés";
       $validation = true;
    }else{
        $error [1] = "Remplir les champs";
        $validation = false;
    }
    if ($validation) {
       $inserCommune = $db->prepare("INSERT INTO kaominina(idfaritra,nomkaominina) VALUE(:idfaritra,:nomkaominina)");
       $inserCommune->execute([
           "nomkaominina"=>$commune,
           "idfaritra"=>$idregioncommune,
       ]);
    }
    return $error;
}

function sqlcommune($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT kaominina.idkaominina, kaominina.nomkaominina, (SELECT faritra.nomfaritra from faritra where faritra.idfaritra  = kaominina.idfaritra) AS region FROM kaominina WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}

function updateCommune(){
    global $db;
    $idregioncommune = intval($_POST['idregioncommune']);
    $commune = htmlentities($_POST['commune']);
    $nomregion = htmlentities($_POST['nomregion']);
    $error=[];
    $validation = true;

    if (!empty($idregioncommune) && !empty($nomregion)) {
       $error [0] = "Région est inserer avec succés";
       $validation = true;
    }else{
        $error [1] = "Remplir les champs";
        $validation = false;
    }
     if ($validation) {
        $table="kaominina";
        $params = [
            "nomkaominina"=>$commune,
            "idfaritra"=>$idregioncommune,
        ];
      updateentity($table,$params,$_GET['idkaominina'],"idkaominina");
            $message="Modification est effectuer avec succés";
            header("Location:listecommune.php");
     }
     return $error;
}

function insertionDistric(){
    global $db;
    $distric = htmlentities($_POST['nomdistric']);

    $error=[];
    $validation = true;

    if (!empty($distric)) {
        $districtExist = $db->prepare("SELECT * FROM boriborintany WHERE distrika = ?");
        $districtExist->execute([$distric]);
        $nbdistrict = $districtExist->rowCount();
        if ($nbdistrict == 0) {
            $error [0] = "District est inserer avec succés";
            $validation = true;
        }else{
            $error [1] = "District est existe deja dans la base de donnée";
            $validation = false;
        }
    }else{
        $error [2] = "Remplir le champ";
        $validation = false;
    }
    if ($validation) {
       $inserDistric = $db->prepare("INSERT INTO boriborintany(distrika) VALUE(:distrika)");
       $inserDistric->execute([
           "distrika"=>$distric,
       ]);
    }
    return $error;
}
function affichageDistric($page, $search = null, $orderById): array
{
    global $db;
    global $LIMIT;

    $startIndex = $page === 1 ? 0 : ($page * $LIMIT)-$LIMIT;

    $defaultSql = "SELECT * FROM boriborintany";

    $defaultSqlLimit = " limit " . $startIndex . ", " . $LIMIT;

    $defaultSqlOrder = " ORDER BY boriborintany.idboribory  " . $orderById . " " . $defaultSqlLimit;

    if ($search === null || $search === "") {
        $sql =  $defaultSql . $defaultSqlOrder;
        $statment = $db->query($sql);
        return [
            "boriborintany" => $statment->fetchAll(),
            "count" => $statment->rowCount(),
        ];
    } else {
        $sql = $defaultSql . " WHERE boriborintany.distrika LIKE :search " . $defaultSqlOrder;
        $statment = $db->prepare($sql);
        $statment->execute([
            ":search" => "%{$search}%"
        ]);
        return [
            "boriborintany" => $statment->fetchAll(),
            "count" => $statment->rowCount(),
        ];
    }
}

function getDistricCount(): int
{
    global $db;
    $sql = "SELECT * FROM boriborintany";
    $statment = $db->query($sql);
    return $statment->rowCount();
}

function updateDistric(){
    global $db;
    $distric = htmlentities($_POST['nomdistric']);
    $error=[];
    $validation = true;

    if (!empty($distric)) {
        $districtExist = $db->prepare("SELECT * FROM boriborintany WHERE distrika = ?");
        $districtExist->execute([$distric]);
        $nbdistrict = $districtExist->rowCount();
        if ($nbdistrict == 0) {
            $error [0] = "District est inserer avec succés";
            $validation = true;
        }else{
            $error [1] = "District est existe deja dans la base de donnée";
            $validation = false;
        }
    }else{
        $error [2] = "Remplir le champ";
        $validation = false;
    }
     if ($validation) {
        $table="boriborintany";
        $params = [
            "distrika"=>$distric,
        ];
        
      updateentity($table,$params,$_GET['idboribory'],"idboribory");
            $message="Modification est effectuer avec succés";
            header("Location:listearrondissement.php");
     }
     return $error;
}
function sqlCommuneRegion(){
    global $db;
    $communesql = $db->prepare("SELECT kaominina.idkaominina, kaominina.nomkaominina, (SELECT faritra.nomfaritra from faritra where faritra.idfaritra  = kaominina.idfaritra) AS region FROM kaominina");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
} 

function insertionCommuneDistric(){
    global $db;
    $idcommunedist = intval($_POST['idcommunedist']);
    $iddiscommune = intval($_POST['iddiscommune']);
    $nameregion = $_POST['nameregion'];
    $namedistric = $_POST['namedistric'];

    $error=[];
    $validation = false;

    if (!empty($idcommunedist) && !empty($iddiscommune) && !empty($nameregion) && !empty($namedistric)) {
        $idcommunedisExist = $db->prepare("SELECT * FROM distrika_kaominina WHERE idboribory = ? and idkaominina = ?");
        $idcommunedisExist->execute([$iddiscommune,$idcommunedist]);
        $nbcommunedisExist = $idcommunedisExist->rowCount();
        if ($nbcommunedisExist == 0) {
            $error [0] = "Votre donner est inserer avec succés";
            $validation = true;
        }else{
            $error [1] = "Votre donner est existe deja dans la base de donnée";
            $validation = false;
        }
    }else{
        $error [2] = "Remplir les champs";
        $validation = false;
    }
    if ($validation) {
       $inserCommunedis = $db->prepare("INSERT INTO distrika_kaominina(idboribory,idkaominina) VALUE(:idboribory,:idkaominina)");
       $inserCommunedis->execute([
           "idboribory"=>$iddiscommune,
           "idkaominina"=>$idcommunedist,
       ]);
    }
    return $error;
}
 

function affichageCommuneDistric()
{
        global $db;
        $communesql = $db->prepare("SELECT distrika_kaominina.iddistrika_kaominina,distrika_kaominina.idboribory,distrika_kaominina.idkaominina, (SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = distrika_kaominina.idboribory) AS district,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = distrika_kaominina.idkaominina) AS commune,(SELECT idfaritra from kaominina where kaominina.idkaominina = distrika_kaominina.idkaominina) AS idregion,(SELECT nomfaritra from faritra where faritra.idfaritra = idregion) AS region FROM distrika_kaominina");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}

function sqlcommuneDis($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT distrika_kaominina.iddistrika_kaominina,distrika_kaominina.idboribory,distrika_kaominina.idkaominina, (SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = distrika_kaominina.idboribory) AS district,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = distrika_kaominina.idkaominina) AS commune,(SELECT kaominina.idkaominina from kaominina where kaominina.idkaominina = distrika_kaominina.idkaominina) AS idcommune,(SELECT idfaritra from kaominina where kaominina.idkaominina = distrika_kaominina.idkaominina) AS idregion,(SELECT nomfaritra from faritra where faritra.idfaritra = idregion) AS region FROM distrika_kaominina WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function UpdateCommuneDistric(){
    global $db;
    $idcommunedist = intval($_POST['idcommunedist']);
    $iddiscommune = intval($_POST['iddiscommune']);
    $nameregion = $_POST['nameregion'];
    $namedistric = $_POST['namedistric'];

    $error=[];
    $validation = false;

    if (!empty($idcommunedist) && !empty($iddiscommune) && !empty($nameregion) && !empty($namedistric)) {
        $idcommunedisExist = $db->prepare("SELECT * FROM distrika_kaominina WHERE idboribory = ? and idkaominina = ?");
        $idcommunedisExist->execute([$iddiscommune,$idcommunedist]);
        $nbcommunedisExist = $idcommunedisExist->rowCount();
        if ($nbcommunedisExist == 0) {
            $error [0] = "Votre donner est inserer avec succés";
            $validation = true;
        }else{
            $error [1] = "Votre donner est existe deja dans la base de donnée";
            $validation = false;
        }
    }else{
        $error [1] = "Remplir les champs";
        $validation = false;
    }
    if ($validation) {
        $table="distrika_kaominina";
        $params = [
            "idboribory"=>$iddiscommune,
            "idkaominina"=>$idcommunedist,
        ];
        
      updateentity($table,$params,$_GET['iddistrika_kaominina'],"iddistrika_kaominina");
            $message="Modification est effectuer avec succés";
            header("Location:listedistriccommune.php");
    }
    return $error;
}

function insertionFokontany(){
    global $db;
    $DistrictCommune = intval($_POST['DistrictCommune']);
    $NomFokonatny = htmlentities($_POST['NomFokonatny']);
    $imgFokontany = $_FILES['imgFokontany'];
    // $nameFile = $imgFokontany['name'];


    $error=[];
    $validation = false;
    // die(var_dump($imgFokontany));
    if (!empty($DistrictCommune) && !empty($NomFokonatny) && !empty($imgFokontany)) {
        $FokontanyExist =  $db->prepare("SELECT * FROM fokontany WHERE nomfokontany  = ? and iddistrika_kaominina = ?");
        $FokontanyExist->execute([$NomFokonatny,$DistrictCommune]);
        $FokontanyEfamisy = $FokontanyExist->rowCount();
        if ($_FILES["imgFokontany"]["error"]==0) {
            if ($FokontanyEfamisy == 0) {                
                $error [0] = "Votre donner est inserer avec succés";
                $validation = true;
            }else{
                $error[3] = "Donner deja exister dans la base de donnée";
                $validation =false;
            }
        }else{
            $error[2] = "Impossible d'importer l'image";
            $validation =false;
        }
    }else{
        $error [1] = "Remplir les champs";
        $validation = false;
    }
    if ($validation) {
        $insri = $db->prepare("INSERT INTO fokontany(nomfokontany ,saryfokontany,iddistrika_kaominina) VALUE(:nomfokontany,:saryfokontany,:iddistrika_kaominina)");
        $insri->execute([
            "nomfokontany"=>$NomFokonatny,
            "saryfokontany"=>$imgFokontany["name"],
            "iddistrika_kaominina"=>$DistrictCommune,
        ]);

        move_uploaded_file($_FILES["imgFokontany"]["tmp_name"],'../../Public/img/image_fokonatny/'.basename($imgFokontany["name"]));
    }
    return $error;
}

function affichageFokontany()
{
        global $db;
        $communesql = $db->prepare("SELECT fokontany.idfokontany,fokontany.nomfokontany,fokontany.saryfokontany,fokontany.iddistrika_kaominina,(SELECT distrika_kaominina.iddistrika_kaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = fokontany.iddistrika_kaominina) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS iddistrict,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idcommune,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = iddistrict) AS nomdistrict,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idcommune) AS nomcommune,(SELECT kaominina.idfaritra from kaominina where kaominina.idkaominina = idcommune) AS idregion,(SELECT faritra.nomfaritra from faritra where faritra.idfaritra = idregion) AS nomregion FROM fokontany");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function sqlFokontany($idname,$id)
{
        global $db;
        $communesql = $db->prepare("SELECT fokontany.idfokontany,fokontany.nomfokontany,fokontany.saryfokontany,fokontany.iddistrika_kaominina,(SELECT distrika_kaominina.iddistrika_kaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = fokontany.iddistrika_kaominina) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS iddistrict,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idcommune,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = iddistrict) AS nomdistrict,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idcommune) AS nomcommune,(SELECT kaominina.idfaritra from kaominina where kaominina.idkaominina = idcommune) AS idregion,(SELECT faritra.nomfaritra from faritra where faritra.idfaritra = idregion) AS nomregion FROM fokontany WHERE $idname = $id");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}

function updateFokontany($id,$oldimage){
    global $db;
    $DistrictCommune = intval($_POST['DistrictCommune']);
    $NomFokonatny = htmlentities($_POST['NomFokonatny']);
    $imgFokontany = $_FILES['imgFokontany'];
    // $nameFile = $imgFokontany['name'];

    $error=[];
    $validation = false;
    if (!empty($DistrictCommune) && !empty($NomFokonatny)) {
        $FokontanyExist =  $db->prepare("SELECT * FROM fokontany WHERE nomfokontany  = ? and iddistrika_kaominina = ? and NOT idfokontany = $id");
        $FokontanyExist->execute([$NomFokonatny,$DistrictCommune]);
        $FokontanyEfamisy = $FokontanyExist->rowCount();
            if ($FokontanyEfamisy == 0) {                
                $error [0] = "Votre donner est inserer avec succés";
                $validation = true;
            }else{
                $error[2] = "Donner deja exister dans la base de donnée";
                $validation =false;
            }
    }else{
        $error [1] = "Remplir les champs";
        $validation = false;
    }
    if ($validation) {
        if ($imgFokontany["name"]!="") {
            $table="fokontany";
            $params = [
                "iddistrika_kaominina"=>$DistrictCommune,
                "nomfokontany"=>$NomFokonatny,
                "saryfokontany"=>$imgFokontany["name"],
            ];
            if ($_FILES["imgFokontany"]["error"]==0) {
                updateentity($table,$params,$_GET['idfokontany'],"idfokontany");
                $message="Modification est effectuer avec succés";
                header("Location:listefokontany.php");
                  move_uploaded_file($imgFokontany["tmp_name"],"../../Public/img/image_fokonatny/".basename($imgFokontany["name"]));
                  unlink("../../Public/img/image_fokonatny/".$oldimage);
            }else{
                $error[3] = "Impossible d'importer image";
            }
        }else{
            $table="fokontany";
            $params = [
                "iddistrika_kaominina"=>$DistrictCommune,
                "nomfokontany"=>$NomFokonatny,
                "saryfokontany"=>$oldimage,
            ];
          updateentity($table,$params,$_GET['idfokontany'],"idfokontany");
          $message="Modification est effectuer avec succés";
          header("Location:listefokontany.php");
        }
    }
    return $error;
}
function insertionUtilisateur(){
    global $db;
    $pseudouser = htmlentities($_POST['pseudouser']);
    $mdpuser = $_POST['mdpuser'];
    $error=[];
    $validation = true;

    if (!empty($pseudouser) && !empty($mdpuser)) {
       $pseudouserExist = $db->prepare("SELECT * FROM admin WHERE pseudoadmin = ?");
       $pseudouserExist->execute([$pseudouser]);
       $nbpseudouser = $pseudouserExist->rowCount();
       if ($nbpseudouser == 0) {
           $error [0] = "Admin est inserer avec succés";
           $validation = true;
       }else{
           $error [1] = "Admin est existe deja dans la base de donnée";
           $validation = false;
       }
    }else{
        $error [2] = "Remplir le champ";
        $validation = false;
    }
    if ($validation) {
       $inserUser = $db->prepare("INSERT INTO admin(pseudoadmin,mdpadmin) VALUE(:pseudoadmin,:mdpadmin)");
       $inserUser->execute([
           "pseudoadmin"=>$pseudouser,
           "mdpadmin"=>$mdpuser,
       ]);
    }
    return $error;
}
function updateUtilisateur($id){
    global $db;
    $pseudouser = htmlentities($_POST['pseudouser']);
    $mdpuser = $_POST['mdpuser'];
    $error=[];
    $validation = true;

    if (!empty($pseudouser) && !empty($mdpuser)) {
       $pseudouserExist = $db->prepare("SELECT * FROM admin WHERE pseudoadmin = ? and not idadmin = $id");
       $pseudouserExist->execute([$pseudouser]);
       $nbpseudouser = $pseudouserExist->rowCount();
       if ($nbpseudouser == 0) {
           $error [0] = "Admin est inserer avec succés";
           $validation = true;
       }else{
           $error [1] = "Admin est existe deja dans la base de donnée";
           $validation = false;
       }
    }else{
        $error [2] = "Remplir le champ";
        $validation = false;
    }
    if ($validation) {
        $table="admin";
        $params = [
            "pseudoadmin"=>$pseudouser,
            "mdpadmin"=>$mdpuser,
        ];
        
      updateentity($table,$params,$_GET['idadmin'],"idadmin");
            $message="Modification est effectuer avec succés";
            header("Location:listeuser.php");
    }
    return $error;
}
function insertionPresidentFkt(){
    global $db;
    $idFokontany = intval($_POST['idFokontany']);
    $nompresident = htmlentities($_POST['nompresident']);
    $prenompresident = htmlentities($_POST['prenompresident']);
    $imgFokontany = $_FILES['imgFokontany'];
    $ddn = date($_POST['ddn']);
    $lieuxnaissance = htmlentities($_POST['lieuxnaissance']);
    $pere = htmlentities($_POST['pere']);
    $mere = htmlentities($_POST['mere']);
    $cin = intval($_POST['cin']);
    $datecin = date($_POST['datecin']);
    $lieuxcin = htmlentities($_POST['lieuxcin']);
    $travail = htmlentities($_POST['travail']);
    $contact = intval($_POST['contact']);
    $sexe = htmlentities($_POST['sexe']);
    $adresse = htmlentities($_POST['adresse']);
    $pwd = htmlentities($_POST['pwd']);
    $pwdConfi = htmlentities($_POST['pwdConfi']); 

    // $nameFile = $imgFokontany['name'];


    $error=[];
    $validation = false;
    // die(var_dump($imgFokontany));
    if (!empty($idFokontany) && !empty($nompresident) && !empty($prenompresident) && !empty($imgFokontany) && !empty($ddn) && !empty($lieuxnaissance) && !empty($pere) && !empty($mere) && !empty($cin) && !empty($datecin) && !empty($lieuxcin) && !empty($travail) && !empty($contact) && !empty($sexe) && !empty($adresse) && !empty($pwd) && !empty($pwdConfi)) {
        $PresidentFktExist =  $db->prepare("SELECT * FROM users WHERE ((idfokontany  = ?) or (nom  = ? and prenom = ? and ddn = ? and ddnlieux = ? and rayniteraka = ? and renyniterak = ?) or (cin = ?)) and (statut = 'Filoham-pokontany')");
        $PresidentFktExist->execute([$idFokontany,$nompresident,$prenompresident,$ddn,$lieuxnaissance,$pere,$mere,$cin]);
        $PresidentFktEfamisy = $PresidentFktExist->rowCount();
        if ($_FILES["imgFokontany"]["error"]==0) {
            if ($PresidentFktEfamisy == 0) {  
                if ($pwd == $pwdConfi) {
                    $error [0] = "Votre donner est inserer avec succés";
                    $validation = true;
                }else{
                    $error[4] = "Votre mot de passe est incorrect";
                    $validation = false;

                }              
            }else{
                $error[3] = "Donner deja exister dans la base de donnée";
                $validation =false;
            }
        }else{
            $error[2] = "Impossible d'importer l'image";
            $validation =false;
        }
    }else{
        $error [1] = "Remplir les champs";
        $validation = false;
    }
    if ($validation) {
        $insri = $db->prepare("INSERT INTO users(idfokontany,nom,prenom,sary,ddn,ddnlieux,rayniteraka,renyniterak,cin,cindate,cinlieux,asaatao,finday,sexe,adiresy,mdp,statut) VALUE(:idfokontany,:nom,:prenom,:sary,:ddn,:ddnlieux,:rayniteraka,:renyniterak,:cin,:cindate,:cinlieux,:asaatao,:finday,:sexe,:adiresy,:mdp,:statut)");
        $insri->execute([
            "idfokontany"=> $idFokontany,
            "nom"=>$nompresident,
            "prenom"=>$prenompresident,
            "sary"=>$imgFokontany["name"],
            "ddn"=> $ddn,
            "ddnlieux"=>$lieuxnaissance,
            "rayniteraka"=>$pere,
            "renyniterak"=>$mere,
            "cin"=>$cin,
            "cindate"=>$datecin,
            "cinlieux"=>$lieuxcin,
            "asaatao"=>$travail,
            "finday"=>$contact,
            "sexe"=>$sexe,
            "adiresy"=>$adresse,
            "mdp"=>chiffrement($pwd),
            "statut"=>"Filoham-pokontany",
        ]);
        $_POST['nompresident']="";
        $_POST['prenompresident']="";
        $_FILES['imgFokontany']="";
        $_POST['ddn']="";
        $_POST['lieuxnaissance']="";
        $_POST['pere']="";
        $_POST['mere']="";
        $_POST['cin']="";
        $_POST['datecin']="";
        $_POST['lieuxcin']="";
        $_POST['travail']="";
        $_POST['contact']="";
        $_POST['sexe']="";
        $_POST['adresse']="";
        $_POST['pwd']="";
        $_POST['pwdConfi']=""; 
        move_uploaded_file($_FILES["imgFokontany"]["tmp_name"],'../../Public/img/image_presidentFkt/'.basename($imgFokontany["name"]));
    }
    return $error;
}
function affichagePresidentFkt()
{
        global $db;
        $communesql = $db->prepare("SELECT users.idusers,users.idfokontany,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.adiresy,users.asaatao,users.sexe,users.mdp,users.statut,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras FROM users WHERE statut='Filoham-pokontany'");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function sqlPresidentFkt($idname,$id)
{
        global $db;
        $communesql = $db->prepare("SELECT users.idusers,users.idfokontany,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.adiresy,users.asaatao,users.sexe,users.mdp,users.statut,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras FROM users WHERE $idname = $id");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function updatePresidentFkt($id,$oldimage){
    global $db;
    $idFokontany = intval($_POST['idFokontany']);
    $nompresident = htmlentities($_POST['nompresident']);
    $prenompresident = htmlentities($_POST['prenompresident']);
    $imgFokontany = $_FILES['imgFokontany'];
    $ddn = date($_POST['ddn']);
    $lieuxnaissance = htmlentities($_POST['lieuxnaissance']);
    $pere = htmlentities($_POST['pere']);
    $mere = htmlentities($_POST['mere']);
    $cin = intval($_POST['cin']);
    $datecin = date($_POST['datecin']);
    $lieuxcin = htmlentities($_POST['lieuxcin']);
    $travail = htmlentities($_POST['travail']);
    $contact = intval($_POST['contact']);
    $sexe = htmlentities($_POST['sexe']);
    $adresse = htmlentities($_POST['adresse']);
    $pwd = htmlentities($_POST['pwd']);
    $pwdConfi = htmlentities($_POST['pwdConfi']); 

    // $nameFile = $imgFokontany['name'];


    $error=[];
    $validation = false;
    // die(var_dump($imgFokontany));
    if (!empty($idFokontany) && !empty($nompresident) && !empty($prenompresident) && !empty($ddn) && !empty($lieuxnaissance) && !empty($pere) && !empty($mere) && !empty($cin) && !empty($datecin) && !empty($lieuxcin) && !empty($travail) && !empty($contact) && !empty($sexe) && !empty($adresse) && !empty($pwd) && !empty($pwdConfi)) {
        $PresidentFktExist =  $db->prepare("SELECT * FROM users WHERE ((idfokontany  = ?) or (cin = ?)) and (statut = 'Filoham-pokontany') and (NOT idusers = $id)");
        $PresidentFktExist->execute([$idFokontany,$cin]);
        $PresidentFktEfamisy = $PresidentFktExist->rowCount();
            if ($PresidentFktEfamisy == 0) {  
                if ($pwd == $pwdConfi) {
                    $error [0] = "Votre donner est inserer avec succés";
                    $validation = true;
                }else{
                    $error[3] = "Votre mot de passe est incorrect";
                    $validation = false;
                }              
            }else{
                $error[2] = "Donner deja exister dans la base de donnée";
                $validation =false;
            }
    }else{
        $error [1] = "Remplir les champs";
        $validation = false;
    }
    if ($validation) {
        if ($imgFokontany["name"]!="") {
            $table="users";
            $params = [
                "idfokontany"=> $idFokontany,
                "nom"=>$nompresident,
                "prenom"=>$prenompresident,
                "sary"=>$imgFokontany["name"],
                "ddn"=> $ddn,
                "ddnlieux"=>$lieuxnaissance,
                "rayniteraka"=>$pere,
                "renyniterak"=>$mere,
                "cin"=>$cin,
                "cindate"=>$datecin,
                "cinlieux"=>$lieuxcin,
                "asaatao"=>$travail,
                "finday"=>$contact,
                "sexe"=>$sexe,
                "adiresy"=>$adresse,
                "mdp"=>chiffrement($pwd),
                "statut"=>"Filoham-pokontany",

            ];
            if ($_FILES["imgFokontany"]["error"]==0) {
                updateentity($table,$params,$_GET['idusers'],"idusers");
                $message="Modification est effectuer avec succés";
                header("Location:listepresidentfokontany.php");
                  move_uploaded_file($imgFokontany["tmp_name"],"../../Public/img/image_presidentFkt/".basename($imgFokontany["name"]));
                  unlink("../../Public/img/image_presidentFkt/".$oldimage);
            }else{
                $error[4] = "Impossible d'importer l'image";
            }
        }else{
            $table="users";
            $params = [
                "idfokontany"=> $idFokontany,
                "nom"=>$nompresident,
                "prenom"=>$prenompresident,
                "sary"=>$oldimage,
                "ddn"=> $ddn,
                "ddnlieux"=>$lieuxnaissance,
                "rayniteraka"=>$pere,
                "renyniterak"=>$mere,
                "cin"=>$cin,
                "cindate"=>$datecin,
                "cinlieux"=>$lieuxcin,
                "asaatao"=>$travail,
                "finday"=>$contact,
                "sexe"=>$sexe,
                "adiresy"=>$adresse,
                "mdp"=>chiffrement($pwd),
                "statut"=>"Filoham-pokontany",
            ];
          updateentity($table,$params,$_GET['idusers'],"idusers");
          $message="Modification est effectuer avec succés";
          header("Location:listepresidentfokontany.php");
        }
    }
    return $error;
}

function connection(){
    global $db;
    $pseudocin = $_POST["pseudocin"];
    $mdp = htmlentities($_POST["mdp"]);
    
    $error = [];
    if (!empty(($pseudocin)) && !empty($mdp)) {
        $verifpseudocin = $db->prepare("SELECT * FROM admin WHERE pseudoadmin = ?");
        $verifpseudocin->execute([$pseudocin]);

        $pseudocinExiste = $verifpseudocin->rowCount();
        if ($pseudocinExiste!=0) {
            $mdpExist = $verifpseudocin->fetch();
            if ($mdp == $mdpExist["mdpadmin"]) {
                $_SESSION["pseudoadmin"] = $mdpExist["pseudoadmin"];
                $_SESSION["idadmin"] = $mdpExist["idadmin"];
                $_SESSION["mdpadmin"] = $mdpExist["mdpadmin"];
 
                header("Location:template/index.php");
            }else{
                $error[] = "Votre mot de passe est incorrect";
            }
            
        }else{
            $error[] = "Votre pseudo est incorrect";
        }
    }else{
        $error[]= "Tout les champs sont obligatoire";
    }
    return $error;
}

function effectifMponina(){
    global $db;
    $communesql = $db->prepare("SELECT * FROM users WHERE statut='Mponina' or statut='Mpifindra-monina'");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}

function effectifMponinaL(){
    global $db;
    $communesql = $db->prepare("SELECT * FROM users WHERE ((statut='Mponina' or statut='Mpifindra-monina') and (sexe='Lahy'))");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}

function effectifMponinaV(){
    global $db;
    $communesql = $db->prepare("SELECT * FROM users WHERE ((statut='Mponina' or statut='Mpifindra-monina') and (sexe='Vavy'))");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function affichageUsers()
{
        global $db;
        $communesql = $db->prepare("SELECT users.idusers,users.idfokontany,users.idsektera,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.pasipaoronum,users.pasipaorolieux,users.pasipaorodelai,users.adiresy,users.asaatao,users.toeranaantrano,users.safidy,users.sexe,users.mdp,users.statut,users.date,users.numkarine,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras,(SELECT sektera.nomsektera from sektera where sektera.idsektera = users.idsektera) AS nomSecteur FROM users WHERE (statut='Mponina' or statut='Mpifindra-monina') order by idusers desc;");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function affichageUser($idname,$id)
{
        global $db;
        $communesql = $db->prepare("SELECT users.idusers,users.idfokontany,users.idsektera,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.pasipaoronum,users.pasipaorolieux,users.pasipaorodelai,users.adiresy,users.asaatao,users.toeranaantrano,users.safidy,users.sexe,users.mdp,users.statut,users.date,users.numkarine,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras,(SELECT sektera.nomsektera from sektera where sektera.idsektera = users.idsektera) AS nomSecteur FROM users WHERE $idname = $id");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function prixSql($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT * FROM payment WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}

function updatePrix(){
    global $db;
    $prixinscri = intval($_POST['prixinscri']);
    $prixparan = intval($_POST['prixparan']);
    $prixpenal = intval($_POST['prixpenal']);
    $error=[];
    $validation = true;

    if (!empty($prixinscri) && !empty($prixparan) && !empty($prixpenal)) {
       $error [0] = "Votre modification est effectuer avec succés";
       $validation = true;
    }else{
        $error [1] = "Remplir les champs";
        $validation = false;
    }
     if ($validation) {
        $table="payment";
        $params = [
            "saranyf"=>$prixinscri,
            "adidy"=>$prixparan,
            "sazy"=>$prixpenal,
        ];
      updateentity($table,$params,$_GET['idpayment'],"idpayment");
            $message="Modification est effectuer avec succés";
            header("Location:prix.php");
     }
     return $error;
}
?>