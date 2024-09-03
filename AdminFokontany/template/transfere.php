<?php
    $usersnav = true;
    include_once '../../ressourse/layoutFokontany/header.php';
    // if (isset($_POST["btnusersfkt"])) {
    //     $erroruser = insertionUsers();
    // }
    if (isset($_GET["idusers"])) {
        $user = affichageUsersAnkohonana('idusers',intval($_GET["idusers"]));
        $sarany = affichageSarany('idusers',intval($_GET["idusers"]));
    }
    // if (isset($_POST["btnusersAnkohonana"])) {
    //     $errorusers = insertionFamille();
    // }
    $secteur =  affichageSecteur("idfokontany",intval($_SESSION["idFokontanys"]));
    $carnet = affichageCarnetNew("idfokontany",intval($_SESSION["idFokontanys"]));
    $carnetold = affichageCarnetOld("idfokontany",intval($_SESSION["idFokontanys"]));
    $Fokontany = affichageFokontany();
    $sektera = get("sektera");

    if (isset($_POST["transfer"])) {
        $errorusers = transferUsers();
    }
    
?>  
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <a href="listeusers.php" class="float-start ms-2 mt-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
                    <div class="card-body">
                        <h4 class="card-title">Takelaka famindrana ireo olona aminy fokontany hafa</h4>
                        <?php if (isset($errorusers)) { ?>
                        <?php  foreach($errorusers as $erroruserss): ?>
                        <p class="card-description">
                            <?=$erroruserss?>
                        </p>
                        <?php
                         endforeach;
                   }?>
                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <?php foreach($user as $users) { ?>
                        <div class="form-group">
                                <label for="">Région : </label>
                                <input type="text" name="nomregion" class="form-control" id="nomregion"
                                    placeholder="Nom Région" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">District : </label>
                                <input type="text" name="nomdistrict" class="form-control" id="nomdistrict"
                                    placeholder="Nom District" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Commune : </label>
                                <input type="text" name="nomcommune" class="form-control" id="nomcommune"
                                    placeholder="Nom Commune" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Fokontany : </label>
                                <input type="text" name="nomfokontany" class="form-control" id="nomfokontany"
                                    placeholder="Nom Fokontany" readonly>
                            </div>
                            <div class="form-group">
                                <!-- <label for="">idFokontany : </label> -->
                                <input type="hidden" name="idFokontany" class="form-control" id="idFokontany"
                                    placeholder="Id Fokontany" readonly>
                            </div>
                            <div class="form-group select-box">
                                <div class="select-option">
                                    <input type="text" name="nomfokontany" placeholder="Safidio ny Fokontany" id="soValue" readonly>
                                </div>
                                <div class="content">
                                    <div class="search">
                                        <input type="search" id="optionSearch" placeholder="Search">
                                    </div>
                                    <ul class="options">
                                        <?php foreach($Fokontany as $Fokontanys) { ?>
                                        <li class="<?=$Fokontanys["idfokontany"]?>"><span><?=$Fokontanys["nomfokontany"]?></span>-<span><?=$Fokontanys["nomcommune"]?></span>-<span><?=$Fokontanys["nomdistrict"]?></span>-<span><?=$Fokontanys["nomregion"]?></span></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label for="">idSektera : </label> -->
                                <input type="hidden" name="idsektera" class="form-control" id="idsektera"
                                    placeholder="Id Sektera" readonly>
                            </div>
                            <label for="">Sektera : </label>
                            <div class="select-box1">
                                <div class="select-option1">
                                    <input type="text" name="secteur" placeholder="Safidio ny sektera" id="soValue1" readonly>
                                </div>
                                <div class="content1">
                                    <div class="search1">
                                        <input type="search" id="optionSearch1" placeholder="Search">
                                    </div>
                                    <ul class="options1">
                                    <?php foreach ($sektera as $sekteras) { ?>
                                        <li id="<?=$sekteras["idsektera"]?>" class="<?=$sekteras["idfokontany"]?>"><?=$sekteras["nomsektera"]?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php foreach($sarany as $saranys) {?>
                            <div class="form-group">
                                <label for="">Saram-pisoratana Anarana : </label>
                                <input type="text" value="<?=$saranys["sarampisoratana"]?>" name="droitpayes"
                                    class="form-control" id="droitpayes" placeholder="Ampidiro raha efa voaloha ny saram-pisoratana Anarana" readonly>
                            </div>
                        <?php } ?>
                            <div class="form-group">
                                <!-- <label for="">idFokontany : </label> -->
                                <input type="hidden" value="<?=$_SESSION["idFokontanys"]?>" 
                                    class="form-control" placeholder="Id Fokontany" readonly>
                            </div>
                    
                            <div class="form-group">
                                <!-- <label for="">Id Sektera : </label> -->
                                <input type="hidden" value="<?=$users["idusers"]?>"  class="form-control" id="idSektera"
                                    placeholder="Sektera" readonly>
                            </div>
                           <div class="form-group">
                           <label for="">Sektera : </label>
                                <input type="text" value="<?=$users["nomSecteur"]?>"  class="form-control" id="idSektera"
                                    placeholder="Sektera" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Finday : </label>
                                <input type="text" value="<?=$users["finday"]?>" name="contact" class="form-control" id="contact"
                                    placeholder="Laharana Finday" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Anarana : </label>
                                <input type="text" value="<?=$users["nom"]?>" name="nomusers" class="form-control" id="nomusers"
                                    placeholder="Ampidiro ny anarana" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Fanampin'Anarana : </label>
                                <input type="text" value="<?=$users["prenom"]?>" name="prenomusers" class="form-control" id="prenomusers"
                                    placeholder="Ampidiro ny fanampin'Anarana" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Taona naterahana : </label>
                                <input type="date" value="<?=$users["ddn"]?>" name="ddn" class="form-control" id="ddn"
                                    placeholder="Ampidiro ny taona naterahana" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Toerana naterahana : </label>
                                <input type="text" value="<?=$users["ddnlieux"]?>" name="lieuxnaissance" class="form-control" id="lieuxnaissance"
                                    placeholder="Ampidiro ny toerana naterahana" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Ray niteraka : </label>
                                <input type="text" value="<?=$users["rayniteraka"]?>" name="pere" class="form-control" id="pere"
                                    placeholder="Ampidiro ny Ray niteraka" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Reny niteraka : </label>
                                <input type="text" value="<?=$users["renyniterak"]?>" name="mere" class="form-control" id="mere"
                                    placeholder="Ampidiro ny reny niteraka" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Laharana karapanondro : </label>
                                <input type="number" value="<?=$users["cin"]?>" name="cin" class="form-control" id="cin"
                                    placeholder="Ampidiro ny laharana karapanondro" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Natao ny : </label>
                                <input type="date" value="<?=$users["cindate"]?>" name="datecin" class="form-control" id="datecin"
                                    placeholder="Ampidiro ny taona nanaovana karapanondro" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tao : </label>
                                <input type="text" value="<?=$users["cinlieux"]?>" name="lieuxcin" class="form-control" id="lieuxcin"
                                    placeholder="Ampidiro ny toerana nanaovana karapanondro" readonly>
                            </div>
                            <div class="form-group">
                                <div class="containerss">
                                    <figure class="image-container">
                                        <img id="chosen-imagee" src="../../Public/img/image_users/<?=$users["sary"]?>">
                                        <figcaption id="file-namee">
                                        </figcaption>
                                    </figure>
                                    <input class="inputphoto" type="file" name="imgFokontany" id="upload-buttonn"
                                        accept="image/*" readonly>
            
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Laharana pasipaoro : </label>
                                <input type="text" value="<?=$users["pasipaoronum"]?>" name="passportnum" class="form-control" id="passportnum"
                                    placeholder="Ampidiro ny laharana pasipaoro raha misy" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Toerana nanaovana pasipaoro : </label>
                                <input type="text" value="<?=$users["pasipaorolieux"]?>" name="passportlieux" class="form-control" id="passportlieux"
                                    placeholder="Ampidiro ny toerana nanaovana pasipaoro" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Fetran'ilay pasipaoro : </label>
                                <input type="text" value="<?=$users["pasipaorodelai"]?>" name="passportdelai" class="form-control" id="passportdelai"
                                    placeholder="Ampidiro ny fotoana hataperan'ilay pasipaoro" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Adiresy : </label>
                                <input type="text" value="<?=$users["adiresy"]?>" name="adresse" class="form-control" id="adresse"
                                    placeholder="Ampidiro ny adiresy" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Asa : </label>
                                <input type="text"  value="<?=$users["asaatao"]?>" name="travail" class="form-control" id="travail"
                                    placeholder="Ampidiro ny asa atao" readonly>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Toerana misy anao antokatrano : </label>
                                <input type="text" value="<?=$users["toeranaantrano"]?>" name="travail" class="form-control" id="travail"
                                    placeholder="Ampidiro ny asa atao" readonly>
                            </div>
                            <div class="form-group">
                            <input type="text" value="<?=$users["safidy"]?>"  name="travail" class="form-control" id="travail"
                                    placeholder="Ampidiro ny asa atao" readonly>
            
                            </div>
                            <div class="form-group">
                                <label for="">Sexa : </label>
                                <input type="text" value="<?=$users["sexe"]?>" name="travail" class="form-control" id="travail"
                                    placeholder="Ampidiro ny asa atao" readonly>
                            </div>

                            <div class="form-group">
                                <!-- <label for="">Teny miafina(Mot de passe) : </label> -->
                                <input type="hidden" value="<?=$users["mdp"]?>" name="pwd" class="form-control" id="pwd"
                                    placeholder="Ampidiro ny teny miafina" readonly>
                            </div>
                            <div class="form-group">
                                <!-- <label for="">Fanamafisana ny teny miafina(Confirmation de Mot de passe) : </label> -->
                                <input type="hidden" value="<?=$users["mdp"]?>" name="pwdConfi" class="form-control" id="pwdConfi"
                                    placeholder="Ampidiro ny teny miafina" readonly>
                            </div>
                             <!--Modal-->
                             <div class="modal fade" id="modal1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" aria-labelledby="modal title">
                                                Famindrana toerana
                                            </h5>
                                            <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                    class="ti-close"></i></button>
                                        </div>
                                        <div class="modal-body" aria-describedby="content">
                                            <p>Tena vonona ve ianao hamindra anio olona io aminy fokontany hafa?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-round"
                                                data-bs-dismiss="modal">Tsia</button>
                                            <button class="btn btn-danger btn-round"
                                                 name="transfer">Eny</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin du Modal-->
                           <?php } ?>
                        </form>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#modal1"
                            class="btn btn-primary mr-2">Alefa</button>
                        <a href="listeusers.php"><button class="btn btn-light">Ajanony</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <script src="../../js/transfere.js"></script>
    <!-- <script src="../../js/ajouusers.js"></script> -->
    <?php
    include_once '../../ressourse/layoutFokontany/footer.php';
?>