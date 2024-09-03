<?php
    $usersnav = true;
    include_once '../../ressourse/layoutFokontany/header.php';
    // if (isset($_POST["btnusersfkt"])) {
    //     $erroruser = insertionUsers();
    // }
    if (isset($_GET["idusers"])) {
        $user = affichageUsers('idusers',intval($_GET["idusers"]));
    }
    if (isset($_POST["btnusersAnkohonana"])) {
        $errorusers = insertionFamille();
    }
    $secteur =  affichageSecteur("idfokontany",intval($_SESSION["idFokontanys"]));
    $carnet = affichageCarnetNew("idfokontany",intval($_SESSION["idFokontanys"]));
    $carnetold = affichageCarnetOld("idfokontany",intval($_SESSION["idFokontanys"]));
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Takelaka fampidirana ireo olona mba hahazo karinem-pokontany</h4>
                        <?php if (isset($errorusers)) { ?>
                        <?php  foreach($errorusers as $erroruserss): ?>
                        <p class="card-description">
                            <?=$erroruserss?>
                        </p>
                        <?php
                         endforeach;
                   }?>
                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                            <!-- <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Photo</button>
                          </span>
                        </div>
                      </div> -->
                      <?php foreach($user as $users) { ?>
                        <label for="">Laharana Karine : </label>
                        <div class="form-group">
                                <!-- <label for="">idFokontany : </label> -->
                                <input type="hidden" name="idkarine" class="form-control" id="idSektera" placeholder="Id karine" readonly>
                            </div>
                            <label for="">Vaovao : </label>
                            <div class="form-group select-box">
                                <div class="select-option">
                                    <input type="text" name="nomSektera" placeholder="Safidy ny Laharana Karine Vaovao" id="soValue"
                                        readonly>
                                </div>
                                <div class="content">
                                    <div class="search">
                                        <input type="search" id="optionSearch" placeholder="Search">
                                    </div>
                                    <ul class="options">
                                        <?php foreach ($carnet as $carnets) { ?>
                                        <li id="<?=$carnets["idkarine"]?>"><?=$carnets["laharanakarine"]?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <label for="">Efa miasa : </label>
                            <div class="select-box1">
                                <div class="select-option1">
                                    <input type="text" placeholder="Safidy laharana karine efa miasa" id="soValue1" readonly>
                                </div>
                                <div class="content1">
                                    <div class="search1">
                                        <input type="search" name="" id="optionSearch1" placeholder="Search">
                                    </div>
                                    <ul class="options1">
                                    <?php foreach ($carnetold as $carnetolds) { ?>
                                        <li class="<?=$carnetolds["idkarine"]?>"><?=$carnetolds["laharanakarine"]?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="">Saram-pisoratana Anarana : </label>
                                <select class="form-select" name="droitpayes">
                                    <option value="Tsy voaloha">Tsy voaloha</option>
                                    <option value="Voaloha">Voaloha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <!-- <label for="">idFokontany : </label> -->
                                <input type="hidden" value="<?=$_SESSION["idFokontanys"]?>" name="idFokontany"
                                    class="form-control" id="idFokontanysession" placeholder="Id Fokontany" readonly>
                            </div>
                    
                            <div class="form-group">
                                <!-- <label for="">Id Sektera : </label> -->
                                <input type="hidden" value="<?=$users["idusers"]?>" name="idusers" class="form-control" id="idSektera"
                                    placeholder="Sektera" readonly>
                            </div>
                           <div class="form-group">
                           <label for="">Sektera : </label>
                                <input type="text" value="<?=$users["nomSecteur"]?>" name="idSektera" class="form-control" id="idSektera"
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
                            <div class="form-group">
                                <label for="">Daty nanoratana anarana : </label>
                                <input type="text" value="<?=$users["date"]?>" name="pwdConfi" class="form-control" id="pwdConfi"
                                    placeholder="Ampidiro ny teny miafina" readonly>
                            </div>
                             <!--Modal-->
                             <div class="modal fade" id="modal1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" aria-labelledby="modal title">
                                                Fanovana
                                            </h5>
                                            <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                    class="ti-close"></i></button>
                                        </div>
                                        <div class="modal-body" aria-describedby="content">
                                            <p>Tena vonona ve ianao hampiditra anio lisitra iray io ho ao aminy fokontany izay misy anao?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-round"
                                                data-bs-dismiss="modal">Tsia</button>
                                            <button class="btn btn-danger btn-round"
                                                name="btnusersAnkohonana">Eny</button>
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
    <script src="../../js/laharanakarineold.js"></script>
    <!-- <script src="../../js/ajouusers.js"></script> -->
    <?php
    include_once '../../ressourse/layoutFokontany/footer.php';
?>