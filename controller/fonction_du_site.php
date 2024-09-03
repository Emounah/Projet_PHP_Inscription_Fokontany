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
function affichagePresidentFkt()
{
        global $db;
        $communesql = $db->prepare("SELECT users.idusers,users.idfokontany,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.adiresy,users.asaatao,users.sexe,users.mdp,users.statut,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras FROM users WHERE statut='Filoham-pokontany'");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function region()
{
        global $db;
        $communesql = $db->query("SELECT * FROM faritra");
        $x = $communesql->fetchAll();
        return $x;
}
function Distric()
{
        global $db;
        $communesql = $db->prepare("SELECT DISTINCT distrika_kaominina.idboribory,distrika_kaominina.idkaominina,distrika_kaominina.iddistrika_kaominina,(SELECT distinct boriborintany.distrika from boriborintany where boriborintany.idboribory = distrika_kaominina.idboribory) AS district,(SELECT DISTINCT kaominina.nomkaominina from kaominina where kaominina.idkaominina = distrika_kaominina.idkaominina) AS commune,(SELECT distinct idfaritra from kaominina where kaominina.idkaominina = distrika_kaominina.idkaominina) AS idregion,(SELECT distinct nomfaritra from faritra where faritra.idfaritra = idregion) AS region FROM distrika_kaominina");
        $communesql->execute();
        $x = $communesql->fetchAll();
        return $x;
}
function affichageSecteur($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT sektera.idsektera,sektera.nomsektera,sektera.idfokontany FROM sektera WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function insertionUsers(){
    global $db;
    $idfokontany = intval($_POST['idFokontany']);
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

    if (!empty($idfokontany) && !empty($idSektera) && !empty($nomusers) && !empty($prenomusers) && !empty($ddn) && !empty($lieuxnaissance) && !empty($pere) && !empty($mere) && !empty($imgFokontany) && !empty($adresse) && !empty($travail) && !empty($toerana) && !empty($pwd) && !empty($pwdConfi) && !empty($cin) && !empty($datecin) && !empty($lieuxcin) && !empty($contact)) {
        $usersExist = $db->prepare("SELECT * FROM users WHERE (((nom  = ? and prenom = ? and ddn = ? and ddnlieux = ? and rayniteraka = ? and renyniterak = ?) or (cin = ?)) and (not statut = 'Filoham-pokontany'))");
        $usersExist->execute([$nomusers,$prenomusers,$ddn,$lieuxnaissance,$pere,$mere,$cin]);
        $nbusersExist = $usersExist->rowCount();
        $nbCin = strlen($cin);
        $nbmdp = strlen($pwd);
        if ($nbusersExist == 0) {
            if ($nbmdp >= 8) {
                if ($pwd == $pwdConfi) {
                    if ($_FILES["imgFokontany"]["error"]==0) {
                        if ($nbCin == 12) {
                            $error [0] = "Tafiditra soamantsara ny mombamombanao";
                            $validation = true;
                        }else{
                            $error [6] = "Diso ny laharana karapanondro izay nampidirinao";
                            $validation = false;
                        }
                    }else{
                        $error [5] = "Misy olana ny fampidirana an'ilay sary";
                        $validation = false;
                    }
                }else{
                    $error [4] = "Diso ny teny miafina izay nampidirinao";
                    $validation = false;
                }
            }else{
                $error [3] = "Tsy azo atao latsakiny valo ny teny miafina";
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
       move_uploaded_file($_FILES["imgFokontany"]["tmp_name"],'Public/img/image_users/'.basename($imgFokontany["name"]));
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
    }
    return $error;
}

function connectionUsers(){
    global $db;
    $cinuser = htmlentities($_POST["cinuser"]);
    $mdpuser = htmlentities($_POST["mdpuser"]);
    
    $error = [];
    if (!empty($cinuser) && !empty($mdpuser)) {
        $verifcinuser = $db->prepare ("SELECT users.idusers,users.idfokontany,users.idsektera,users.finday,users.nom,users.prenom,users.ddn,users.ddnlieux,users.rayniteraka,users.renyniterak,users.cin,users.cindate,users.cinlieux,users.sary,users.pasipaoronum,users.pasipaorolieux,users.pasipaorodelai,users.adiresy,users.asaatao,users.toeranaantrano,users.safidy,users.sexe,users.mdp,users.statut,(SELECT fokontany.idfokontany from fokontany where fokontany.idfokontany = users.idfokontany) AS idFokontanys,(SELECT fokontany.nomfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS nomFokontanys,(SELECT fokontany.saryfokontany from fokontany where fokontany.idfokontany = idFokontanys) AS saryFokontanys,(SELECT fokontany.iddistrika_kaominina from fokontany WHERE fokontany.idfokontany = idFokontanys) AS iddistrika_kaomininas,(SELECT distrika_kaominina.idboribory from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idDistrikas,(SELECT boriborintany.distrika from boriborintany where boriborintany.idboribory = idDistrikas) AS nomDistrikas,(SELECT distrika_kaominina.idkaominina from distrika_kaominina where distrika_kaominina.iddistrika_kaominina = iddistrika_kaomininas) AS idKaomininas,(SELECT kaominina.nomkaominina from kaominina where kaominina.idkaominina = idKaomininas) AS nomKaomininas,(SELECT kaominina.idfaritra from kaominina WHERE kaominina.idkaominina = idKaomininas) AS idFaritras,(SELECT faritra.nomfaritra from faritra WHERE faritra.idfaritra = idFaritras) AS nomFaritras,(SELECT sektera.nomsektera FROM sektera WHERE sektera.idsektera = users.idsektera) AS nomSecteur FROM users WHERE (cin = ? and (statut='Mponina' or statut='Filoham-pokontany'))");
        $verifcinuser->execute([$cinuser]);

        $cinuserExiste = $verifcinuser->rowCount();
        if ($cinuserExiste!=0) {
            $mdpuserExist = $verifcinuser->fetch();
            if (chiffrement($mdpuser) == $mdpuserExist["mdp"]) {
                $_SESSION["idusersUser"] = $mdpuserExist["idusers"];
                $_SESSION["findayUser"] = $mdpuserExist["finday"];
                $_SESSION["nomUser"] = $mdpuserExist["nom"];
                $_SESSION["prenomUser"] = $mdpuserExist["prenom"];
                $_SESSION["ddnUser"] = $mdpuserExist["ddn"];
                $_SESSION["ddnlieuxUser"] = $mdpuserExist["ddnlieux"];
                $_SESSION["rayniterakaUser"] = $mdpuserExist["rayniteraka"];
                $_SESSION["renyniterakUser"] = $mdpuserExist["renyniterak"];
                $_SESSION["cinUser"] = $mdpuserExist["cin"];
                $_SESSION["cindateUser"] = $mdpuserExist["cindate"];
                $_SESSION["cinlieuxUser"] = $mdpuserExist["cinlieux"];
                $_SESSION["saryUser"] = $mdpuserExist["sary"];
                $_SESSION["adiresyUser"] = $mdpuserExist["adiresy"];
                $_SESSION["asaataoUser"] = $mdpuserExist["asaatao"];
                $_SESSION["toeranaantranoUser"] = $mdpuserExist["toeranaantrano"];
                $_SESSION["sexeUser"] = $mdpuserExist["sexe"];
                $_SESSION["mdpUser"] = $mdpuserExist["mdp"];
                $_SESSION["statutUser"] = $mdpuserExist["statut"];
                $_SESSION["idFokontanysUser"] = $mdpuserExist["idFokontanys"];
                $_SESSION["idsekteraUser"] = $mdpuserExist["idsektera"];
                $_SESSION["nomSecteurUser"] = $mdpuserExist["nomSecteur"];
                $_SESSION["nomDistrikasUser"] = $mdpuserExist["nomDistrikas"];
                $_SESSION["nomFokontanysUser"] = $mdpuserExist["nomFokontanys"];
                $_SESSION["nomKaomininasUser"] = $mdpuserExist["nomKaomininas"];
                $_SESSION["nomFaritrasUser"] = $mdpuserExist["nomFaritras"];

                $_SESSION["pasipaoronumUser"] = $mdpuserExist["pasipaoronum"];
                $_SESSION["pasipaorolieuxUser"] = $mdpuserExist["pasipaorolieux"];
                $_SESSION["pasipaorodelaiUser"] = $mdpuserExist["pasipaorodelai"];

                if ($_SESSION["statutUser"] == "Mponina") {                    
                    header("Location:membre.php");
                }
                if ($_SESSION["statutUser"] == "Filoham-pokontany") {
                    header("Location:membreAdmin.php");
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
function affichagePublication($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT*FROM publications WHERE $idname = $id order by idpublication desc;");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function sqlCarnet($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT DISTINCT ankohonana.idkarine FROM ankohonana WHERE  $idname = $id ");
    $communesql->execute();
    $x = $communesql->fetch();
    return $x;
}
function sqlCarnetNumero($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT DISTINCT karine.laharanakarine FROM karine WHERE  $idname = $id ");
    $communesql->execute();
    $x = $communesql->fetch();
    return $x;
}
function affichageAnkohonana($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT ankohonana.idankohonana,ankohonana.idkarine,ankohonana.idusers,ankohonana.idfokontany,ankohonana.sarampisoratana,(SELECT karine.laharanakarine FROM karine WHERE karine.idkarine = ankohonana.idkarine) AS numeroCarnet,(SELECT users.idsektera FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS IdSecteur,(SELECT sektera.nomsektera FROM sektera WHERE sektera.idsektera = IdSecteur) AS nomSecteur,(SELECT users.finday FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS ContactUsers,(SELECT users.nom FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS NomtUsers,(SELECT users.prenom FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS PrenomtUsers,(SELECT users.ddn FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS DdntUsers,(SELECT users.cin FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS NumeroCin,(SELECT users.ddnlieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS ddnlieuxUsers,(SELECT users.rayniteraka FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS rayniterakaUsers,(SELECT users.renyniterak FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS renyniterakUsers,(SELECT users.cindate FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS cindateUsers,(SELECT users.cinlieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS cinlieuxUsers,(SELECT users.sary FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS saryUsers,(SELECT users.pasipaoronum FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaoronumUsers,(SELECT users.pasipaorolieux FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaorolieuxUsers,(SELECT users.pasipaorodelai FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS pasipaorodelaiUsers,(SELECT users.adiresy FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS adiresyUsers,(SELECT users.asaatao FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS asaataoUsers,(SELECT users.toeranaantrano FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS toeranaantranoUsers,(SELECT users.safidy FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS safidyUsers,(SELECT users.sexe FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS sexeUsers,(SELECT users.mdp FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS mdpUsers,(SELECT users.date FROM users WHERE users.idusers = ankohonana.idusers and statut = 'Mponina') AS usersDate FROM ankohonana WHERE  $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}

function insertionUsersAnkohonana($numCarnet){
    global $db;
    $idfokontany = intval($_POST['idFokontany']);
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

    if (!empty($idfokontany) && !empty($idSektera) && !empty($nomusers) && !empty($prenomusers) && !empty($ddn) && !empty($lieuxnaissance) && !empty($pere) && !empty($mere) && !empty($imgFokontany) && !empty($adresse) && !empty($travail) && !empty($toerana) && !empty($pwd) && !empty($pwdConfi) && !empty($contact)) {
        $usersExist = $db->prepare("SELECT * FROM users WHERE (((nom  = ? and prenom = ? and ddn = ? and ddnlieux = ? and rayniteraka = ? and renyniterak = ?) or ((cin is not null) and (cin = ?))) and (not statut = 'Filoham-pokontany'))");
        $usersExist->execute([$nomusers,$prenomusers,$ddn,$lieuxnaissance,$pere,$mere,$cin]);
        $nbusersExist = $usersExist->rowCount();
        $nbmdp = strlen($pwd);
        if ($nbusersExist == 0) {
            if ($nbmdp >= 8) {
                if ($pwd == $pwdConfi) {
                    if ($_FILES["imgFokontany"]["error"]==0) {
                            $error [0] = "Tafiditra soamantsara ny mombamombanao";
                            $validation = true;
                    }else{
                        $error [5] = "Misy olana ny fampidirana an'ilay sary";
                        $validation = false;
                    }
                }else{
                    $error [4] = "Diso ny teny miafina izay nampidirinao";
                    $validation = false;
                }
            }else{
                $error [3] = "Tsy azo atao latsakiny valo ny teny miafina";
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
       $inserCommune = $db->prepare("INSERT INTO users(idfokontany,idsektera,finday,nom,prenom,ddn,ddnlieux,rayniteraka,renyniterak,cin,cindate,cinlieux,sary,pasipaoronum,pasipaorolieux,pasipaorodelai,adiresy,asaatao,toeranaantrano,safidy,sexe,mdp,numkarine,statut) VALUE(:idfokontany,:idsektera,:finday,:nom,:prenom,:ddn,:ddnlieux,:rayniteraka,:renyniterak,:cin,:cindate,:cinlieux,:sary,:pasipaoronum,:pasipaorolieux,:pasipaorodelai,:adiresy,:asaatao,:toeranaantrano,:safidy,:sexe,:mdp,:numkarine,:statut)");
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
           "numkarine"=>$numCarnet,
           "statut"=>'Vaovao',
       ]);
       move_uploaded_file($_FILES["imgFokontany"]["tmp_name"],'Public/img/image_users/'.basename($imgFokontany["name"]));
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
       $_POST['travail']="";
       $_POST['toerana']="";
       $_POST['pwd']="";
       $_POST['pwdConfi']="";
          echo "<script>window.location.href='membre.php';</script>";
    }
    return $error;
}

function get($nomentity){
    global $db;
    $stmt=$db->prepare("SELECT*FROM $nomentity");
    $stmt->execute();
    $all=$stmt->fetchAll();
    return $all;
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
function payementFrais(){
    global $db;
    $iduserspayer = intval($_POST['iduserspayer']);
    if (!empty($iduserspayer)) {        
        $table="ankohonana";
        $params = [
         "sarampisoratana"=>'Voaloha',
        ];
       updateentity($table,$params,$iduserspayer,"idankohonana");
       echo "<script>window.location.href='membre.php';</script>";
       return "Voaloha ny saram-pisoratan'anarana izay nalohanao";
    }else{
        return "Efa voaloha ny saram-pisoratan'anarana anio olona io";
    }
    //   echo "<script>window.location.href='listeusers.php';</script>";
}
function insertionAdidy(){
    global $db;
    $message = "";
    $idkarine = intval($_POST['idkarine']);
    $daty = date($_POST["dateadidy"]);
    if (!empty($daty)) {      
        $inserCommune = $db->prepare("INSERT INTO adidy(idkarine,prix,ans) VALUE(:idkarine,:prix,:ans)");
        $inserCommune->execute([
            "idkarine"=>$idkarine,
            "prix"=>'Voaloha',
            "ans"=>$daty,
        ]);
        echo "<script>window.location.href='membre.php';</script>";
        $message = "Voaloha ny adidinao";
    }else{
        $message = "Fenoy Takelaka";
    }
    return $message;
}

function insertionSazy(){
    global $db;
    $message = "";
    $idkarine = intval($_POST['idkarine']);
    $motif = htmlentities($_POST['motif']);
    $daty = date($_POST['dateabsent']);

    if (!empty($motif) && !empty($daty)) {      
        $inserCommune = $db->prepare("INSERT INTO sazy(idkarine,presence,motif,date) VALUE(:idkarine,:presence,:motif,:date)");
        $inserCommune->execute([
            "idkarine"=>$idkarine,
            "presence"=>'Tonga',
            "motif"=>$motif,
            "date"=>$daty,
        ]);
        echo "<script>window.location.href='membre.php';</script>";
        $message = "Voaloha soamantsara ny sazy izay naloanao";

    }else{
        $message = "Fenoy Takelaka";
    }
    return $message;
}

function affichageFilazana($page,$idname,$id): array
{
    global $db;
   global $LIMIT;

    $startIndex = $page === 1 ? 0 : ($page * $LIMIT)-$LIMIT;

    $defaultSql = "SELECT * FROM publications";

    $defaultSqlLimit = " limit " . $startIndex . ", " . $LIMIT;

    $defaultSqlOrder = " ORDER BY publications.idpublication DESC ".$defaultSqlLimit.";";
    $condition = " WHERE ".$idname."=".$id;

        $sql =  $defaultSql.$condition.$defaultSqlOrder;
        $statment = $db->query($sql);
        return [
            "filazana" => $statment->fetchAll(),
            "count" => $statment->rowCount(),
        ];
}

function getFilazana($idname,$id): int
{
    global $db;
    $sql = "SELECT * FROM publications WHERE $idname=$id";
    $statment = $db->query($sql);
    return $statment->rowCount();
}

function insertionFilazana(){
    global $db;
    $idfokontany = intval($_POST['idfokontany']);
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
       echo "<script>window.location.href='membreAdmin.php';</script>";
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

function affichageSazy($idname,$id){
    global $db;
    $communesql = $db->prepare("SELECT sazy.idsazy,sazy.idkarine,sazy.presence,sazy.motif,sazy.date,(SELECT karine.laharanakarine FROM karine WHERE karine.idkarine = sazy.idkarine) AS laharanaKarineSazy FROM sazy WHERE $idname = $id");
    $communesql->execute();
    $x = $communesql->fetchAll();
    return $x;
}
function updateMdp(){
    global $db;
    $idusersmdp = $_POST["idusersmdp"];
    $mdpancien = $_POST['mdpancien'];
    $mdpnouveau = $_POST['mdpnouveau'];
    $mdpnouveauconfi = $_POST["mdpnouveauconfi"];
    $error=[];
    $validation = true;

    if (!empty($mdpancien) && !empty($mdpnouveau) && !empty($mdpnouveauconfi)) {
        $usersExist = $db->prepare("SELECT * FROM users WHERE mdp = ? and idusers = ?");
        $usersExist->execute([chiffrement($mdpancien),$idusersmdp]);
        $nbusersExist = $usersExist->rowCount();
        $nbmdp = strlen($mdpnouveau);
        if ($nbusersExist != 0) {
            if ($nbmdp >= 8) {
                if ($mdpnouveau  == $mdpnouveauconfi) {
                    $error [0] = "Voahova ny teny miafina izay novanao";
                    $validation = true;
                }else{
                    $error [4] = "Hamarino tsara ny teny miafina vaovao izay nampidirinao";
                    $validation = false;
                }
            }else{
                $error [3] = "Tsy mahazo atao latsikiny valo ny teny miafina";
                $validation = false;

            }
        }else{
            $error [2] = "Diso ny teny miafina teo aloha izay nampidirinao";
            $validation = false;
        }
    }else{
        $error [1] = "Tsy maintsy fenoina ny takelaka izay natao ho fenoina";
        $validation = false;
    }

    if ($validation) {
            $table="users";
            $params = [
                "mdp"=>chiffrement($mdpnouveauconfi),
            ];
            updateentity($table,$params,$idusersmdp,"idusers");   
            echo "<script>window.location.href='membre.php';</script>";
  
    }
    return $error;
}
