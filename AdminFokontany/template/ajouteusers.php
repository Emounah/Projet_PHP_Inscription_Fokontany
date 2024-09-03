<?php
    $usersnav = true;
    include_once '../../ressourse/layoutFokontany/header.php';
    if (isset($_POST["btnusersfkt"])) {
        $erroruser = insertionUsers();
    }
    $secteur =  affichageSecteur("idfokontany",intval($_SESSION["idFokontanys"]));
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <a href="listeusers.php" class="float-start ms-2 mt-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
                    <div class="card-body">
                        <h4 class="card-title">Takelaka fampidirana ireo olona amin'ny Fokontany</h4>
                        <?php if (isset($erroruser)) { ?>
                        <?php  foreach($erroruser as $errorusers): ?>
                        <p class="card-description">
                            <?=$errorusers?>
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
                            <div class="form-group">
                                <!-- <label for="">idFokontany : </label> -->
                                <input type="hidden" value="<?=$_SESSION["idFokontanys"]?>" name="idFokontany"
                                    class="form-control" id="idFokontanysession" placeholder="Id Fokontany" readonly>
                            </div>
                            <div class="form-group">
                                <!-- <label for="">Id Sektera : </label> -->
                                <input type="hidden" value="<?=isset($_POST["idSektera"])?$_POST["idSektera"]:""?>" name="idSektera" class="form-control" id="idSektera"
                                    placeholder="Sektera" readonly>
                            </div>
                           <label for="">Sektera : </label>
                            <div class="form-group select-box">
                                <div class="select-option">
                                    <input type="text" value="<?=isset($_POST["nomSektera"])?$_POST["nomSektera"]:""?>" name="nomSektera" placeholder="Safidio ny Sektera" id="soValue"
                                        readonly>
                                </div>
                                <div class="content">
                                    <div class="search">
                                        <input type="search" id="optionSearch" placeholder="Search">
                                    </div>
                                    <ul class="options">
                                        <?php foreach ($secteur as $secteurs) { ?>
                                        <li id="<?=$secteurs["idsektera"]?>"><?=$secteurs["nomsektera"]?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Finday : </label>
                                <input type="text" value="<?=isset($_POST["contact"])?$_POST["contact"]:""?>" name="contact" class="form-control" id="contact"
                                    placeholder="Laharana Finday">
                            </div>
                            <div class="form-group">
                                <label for="">Anarana : </label>
                                <input type="text" value="<?=isset($_POST["nomusers"])?$_POST["nomusers"]:""?>" name="nomusers" class="form-control" id="nomusers"
                                    placeholder="Ampidiro ny anarana" required>
                            </div>
                            <div class="form-group">
                                <label for="">Fanampin'Anarana : </label>
                                <input type="text" value="<?=isset($_POST["prenomusers"])?$_POST["prenomusers"]:""?>" name="prenomusers" class="form-control" id="prenomusers"
                                    placeholder="Ampidiro ny fanampin'Anarana" required>
                            </div>
                            <div class="form-group">
                                <label for="">Taona naterahana : </label>
                                <input type="date" value="<?=isset($_POST["ddn"])?$_POST["ddn"]:""?>" name="ddn" class="form-control" id="ddn"
                                    placeholder="Ampidiro ny taona naterahana" required>
                            </div>
                            <div class="form-group">
                                <label for="">Toerana naterahana : </label>
                                <input type="text" value="<?=isset($_POST["lieuxnaissance"])?$_POST["lieuxnaissance"]:""?>" name="lieuxnaissance" class="form-control" id="lieuxnaissance"
                                    placeholder="Ampidiro ny toerana naterahana" required>
                            </div>
                            <div class="form-group">
                                <label for="">Ray niteraka : </label>
                                <input type="text" value="<?=isset($_POST["pere"])?$_POST["pere"]:""?>" name="pere" class="form-control" id="pere"
                                    placeholder="Ampidiro ny Ray niteraka" required>
                            </div>
                            <div class="form-group">
                                <label for="">Reny niteraka : </label>
                                <input type="text" value="<?=isset($_POST["mere"])?$_POST["mere"]:""?>" name="mere" class="form-control" id="mere"
                                    placeholder="Ampidiro ny reny niteraka" required>
                            </div>
                            <div class="form-group">
                                <label for="">Laharana karapanondro : </label>
                                <input type="number" value="<?=isset($_POST["cin"])?$_POST["cin"]:""?>" name="cin" class="form-control" id="cin"
                                    placeholder="Ampidiro ny laharana karapanondro">
                            </div>
                            <div class="form-group">
                                <label for="">Natao ny : </label>
                                <input type="date" value="<?=isset($_POST["datecin"])?$_POST["datecin"]:""?>" name="datecin" class="form-control" id="datecin"
                                    placeholder="Ampidiro ny taona nanaovana karapanondro">
                            </div>
                            <div class="form-group">
                                <label for="">Tao : </label>
                                <input type="text" value="<?=isset($_POST["lieuxcin"])?$_POST["lieuxcin"]:""?>" name="lieuxcin" class="form-control" id="lieuxcin"
                                    placeholder="Ampidiro ny toerana nanaovana karapanondro" >
                            </div>
                            <div class="form-group">
                                <div class="containerss">
                                    <figure class="image-container">
                                        <img id="chosen-imagee">
                                        <figcaption id="file-namee">
                                        </figcaption>
                                    </figure>
                                    <input class="inputphoto" value="<?=isset($_FILES["imgFokontany"])?$_FILES["imgFokontany"]:""?>" type="file" name="imgFokontany" id="upload-buttonn"
                                        accept="image/*">
                                    <label class="labelphoto" for="upload-buttonn">
                                        <i class="fas fa-upload"></i> &nbsp;Ampidiro ny sary
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Laharana pasipaoro : </label>
                                <input type="text" value="<?=isset($_POST["passportnum"])?$_POST["passportnum"]:""?>" name="passportnum" class="form-control" id="passportnum"
                                    placeholder="Ampidiro ny laharana pasipaoro raha misy">
                            </div>
                            <div class="form-group">
                                <label for="">Toerana nanaovana pasipaoro : </label>
                                <input type="text" value="<?=isset($_POST["passportlieux"])?$_POST["passportlieux"]:""?>" name="passportlieux" class="form-control" id="passportlieux"
                                    placeholder="Ampidiro ny toerana nanaovana pasipaoro">
                            </div>
                            <div class="form-group">
                                <label for="">Fetran'ilay pasipaoro : </label>
                                <input type="text" value="<?=isset($_POST["passportdelai"])?$_POST["passportdelai"]:""?>" name="passportdelai" class="form-control" id="passportdelai"
                                    placeholder="Ampidiro ny fotoana hataperan'ilay pasipaoro">
                            </div>
                            <div class="form-group">
                                <label for="">Adiresy : </label>
                                <input type="text" value="<?=isset($_POST["adresse"])?$_POST["adresse"]:""?>" name="adresse" class="form-control" id="adresse"
                                    placeholder="Ampidiro ny adiresy" required>
                            </div>
                            <div class="form-group">
                                <label for="">Asa : </label>
                                <input type="text" value="<?=isset($_POST["travail"])?$_POST["travail"]:""?>" name="travail" class="form-control" id="travail"
                                    placeholder="Ampidiro ny asa atao" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Toerana misy anao antokatrano : </label>
                                <select class="form-select inputselect" value="<?=isset($_POST["toerna"])?$_POST["toerana"]:""?>" name="toerana" required>
                    <option><?=isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana"?></option>
                    <option><?=((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana" && (isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")!="Vady")?"Vady":"Loham-pianakaviana"?></option>
                    <option><?=((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana"?"Vady":"Loham-pianakaviana")=="Vady"?"Zanaka":"Vady"?></option>
                    <option><?=(((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana"?"Vady":"Loham-pianakaviana")=="Vady"?"Zanaka":"Vady")=="Zanaka"?"Miaramonina":"Zanaka"?></option>
                </select>
                            </div>
                            <div class="form-group">
                            <div class="form-check">
                    <input class="radiompTomp" type="radio" class="form-check-input" id="radio1" name="optradio"
                    value="<?=isset($_POST["optradio"])?$_POST["optradio"]:"Tompon-trano"?>" checked>
                    <label class="form-check-label" for="radio1"><?=isset($_POST["optradio"])?$_POST["optradio"]:"Tompon-trano"?></label>
                </div>
                <div class="form-check">
                    <input class="radiompTomp" type="radio" class="form-check-input" id="radio2" name="optradio"
                    value="<?=((isset($_POST["optradio"])?$_POST["optradio"]:"Tompon-trano"))=="Tompon-trano"?"Mpanofa":"Tompon-trano"?>">
                    <label class="form-check-label" for="radio2"><?=(isset($_POST["optradio"])?$_POST["optradio"]:"Tompon-trano")=="Tompon-trano"?"Mpanofa":"Tompon-trano"?></label>
                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Sexa : </label>
                                <select class="form-select inputselect" name="sexe" required>
                    <option value="<?=isset($_POST["sexe"])?$_POST["sexe"]:"Lahy"?>"><?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"H":"F"?></option>
                    <option value="<?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"Vavy":"Lahy"?>"><?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"F":"H"?></option>
                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Teny miafina(Mot de passe) : </label>
                                <input type="password" value="<?=isset($_POST["pwd"])?$_POST["pwd"]:""?>" name="pwd" class="form-control" id="pwd"
                                    placeholder="Ampidiro ny teny miafina" required>
                            </div>
                            <div class="form-group">
                                <label for="">Fanamafisana ny teny miafina(Confirmation de Mot de passe) : </label>
                                <input type="password" value="<?=isset($_POST["pwdConfi"])?$_POST["pwdConfi"]:""?>" name="pwdConfi" class="form-control" id="pwdConfi"
                                    placeholder="Ampidiro ny teny miafina" required>
                            </div>
                            <button type="submit" name="btnusersfkt" class="btn btn-primary mr-2">Alefa</button>
                            <button class="btn btn-light">Ajanona</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <script src="../../js/ajouusers.js"></script>
    <?php
    include_once '../../ressourse/layoutFokontany/footer.php';
?>