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
function connectionPresidentFkt(){
    global $db;
    $cinfokontany = intval($_POST["cinfokontany"]);
    $mdpfokontany = htmlentities($_POST["mdpfokontany"]);
    
    $error = [];
    if (!empty($cinfokontany) && !empty($mdpfokontany)) {
        $verifcinfokontany = $db->prepare ("SELECT users.idusers,users.idfokontany,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.adiresy,users.asaatao,users.sexe,users.mdp,users.statut,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras FROM users WHERE cin = ? and statut='Filoham-pokontany'");
        $verifcinfokontany->execute([$cinfokontany]);

        $cinfokontanyExiste = $verifcinfokontany->rowCount();
        if ($cinfokontanyExiste!=0) {
            $mdpfokontanyExist = $verifcinfokontany->fetch();
            if (chiffrement($mdpfokontany) == $mdpfokontanyExist["mdp"]) {
                $_SESSION["finday"] = $mdpfokontanyExist["finday"];
                $_SESSION["nom"] = $mdpfokontanyExist["nom"];
                $_SESSION["prenom"] = $mdpfokontanyExist["prenom"];
                $_SESSION["ddn"] = $mdpfokontanyExist["ddn"];
                $_SESSION["ddnlieux"] = $mdpfokontanyExist["ddnlieux"];
                $_SESSION["rayniteraka"] = $mdpfokontanyExist["rayniteraka"];
                $_SESSION["renyniterak"] = $mdpfokontanyExist["renyniterak"];
                $_SESSION["cin"] = $mdpfokontanyExist["cin"];
                $_SESSION["cindate"] = $mdpfokontanyExist["cindate"];
                $_SESSION["cinlieux"] = $mdpfokontanyExist["cinlieux"];
                $_SESSION["sary"] = $mdpfokontanyExist["sary"];
                $_SESSION["adiresy"] = $mdpfokontanyExist["adiresy"];
                $_SESSION["asaatao"] = $mdpfokontanyExist["asaatao"];
                $_SESSION["sexe"] = $mdpfokontanyExist["sexe"];
                $_SESSION["mdp"] = $mdpfokontanyExist["mdp"];
                $_SESSION["statut"] = $mdpfokontanyExist["statut"];
                $_SESSION["idFokontanys"] = $mdpfokontanyExist["idFokontanys"];
                $_SESSION["nomDistrikas"] = $mdpfokontanyExist["nomDistrikas"];
                $_SESSION["nomFokontanys"] = $mdpfokontanyExist["nomFokontanys"];
                $_SESSION["nomKaomininas"] = $mdpfokontanyExist["nomKaomininas"];
                $_SESSION["nomFaritras"] = $mdpfokontanyExist["nomFaritras"];
                if ($_SESSION["statut"] == "Filoham-pokontany") {                    
                    header("Location:template/index.php");
                }
            }else{
                $error[] = "Diso ny teny miafinao";
            }
            
        }else{
            $error[] = "Tsy marina ny laharana karapanondronao";
        }
    }else{
        $error[]= "Tsy maintsy fenona ny takelaka";
    }
    return $error;
}
function insertionSecteur(){
    global $db;
    $idfokontany = intval($_SESSION['idFokontanys']);
    $nomsektera = htmlentities($_POST['nomsektera']);
    $error=[];
    $validation = true;

    if (!empty($idfokontany) && !empty($nomsektera)) {
        $nomsekteraExist = $db->prepare("SELECT * FROM sektera WHERE nomsektera = ? and idfokontany = ?");
        $nomsekteraExist->execute([$nomsektera,$idfokontany]);
        $nbnomsekteraExist = $nomsekteraExist->rowCount();
        if ($nbnomsekteraExist == 0) {
            $error [0] = "Tafiditra soamantsara ny sektera izay nampidirinao";
            $validation = true;
        }else{
            $error [2] = "Efa misy ao io sektera io";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }
    if ($validation) {
       $inserCommune = $db->prepare("INSERT INTO sektera(nomsektera,idfokontany) VALUE(:nomsektera,:idfokontany)");
       $inserCommune->execute([
           "nomsektera"=>$nomsektera,
           "idfokontany"=>$idfokontany,
       ]);
    }
    return $error;
}
function affichageSecteur($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT sektera.idsektera,sektera.nomsektera,sektera.idfokontany FROM sektera WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
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
function updateSecteur($id){
    global $db;
    $idfokontany = intval($_SESSION['idFokontanys']);
    $nomsektera = htmlentities($_POST['nomsektera']);
    $error=[];
    $validation = true;

    if (!empty($idfokontany) && !empty($nomsektera)) {
        $nomsekteraExist = $db->prepare("SELECT * FROM sektera WHERE nomsektera = ? and idfokontany = ? and not idsektera = $id");
        $nomsekteraExist->execute([$nomsektera,$idfokontany]);
        $nbnomsekteraExist = $nomsekteraExist->rowCount();
        if ($nbnomsekteraExist == 0) {
            $error [0] = "Tafiditra soamantsara ny sektera izay nampidirinao";
            $validation = true;
        }else{
            $error [2] = "Efa misy ao io sektera io";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }
    if ($validation) {
       $table="sektera";
       $params = [
        "nomsektera"=>$nomsektera,
        "idfokontany"=>$idfokontany,
       ];
     updateentity($table,$params,$_GET['idsektera'],"idsektera");
     echo "<script>window.location.href='listesektera.php';</script>";
    //  header("Location:listesektera.php");
    }
    return $error;
}
function insertionCarnet(){
    global $db;
    $idfokontany = intval($_SESSION['idFokontanys']);
    $nomkarine = htmlentities($_POST['karine']);
    $error=[];
    $validation = true;

    if (!empty($idfokontany) && !empty($nomkarine)) {
        $nomkarineExist = $db->prepare("SELECT * FROM karine WHERE laharanakarine = ? and idfokontany = ?");
        $nomkarineExist->execute([$nomkarine,$idfokontany]);
        $nbnomkarineExist = $nomkarineExist->rowCount();
        if ($nbnomkarineExist == 0) {
            $error [0] = "Tafiditra soamantsara ny laharana karine izay nampidirinao";
            $validation = true;
        }else{
            $error [2] = "Efa misy ao io karine io";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }
    if ($validation) {
       $inserCommune = $db->prepare("INSERT INTO karine(laharanakarine,idfokontany) VALUE(:laharanakarine,:idfokontany)");
       $inserCommune->execute([
           "laharanakarine"=>$nomkarine,
           "idfokontany"=>$idfokontany,
       ]);
    }
    return $error;
}
function affichageCarnet($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT karine.idkarine,karine.laharanakarine,karine.idfokontany FROM karine WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function updateCarnet($id){
    global $db;
    $idfokontany = intval($_SESSION['idFokontanys']);
    $nomkarine = htmlentities($_POST['karine']);
    $error=[];
    $validation = true;
    
    if (!empty($idfokontany) && !empty($nomkarine)) {
        $nomkarineExist = $db->prepare("SELECT * FROM karine WHERE laharanakarine = ? and idfokontany = ? and not idkarine = $id");
        $nomkarineExist->execute([$nomkarine,$idfokontany]);
        $nbnomkarineExist = $nomkarineExist->rowCount();
        if ($nbnomkarineExist == 0) {
            $error [0] = "Tafiditra soamantsara ny laharana karine izay nampidirinao";
            $validation = true;
        }else{
            $error [2] = "Efa misy ao io karine io";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }

    if ($validation) {
       $table="karine";
       $params = [
        "laharanakarine"=>$nomkarine,
        "idfokontany"=>$idfokontany,
       ];
     updateentity($table,$params,$_GET['idkarine'],"idkarine");
     echo "<script>window.location.href='listecarnet.php';</script>";
    //  header("Location:listesektera.php");
    }
    return $error;
}
function insertionUsers(){
    global $db;
    $idfokontany = intval($_SESSION['idFokontanys']);
    $idSektera = intval($_POST['idSektera']);
    $contact = htmlentities($_POST['contact']);
    $nomusers = htmlentities($_POST['nomusers']);
    $prenomusers = htmlentities($_POST['prenomusers']);
    $ddn = date($_POST['ddn']);
    $lieuxnaissance = htmlentities($_POST['lieuxnaissance']);
    $pere = htmlentities($_POST['pere']);
    $mere = htmlentities($_POST['mere']);
    $cin = htmlentities($_POST['cin']);
    $datecin = date($_POST['datecin']);
    $lieuxcin = htmlentities($_POST['lieuxcin']);
    $imgFokontany = $_FILES['imgFokontany'];
    $passportnum = htmlentities($_POST['passportnum']);
    $passportlieux = htmlentities($_POST['passportlieux']);
    $passportdelai = htmlentities($_POST['passportdelai']);
    $adresse = htmlentities($_POST['adresse']);
    $travail = htmlentities($_POST['travail']);
    $toerana = htmlentities($_POST['toerana']);
    $optradio = htmlentities($_POST['optradio']);
    $sexe = htmlentities($_POST['sexe']);
    $pwd = htmlentities($_POST['pwd']);
    $pwdConfi = htmlentities($_POST['pwdConfi']);

    $error=[];
    $validation = true;

    if (!empty($idfokontany) && !empty($idSektera) && !empty($nomusers) && !empty($prenomusers) && !empty($ddn) && !empty($lieuxnaissance) && !empty($pere) && !empty($mere) && !empty($imgFokontany) && !empty($adresse) && !empty($travail) && !empty($toerana) && !empty($pwd) && !empty($pwdConfi)) {
        $usersExist = $db->prepare("SELECT * FROM users WHERE (((nom  = ? and prenom = ? and ddn = ? and ddnlieux = ? and rayniteraka = ? and renyniterak = ?) or ((cin is not null) and (cin = ?))) and (not statut = 'Filoham-pokontany'))");
        $usersExist->execute([$nomusers,$prenomusers,$ddn,$lieuxnaissance,$pere,$mere,$cin]);
        $nbusersExist = $usersExist->rowCount();
        $nbpwd = strlen($pwd);
        if ($nbusersExist == 0) {
            if ($nbpwd >= 8) {
                if ($pwd == $pwdConfi) {
                    if ($_FILES["imgFokontany"]["error"]==0) {
                        $error [0] = "Tafiditra soamantsara ny mombamomban'ny olona izay nampidirinao";
                        $validation = true;
                    }else{
                        $error [5] = "Misy olana ny fampidirana an'ilay sary";
                        $validation = false;
                    }
                }else{
                    $error [4] = "Hamarino tsara ny teny miafina izay nampidirinao";
                    $validation = false;
                }
            }else{
                $error [3] = "Tsy mahazo atao latsikiny valo ny teny miafina";
                $validation = false;
            }
        }else{
            $error [2] = "Efa ao anaty lisitra io olona io";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka izay natao ho fenoina";
        $validation = false;
    }
    if ($validation) {
       $inserCommune = $db->prepare("INSERT INTO users(idfokontany,idsektera,finday,nom,prenom,ddn,ddnlieux,rayniteraka,renyniterak,cin,cindate,cinlieux,sary,pasipaoronum,pasipaorolieux,pasipaorodelai,adiresy,asaatao,toeranaantrano,safidy,sexe,mdp,statut) VALUE(:idfokontany,:idsektera,:finday,:nom,:prenom,:ddn,:ddnlieux,:rayniteraka,:renyniterak,:cin,:cindate,:cinlieux,:sary,:pasipaoronum,:pasipaorolieux,:pasipaorodelai,:adiresy,:asaatao,:toeranaantrano,:safidy,:sexe,:mdp,:statut)");
       $inserCommune->execute([
           "idfokontany"=>$idfokontany,
           "idsektera"=>$idSektera,
           "finday"=>$contact,
           "nom"=>$nomusers,
           "prenom"=>$prenomusers,
           "ddn"=>$ddn,
           "ddnlieux"=>$lieuxnaissance,
           "rayniteraka"=>$pere,
           "renyniterak"=>$mere,
           "cin"=>$cin,
           "cindate"=>$datecin,
           "cinlieux"=>$lieuxcin,
           "sary"=>$imgFokontany["name"],
           "pasipaoronum"=>$passportnum,
           "pasipaorolieux"=>$passportlieux,
           "pasipaorodelai"=>$passportdelai,
           "adiresy"=>$adresse,
           "asaatao"=>$travail,
           "toeranaantrano"=>$toerana,
           "safidy"=>$optradio,
           "sexe"=>$sexe,
           "mdp"=>chiffrement($pwd),
           "statut"=>'Vaovao',

       ]);
       $_POST['nomusers']="";
       $_POST['prenomusers']="";
       $_POST['ddn']="";
       $_POST['lieuxnaissance']="";
       $_POST['pere']="";
       $_POST['mere']="";
       $_POST['cin']="";
       $_POST['datecin']="";
       $_POST['lieuxcin']="";
       $_FILES['imgFokontany']="";
       $_POST['passportnum']="";
       $_POST['passportlieux']="";
       $_POST['passportdelai']="";
       $_POST['adresse']="";
       $_POST['travail']="";
       $_POST['toerana']="";
       $_POST['pwd']="";
       $_POST['pwdConfi']="";
       $_POST["nomSektera"]="";
       move_uploaded_file($_FILES["imgFokontany"]["tmp_name"],'../../Public/img/image_users/'.basename($imgFokontany["name"]));

    }
    return $error;
}
function affichageUsers($idname,$id)
{
        global $db;
        $communesql = $db->prepare("SELECT users.idusers,users.idfokontany,users.idsektera,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.pasipaoronum,users.pasipaorolieux,users.pasipaorodelai,users.adiresy,users.asaatao,users.toeranaantrano,users.safidy,users.sexe,users.mdp,users.statut,users.date,users.numkarine,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras,(SELECT sektera.nomsektera from sektera where sektera.idsektera = users.idsektera) AS nomSecteur FROM users WHERE ($idname = $id) and (statut='Vaovao' or statut='Mpifindra-monina') order by idusers desc;");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function affichageUsersCertificat($idname,$id)
{
        global $db;
        $communesql = $db->prepare("SELECT users.idusers,users.idfokontany,users.idsektera,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.pasipaoronum,users.pasipaorolieux,users.pasipaorodelai,users.adiresy,users.asaatao,users.toeranaantrano,users.safidy,users.sexe,users.mdp,users.statut,users.date,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras,(SELECT sektera.nomsektera from sektera where sektera.idsektera = users.idsektera) AS nomSecteur FROM users WHERE ($idname = $id)");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function updateUsers($id,$oldimage){
    global $db;
    $idfokontany = intval($_SESSION['idFokontanys']);
    $idSektera = intval($_POST['idSektera']);
    $contact = htmlentities($_POST['contact']);
    $nomusers = htmlentities($_POST['nomusers']);
    $prenomusers = htmlentities($_POST['prenomusers']);
    $ddn = date($_POST['ddn']);
    $lieuxnaissance = htmlentities($_POST['lieuxnaissance']);
    $pere = htmlentities($_POST['pere']);
    $mere = htmlentities($_POST['mere']);
    $cin = htmlentities($_POST['cin']);
    $datecin = date($_POST['datecin']);
    $lieuxcin = htmlentities($_POST['lieuxcin']);
    $imgFokontany = $_FILES['imgFokontany'];
    $passportnum = htmlentities($_POST['passportnum']);
    $passportlieux = htmlentities($_POST['passportlieux']);
    $passportdelai = htmlentities($_POST['passportdelai']);
    $adresse = htmlentities($_POST['adresse']);
    $travail = htmlentities($_POST['travail']);
    $toerana = htmlentities($_POST['toerana']);
    $optradio = htmlentities($_POST['optradio']);
    $sexe = htmlentities($_POST['sexe']);
    $error=[];
    $validation = true;

    if (!empty($idfokontany) && !empty($idSektera) && !empty($nomusers) && !empty($prenomusers) && !empty($ddn) && !empty($lieuxnaissance) && !empty($pere) && !empty($mere) && !empty($imgFokontany) && !empty($adresse) && !empty($travail) && !empty($toerana)) {
        $usersExist = $db->prepare("SELECT * FROM users WHERE (((nom  = ? and prenom = ? and ddn = ? and ddnlieux = ? and rayniteraka = ? and renyniterak = ?) or ((cin is not null) and (cin = ?))) and (statut = 'user') and (not idusers = $id))");
        $usersExist->execute([$nomusers,$prenomusers,$ddn,$lieuxnaissance,$pere,$mere,$cin]);
        $nbusersExist = $usersExist->rowCount();
        if ($nbusersExist == 0) {
            if ($pwd == $pwdConfi) {
                    $error [0] = "Tafiditra soamantsara ny mombamomban'ny olona izay nampidirinao";
                    $validation = true;
            }else{
                $error [3] = "Diso ny teny miafina izay nampidirinao";
                $validation = false;
            }
        }else{
            $error [2] = "Efa ao anaty lisitra io olona io";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka izay natao ho fenoina";
        $validation = false;
    }

    if ($validation) {
        if ($imgFokontany["name"]!="") {
            $table="users";
            $params = [
                "idfokontany"=>$idfokontany,
                "idsektera"=>$idSektera,
                "finday"=>$contact,
                "nom"=>$nomusers,
                "prenom"=>$prenomusers,
                "ddn"=>$ddn,
                "ddnlieux"=>$lieuxnaissance,
                "rayniteraka"=>$pere,
                "renyniterak"=>$mere,
                "cin"=>$cin,
                "cindate"=>$datecin,
                "cinlieux"=>$lieuxcin,
                "sary"=>$imgFokontany["name"],
                "pasipaoronum"=>$passportnum,
                "pasipaorolieux"=>$passportlieux,
                "pasipaorodelai"=>$passportdelai,
                "adiresy"=>$adresse,
                "asaatao"=>$travail,
                "toeranaantrano"=>$toerana,
                "safidy"=>$optradio,
                "sexe"=>$sexe,
                "statut"=>'Vaovao',
            ];
            if ($_FILES["imgFokontany"]["error"]==0) {
                updateentity($table,$params,$_GET['idusers'],"idusers");
                move_uploaded_file($imgFokontany["tmp_name"],"../../Public/img/image_users/".basename($imgFokontany["name"]));
                unlink("../../Public/img/image_users/".$oldimage);
                echo "<script>window.location.href='listeusers.php';</script>";
            }else{
                $error[4] = "Misy olana ny fampidirana an'ilay sary";
            }
        }else{
                $table="users";
                $params = [
                "idfokontany"=>$idfokontany,
                "idsektera"=>$idSektera,
                "finday"=>$contact,
                "nom"=>$nomusers,
                "prenom"=>$prenomusers,
                "ddn"=>$ddn,
                "ddnlieux"=>$lieuxnaissance,
                "rayniteraka"=>$pere,
                "renyniterak"=>$mere,
                "cin"=>$cin,
                "cindate"=>$datecin,
                "cinlieux"=>$lieuxcin,
                "sary"=>$oldimage,
                "pasipaoronum"=>$passportnum,
                "pasipaorolieux"=>$passportlieux,
                "pasipaorodelai"=>$passportdelai,
                "adiresy"=>$adresse,
                "asaatao"=>$travail,
                "toeranaantrano"=>$toerana,
                "safidy"=>$optradio,
                "sexe"=>$sexe,
                ];
               updateentity($table,$params,$_GET['idusers'],"idusers");
               echo "<script>window.location.href='listeusers.php';</script>";
            }
    }
    return $error;
}
function affichageCarnetNew($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT karine.idkarine,karine.laharanakarine FROM karine WHERE  idkarine not in (SELECT ankohonana.idkarine FROM ankohonana) and $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function affichageCarnetOld($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT DISTINCT karine.idkarine,karine.laharanakarine,(SELECT DISTINCT ankohonana.idkarine FROM ankohonana WHERE ankohonana.idkarine = karine.idkarine) AS idFamille FROM karine WHERE  idkarine in (SELECT DISTINCT ankohonana.idkarine FROM ankohonana) and $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function insertionFamille(){
    global $db;
    $idfokontany = intval($_POST['idFokontany']);
    $idusers = intval($_POST['idusers']);
    $idkarine = intval($_POST['idkarine']);
    $droitpayes = htmlentities($_POST['droitpayes']);
    $error=[];
    $validation = true;

    if (!empty($idfokontany) && !empty($idusers) && !empty($idkarine)) {
        $ankohonanaExist = $db->prepare("SELECT * FROM ankohonana WHERE  idusers = ?");
        $ankohonanaExist->execute([$idusers]);
        $nbankohonanaExist = $ankohonanaExist->rowCount();
        if ($nbankohonanaExist == 0) {
            $error [0] = "Tafiditra soamantsara ao anty laharana karine ny mombamomba an'ilay olona izay nampidirinao";
            $validation = true;
        }else{
            $error [2] = "Efa misy ao io Mombamoban'olona izay ampidirinao io";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }
    if ($validation) {
       $inserCommune = $db->prepare("INSERT INTO ankohonana(idkarine,idusers,idfokontany,sarampisoratana) VALUE(:idkarine,:idusers,:idfokontany,:sarampisoratana)");
       $inserCommune->execute([
           "idkarine"=>$idkarine,
           "idusers"=>$idusers,
           "idfokontany"=>$idfokontany,
           "sarampisoratana"=>$droitpayes,
       ]);
       $table="users";
       $params = [
       "statut"=>'Mponina',
       ];
      updateentity($table,$params,$_GET['idusers'],"idusers");
      echo "<script>window.location.href='listeusers.php';</script>";
    }
    return $error;
}
function affichageAnkohonana($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT ankohonana.idankohonana,ankohonana.idkarine,ankohonana.idusers,ankohonana.idfokontany,ankohonana.sarampisoratana,(SELECT karine.laharanakarine FROM karine WHERE karine.idkarine = ankohonana.idkarine) AS numeroCarnet,(SELECT users.idsektera FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS IdSecteur,(SELECT sektera.nomsektera FROM sektera WHERE sektera.idsektera = IdSecteur) AS nomSecteur,(SELECT users.finday FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS ContactUsers,(SELECT users.nom FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS NomtUsers,(SELECT users.prenom FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS PrenomtUsers,(SELECT users.ddn FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS DdntUsers,(SELECT users.cin FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS NumeroCin,(SELECT users.ddnlieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS ddnlieuxUsers,(SELECT users.rayniteraka FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS rayniterakaUsers,(SELECT users.renyniterak FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS renyniterakUsers,(SELECT users.cindate FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS cindateUsers,(SELECT users.cinlieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS cinlieuxUsers,(SELECT users.sary FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS saryUsers,(SELECT users.pasipaoronum FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaoronumUsers,(SELECT users.pasipaorolieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaorolieuxUsers,(SELECT users.pasipaorodelai FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaorodelaiUsers,(SELECT users.adiresy FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS adiresyUsers,(SELECT users.asaatao FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS asaataoUsers,(SELECT users.toeranaantrano FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS toeranaantranoUsers,(SELECT users.safidy FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS safidyUsers,(SELECT users.sexe FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS sexeUsers,(SELECT users.mdp FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS mdpUsers,(SELECT users.date FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS usersDate FROM ankohonana WHERE  $idname = $id order by idankohonana desc;");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function affichageAnkohonanaModif($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT ankohonana.idkarine,ankohonana.idankohonana,ankohonana.idusers,ankohonana.idfokontany,ankohonana.sarampisoratana,(SELECT users.idsektera FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS IdSecteur,(SELECT sektera.nomsektera FROM sektera WHERE sektera.idsektera = IdSecteur) AS nomSecteur,(SELECT users.finday FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS ContactUsers,(SELECT users.nom FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS NomtUsers,(SELECT users.prenom FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS PrenomtUsers,(SELECT users.ddn FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS DdntUsers,(SELECT users.cin FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS NumeroCin,(SELECT users.ddnlieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS ddnlieuxUsers,(SELECT users.rayniteraka FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS rayniterakaUsers,(SELECT users.renyniterak FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS renyniterakUsers,(SELECT users.cindate FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS cindateUsers,(SELECT users.cinlieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS cinlieuxUsers,(SELECT users.sary FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS saryUsers,(SELECT users.pasipaoronum FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaoronumUsers,(SELECT users.pasipaorolieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaorolieuxUsers,(SELECT users.pasipaorodelai FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaorodelaiUsers,(SELECT users.adiresy FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS adiresyUsers,(SELECT users.asaatao FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS asaataoUsers,(SELECT users.toeranaantrano FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS toeranaantranoUsers,(SELECT users.safidy FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS safidyUsers,(SELECT users.sexe FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS sexeUsers,(SELECT users.mdp FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS mdpUsers,(SELECT users.date FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS usersDate FROM ankohonana WHERE  $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function affichageUsersAnkohonana($idname,$id)
{
        global $db;
        $communesql = $db->prepare("SELECT users.idusers,users.idfokontany,users.idsektera,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.pasipaoronum,users.pasipaorolieux,users.pasipaorodelai,users.adiresy,users.asaatao,users.toeranaantrano,users.safidy,users.sexe,users.mdp,users.statut,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras,(SELECT sektera.nomsektera from sektera where sektera.idsektera = users.idsektera) AS nomSecteur FROM users WHERE $idname = $id");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function affichageSarany($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT * FROM ankohonana WHERE  $idname = $id ");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function updateFamille($iduser,$oldimage){
    global $db;
    // debut table ankohonana
    $idfokontany = intval($_POST['idFokontany']);
    $idusers = intval($_POST['idusers']);
    $idkarine = intval($_POST['idkarine']);
    $droitpayes = intval($_POST['droitpayes']);
    // Fin table ankohonana

    // debut table users
    $idSektera = intval($_POST['idSektera']);
    $contact = htmlentities($_POST['contact']);
    $nomusers = htmlentities($_POST['nomusers']);
    $prenomusers = htmlentities($_POST['prenomusers']);
    $ddn = date($_POST['ddn']);
    $lieuxnaissance = htmlentities($_POST['lieuxnaissance']);
    $pere = htmlentities($_POST['pere']);
    $mere = htmlentities($_POST['mere']);
    $cin = htmlentities($_POST['cin']);
    $datecin = date($_POST['datecin']);
    $lieuxcin = htmlentities($_POST['lieuxcin']);
    $imgFokontany = $_FILES['imgFokontany'];
    $passportnum = htmlentities($_POST['passportnum']);
    $passportlieux = htmlentities($_POST['passportlieux']);
    $passportdelai = htmlentities($_POST['passportdelai']);
    $adresse = htmlentities($_POST['adresse']);
    $travail = htmlentities($_POST['travail']);
    $toerana = htmlentities($_POST['toerana']);
    $optradio = htmlentities($_POST['optradio']);
    $sexe = htmlentities($_POST['sexe']);
    // debut table users
    $error=[];
    $validation = true;




    if (!empty($idfokontany) && !empty($idusers) && !empty($idkarine) && !empty($idfokontany) && !empty($idSektera) && !empty($nomusers) && !empty($prenomusers) && !empty($ddn) && !empty($lieuxnaissance) && !empty($pere) && !empty($mere) && !empty($imgFokontany) && !empty($adresse) && !empty($travail) && !empty($toerana)) {
        $ankohonanaExist = $db->prepare("SELECT * FROM ankohonana WHERE idusers = ? and not idusers = $iduser");
        $ankohonanaExist->execute([$idusers]);
        $nbankohonanaExist = $ankohonanaExist->rowCount();
        if ($nbankohonanaExist == 0) {
            $error [0] = "Tafiditra soamantsara ao anty laharana karine ny mombamomba an'ilay olona izay nampidirinao";
            $validation = true;
        }else{
            $error [2] = "Efa misy ao io Mombamoban'olona izay ampidirinao io";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }
    if ($validation) {
        if ($imgFokontany["name"]!="") {
            $table="users";
            $params = [
                "idsektera"=>$idSektera,
                "finday"=>$contact,
                "nom"=>$nomusers,
                "prenom"=>$prenomusers,
                "ddn"=>$ddn,
                "ddnlieux"=>$lieuxnaissance,
                "rayniteraka"=>$pere,
                "renyniterak"=>$mere,
                "cin"=>$cin,
                "cindate"=>$datecin,
                "cinlieux"=>$lieuxcin,
                "sary"=>$imgFokontany["name"],
                "pasipaoronum"=>$passportnum,
                "pasipaorolieux"=>$passportlieux,
                "pasipaorodelai"=>$passportdelai,
                "adiresy"=>$adresse,
                "asaatao"=>$travail,
                "toeranaantrano"=>$toerana,
                "safidy"=>$optradio,
                "sexe"=>$sexe,
            ];
            if ($_FILES["imgFokontany"]["error"]==0) {
                updateentity($table,$params,$_GET['idusers'],"idusers");
                move_uploaded_file($imgFokontany["tmp_name"],"../../Public/img/image_users/".basename($imgFokontany["name"]));
                unlink("../../Public/img/image_users/".$oldimage);
                echo "<script>window.location.href='listeusers.php';</script>";
            }else{
                $error[4] = "Misy olana ny fampidirana an'ilay sary";
            }
        }else{
                $table="users";
                $params = [
                "idsektera"=>$idSektera,
                "finday"=>$contact,
                "nom"=>$nomusers,
                "prenom"=>$prenomusers,
                "ddn"=>$ddn,
                "ddnlieux"=>$lieuxnaissance,
                "rayniteraka"=>$pere,
                "renyniterak"=>$mere,
                "cin"=>$cin,
                "cindate"=>$datecin,
                "cinlieux"=>$lieuxcin,
                "sary"=>$oldimage,
                "pasipaoronum"=>$passportnum,
                "pasipaorolieux"=>$passportlieux,
                "pasipaorodelai"=>$passportdelai,
                "adiresy"=>$adresse,
                "asaatao"=>$travail,
                "toeranaantrano"=>$toerana,
                "safidy"=>$optradio,
                "sexe"=>$sexe,
                ];
               updateentity($table,$params,$_GET['idusers'],"idusers");
               echo "<script>window.location.href='listeusers.php';</script>";
            }

       $table="ankohonana";
       $params = [
        "idkarine"=>$idkarine,
        "idusers"=>$idusers,
        "idfokontany"=>$idfokontany,
        "sarampisoratana"=>$droitpayes,
       ];
      updateentity($table,$params,$_GET['idankohonana'],"idankohonana");
      echo "<script>window.location.href='listeusers.php';</script>";
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
function get($nomentity){
    global $db;
    $stmt=$db->prepare("SELECT*FROM $nomentity");
    $stmt->execute();
    $all=$stmt->fetchAll();
    return $all;
}
function transferUsers(){
    global $db;
    $idfokontany = intval($_POST['idFokontany']);
    $idsektera = intval($_POST['idsektera']);
    $secteur = htmlentities($_POST['secteur']);
    $nomfokontany = htmlentities($_POST['nomfokontany']);
    $error=[];
    $validation = true;

    if (!empty($nomfokontany) && !empty($secteur)) {
        $error [2] = "Lasa soamantsara ny olona izay nafindranao toerana";
        $validation = true;
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }
    if ($validation) {
       $table="users";
       $params = [
        "idfokontany"=>$idfokontany,
        "idsektera"=>$idsektera,
        "numkarine"=>"",
        "statut"=>'Mpifindra-monina',
       ];
     updateentity($table,$params,$_GET["idusers"],"idusers");
     deleteentity("ankohonana",$_GET["idankohonana"],"idankohonana");
     echo "<script>window.location.href='listeusers.php';</script>";
    //  header("Location:listesektera.php");
    }
    return $error;
}
function affichageAdidy($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT adidy.idadidy,adidy.idkarine,adidy.prix,adidy.ans,adidy.date,(SELECT karine.laharanakarine FROM karine WHERE karine.idkarine = adidy.idkarine) AS laharanaKarine FROM adidy WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}

function insertionAdidy(){
    global $db;
    $message = "";
    $idkarine = intval($_POST['idKarine']);
    $adidy = htmlentities($_POST['adidy']);
    $daty = date($_POST["daty"]);
    if (!empty($adidy) && !empty($daty)) {      
        $inserCommune = $db->prepare("INSERT INTO adidy(idkarine,prix,ans) VALUE(:idkarine,:prix,:ans)");
        $inserCommune->execute([
            "idkarine"=>$idkarine,
            "prix"=>$adidy,
            "ans"=>$daty,
        ]);
        $message = "Tafiditra soamantsara";
    }else{
        $message = "Fenoy Takelaka";
    }
    return $message;
}

function affichageSazy($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT sazy.idsazy,sazy.idkarine,sazy.presence,sazy.motif,sazy.date,(SELECT karine.laharanakarine FROM karine WHERE karine.idkarine = sazy.idkarine) AS laharanaKarineSazy FROM sazy WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function insertionSazy(){
    global $db;
    $message = "";
    $idkarine = intval($_POST['idKarine']);
    $sazy = htmlentities($_POST['sazy']);
    $motif = htmlentities($_POST['motif']);
    $daty = date($_POST['daty']);

    if (!empty($sazy) && !empty($motif) && !empty($daty)) {      
        $inserCommune = $db->prepare("INSERT INTO sazy(idkarine,presence,motif,date) VALUE(:idkarine,:presence,:motif,:date)");
        $inserCommune->execute([
            "idkarine"=>$idkarine,
            "presence"=>$sazy,
            "motif"=>$motif,
            "date"=>$daty,
        ]);
        $message = "Tafiditra soamantsara";
    }else{
        $message = "Fenoy Takelaka";
    }
    return $message;
}
function insertionPublication(){
    global $db;
    $idfokontany = intval($_SESSION['idFokontanys']);
    $filazana = htmlentities($_POST['filazana']);
    $error=[];
    $validation = true;

    if (!empty($idfokontany) && !empty($filazana)) {
        $error [0] = "Tafiditra soamantsara ny filazana izay nampidirinao";
            $validation = true;
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }
    if ($validation) {
       $inserCommune = $db->prepare("INSERT INTO publications(idfokontany,publication) VALUE(:idfokontany,:publication)");
       $inserCommune->execute([
           "idfokontany"=>$idfokontany,
           "publication"=>$filazana,
       ]);
    }
    return $error;
}
function affichagePublication($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT*FROM publications WHERE $idname = $id order by idpublication desc;");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function updatePublication(){
    global $db;
    $filazana = htmlentities($_POST['filazana']);
    $error=[];
    $validation = true;
    
    if (!empty($filazana)) {
        $error [0] = "Tafiditra soamantsara ny fanovana izay nataonao";
            $validation = true;
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka";
        $validation = false;
    }
    if ($validation) {
       $table="publications";
       $params = [
        "publication"=>$filazana,
       ];
     updateentity($table,$params,$_GET['idpub'],"idpublication");
     echo "<script>window.location.href='listepublication.php';</script>";
    }
    return $error;
}

function effectifHomme($idname,$id){
        global $db;
        $communesql = $db->prepare("SELECT * FROM users WHERE (sexe = 'Lahy' and $idname = $id and statut = 'Mponina')");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function effectifFemme($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT * FROM users WHERE (sexe = 'Vavy' and $idname = $id and statut = 'Mponina')");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
?>