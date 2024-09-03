<?php
   $fisoratananav = true;
   include_once 'ressourse/layouts/page/header.php';
   if (isset($_POST["btninscr"])) {
      $erroruser = insertionUsers();
   }
   $Fokontany = sqlFokontany("idfokontany",intval($_GET["idfokontany"]));
   $affichageSecteur = affichageSecteur("idfokontany",intval($_GET["idfokontany"]));
?>
<section class="sec2-safidy sec2-inscri">
    <div class="titre">
        <a href="safidy.php" class="mt-2 mb-2" > <button class="btn btn-danger btn-round"><i class="fas fa-arrow-left-long"></i></button> </a>
        <h1>TAKELAKA FISORATANA ANARANA</h1>
        <span>Vakio tsara ny takelaka ho fenona mba tsy ho hisy diso ny mombamomba anao</span>
    </div>
    <form class="forminscri bg-white" method="post" enctype="multipart/form-data">

    <?php
           if (isset($erroruser)) {
            foreach($erroruser as $errorusers):
            ?>
            <p class="text-danger text-center"><?=$errorusers?></p>
            <?php
            endforeach;
        
           }?>
        <?php foreach ($Fokontany as $Fokontanys) ?>
        <div class="row">
            <div class="col">
                <!-- <label for="" class="form-label">idFokontany :</label> -->
                <input type="hidden" value="<?=$Fokontanys["idfokontany"]?>" name="idFokontany" id="idfokontany"
                    class="form-control" placeholder="Id fokontany" readonly>
            </div>
            <div class="col">
                <!-- <label for="" class="form-label">idSektera :</label> -->
                <input type="hidden" value="<?=isset($_POST["idSektera"])?$_POST["idSektera"]:""?>" name="idSektera" id="idsektera" class="form-control" placeholder="Id Sektera"
                    readonly>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="" class="form-label">Faritra :</label>
                <input type="text" value="<?=$Fokontanys["nomregion"]?>" class="form-control"
                    placeholder="Faritra misy anao" readonly>
            </div>
            <div class="col">
                <label for="" class="form-label">Distrika :</label>
                <input type="text" value="<?=$Fokontanys["nomdistrict"]?>" class="form-control"
                    placeholder="Distrika misy anao" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Kaominina</label>
                <input type="text" value="<?=$Fokontanys["nomcommune"]?>" class="form-control"
                    placeholder="Kaominina misy anao" readonly>
            </div>
            <div class="col">
                <label for="" class="form-label">Fokontany</label>
                <input type="text" value="<?=$Fokontanys["nomfokontany"]?>" class="form-control"
                    placeholder="Fokontany misy anao" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Sektera misy anao : </label>
                <div class="form-group select-box">
                    <div class="select-option">
                        <input type="text" value="<?=isset($_POST["nomSektera"])?$_POST["nomSektera"]:""?>" name="nomSektera" placeholder="Safidio ny Sektera" id="soValue" readonly>
                    </div>
                    <div class="content">
                        <div class="search">
                            <input type="search" id="optionSearch" placeholder="Fitediavana">
                        </div>
                        <ul class="options">
                            <?php foreach ($affichageSecteur as $affichageSecteurs) { ?>
                            <li id="<?=$affichageSecteurs["idsektera"]?>"><?=$affichageSecteurs["nomsektera"]?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <label for="" class="form-label">Laharana finday :</label>
                <input type="number" value="<?=isset($_POST["contact"])?$_POST["contact"]:""?>" name="contact" class="form-control" placeholder="Ampidiro laharampindainao"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Anarana :</label>
                <input type="text" value="<?=isset($_POST["nomusers"])?$_POST["nomusers"]:""?>" name="nomusers" class="form-control" placeholder="Ampidiro Anaranao" required>
            </div>
            <div class="col">
                <label for="" class="form-label">Fanampin'anarana :</label>
                <input type="text" value="<?=isset($_POST["prenomusers"])?$_POST["prenomusers"]:""?>" name="prenomusers" class="form-control" placeholder="Ampidiro Fanampin'anaranao"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Taona Naterahana :</label>
                <input type="date" value="<?=isset($_POST["ddn"])?$_POST["ddn"]:""?>" name="ddn" class="form-control" required>
            </div>
            <div class="col">
                <label for="" class="form-label">Toerana naterahana :</label>
                <input type="text" value="<?=isset($_POST["lieuxnaissance"])?$_POST["lieuxnaissance"]:""?>" name="lieuxnaissance" class="form-control"
                    placeholder="Ampidiro ny toerana naterahanao" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Ray niteraka :</label>
                <input type="text" value="<?=isset($_POST["pere"])?$_POST["pere"]:""?>" name="pere" class="form-control" placeholder="Ampidiro ny Ray niteraka anao"
                    required>
            </div>
            <div class="col">
                <label for="" class="form-label">Reny niteraka :</label>
                <input type="text" value="<?=isset($_POST["mere"])?$_POST["mere"]:""?>" name="mere" class="form-control" placeholder="Ampidiro ny Reny niteraka anao"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Karapanondro Laharana Faha : </label>
                <input type="number" value="<?=isset($_POST["cin"])?$_POST["cin"]:""?>" name="cin" class="form-control" placeholder="Ampidiro Laharana Karapanondronao"
                    required>
            </div>
            <div class="col">
                <label for="" class="form-label">Natao ny : </label>
                <input type="date" value="<?=isset($_POST["datecin"])?$_POST["datecin"]:""?>" name="datecin" class="form-control" placeholder="Ampidiro ny taona nanaovana karapanondro"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Tao : </label>
                <input type="text" value="<?=isset($_POST["lieuxcin"])?$_POST["lieuxcin"]:""?>" name="lieuxcin" class="form-control" placeholder="Toerana nanaovana karapanondro"
                    required>
            </div>
            <div class="col">
                <!-- <label for="" class="form-label">Sary : </label> -->
                <!-- <input type="file" class="form-control" placeholder="Ampidiro ny sarinao" required> -->

            </div>
        </div>
        <div class="row">
            <div class="containerss">
                <span>Tsindrio ny bokotra <i class="fas fa-arrow-turn-down"></i></span>
                <figure class="image-container">
                    <img id="chosen-imagee">
                    <figcaption id="file-namee">
                    </figcaption>
                </figure>
                <input class="inputphoto" value="<?=isset($_FILES["imgFokontany"])?$_FILES["imgFokontany"]:""?>" type="file" name="imgFokontany" id="upload-buttonn" accept="image/*">
                <label class="labelphoto" for="upload-buttonn">
                    <i class="fas fa-upload"></i> &nbsp;Ampidiro ny sarinao
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Pasipaoro Laharana Faha : </label>
                <input type="number" value="<?=isset($_POST["passportnum"])?$_POST["passportnum"]:""?>" name="passportnum" class="form-control" placeholder="Laharana Pasipaoro raha misy">
            </div>
            <div class="col">
                <label for="" class="form-label">Natao tao : </label>
                <input type="text" value="<?=isset($_POST["passportlieux"])?$_POST["passportlieux"]:""?>" name="passportlieux" class="form-control" placeholder="Toerana nanaovana pasipaoro">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Faharetany : </label>
                <input type="text" value="<?=isset($_POST["passportdelai"])?$_POST["passportdelai"]:""?>" name="passportdelai" class="form-control" placeholder="Faharetany Pasipaoro">
            </div>
            <div class="col">
                <label for="" class="form-label">Adiresy : </label>
                <input type="text" value="<?=isset($_POST["adresse"])?$_POST["adresse"]:""?>" name="adresse" class="form-control" placeholder="Lot ny trano" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Asa atao : </label>
                <input type="text" value="<?=isset($_POST["travail"])?$_POST["travail"]:""?>" name="travail" class="form-control" placeholder="Asa ataonao" required>
            </div>
            <div class="col">
                <label for="" class="form-label">Toerana misy anao antokatrano : </label>
                <select class="form-select inputselect" value="<?=isset($_POST["toerna"])?$_POST["toerana"]:""?>" name="toerana" required>
                    <option><?=isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana"?></option>
                    <option><?=((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana" && (isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")!="Vady")?"Vady":"Loham-pianakaviana"?></option>
                    <option><?=((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana"?"Vady":"Loham-pianakaviana")=="Vady"?"Zanaka":"Vady"?></option>
                    <option><?=(((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana"?"Vady":"Loham-pianakaviana")=="Vady"?"Zanaka":"Vady")=="Zanaka"?"Miaramonina":"Zanaka"?></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
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
            <div class="col">
                <label for="" class="form-label">sexe : </label>
                <span>H : Lahy, F : Vavy</span>
                <select class="form-select inputselect" name="sexe" required>
                    <option value="<?=isset($_POST["sexe"])?$_POST["sexe"]:"Lahy"?>"><?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"H":"F"?></option>
                    <option value="<?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"Vavy":"Lahy"?>"><?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"F":"H"?></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Teny miafina(mot de passe) :</label>
                <input type="password" value="<?=isset($_POST["pwd"])?$_POST["pwd"]:""?>" name="pwd" class="form-control" placeholder="Ampidiro ny teny miafina" required>
            </div>
            <div class="col">
                <label for="" class="form-label">hamarino ny teny miafina(mot de passe) :</label>
                <input type="password" value="<?=isset($_POST["pwdconfi"])?$_POST["pwdconfi"]:""?>" name="pwdConfi" class="form-control" placeholder="Ampidiro ny teny miafina" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success btninscr" name="btninscr"><i class="fas fa-user-check me-2"></i>Alefa</button>
    </form>
</section>
<script src="js/inscription.js"></script>
<?php
   include_once 'ressourse/layouts/page/footer.php';
?>