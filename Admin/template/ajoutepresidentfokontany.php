<?php
     $ajoutFkt = true;
      include_once 'controller/database.php';
      include_once 'controller/fonction_du_site.php';
      $db = bdd();
      $Fokontany = affichageFokontany();
      if (isset($_POST["btnpresidentfkt"])) {
        $errorPresidentFkt = insertionPresidentFkt();
    }
  $presidentfokontanynav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaires des Presidents Fokontany</h4>
                        <?php if (isset($errorPresidentFkt )) { ?>
                        <?php  foreach($errorPresidentFkt as $errorPresidentFkts): ?>
                        <p class="card-description">
                            <?=$errorPresidentFkts?>
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
                                <label for="">Région : </label>
                                <input type="text" value=<?=isset($_POST["nomregion"])?$_POST["nomregion"]:""?>
                                    name="nomregion" class="form-control" id="nomregion" placeholder="Nom Région"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">District : </label>
                                <input type="text" value=<?=isset($_POST["nomdistrict"])?$_POST["nomdistrict"]:""?>
                                    name="nomdistrict" class="form-control" id="nomdistrict" placeholder="Nom District"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Commune : </label>
                                <input type="text" value=<?=isset($_POST["nomcommune"])?$_POST["nomcommune"]:""?>
                                    name="nomcommune" class="form-control" id="nomcommune" placeholder="Nom Commune"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Fokontany : </label>
                                <input type="text" value=<?=isset($_POST["nomfokontany"])?$_POST["nomfokontany"]:""?>
                                    name="nomfokontany" class="form-control" id="nomfokontany"
                                    placeholder="Nom Fokontany" readonly>
                            </div>
                            <div class="form-group">
                                <!-- <label for="">idFokontany : </label> -->
                                <input type="hidden" value=<?=isset($_POST["idFokontany"])?$_POST["idFokontany"]:""?>
                                    name="idFokontany" class="form-control" id="idFokontany" placeholder="Id Fokontany"
                                    readonly>
                            </div>
                            <div class="form-group select-box">
                                <div class="select-option">
                                    <input type="text"
                                        value=<?=isset($_POST["nomfokontany"])?$_POST["nomfokontany"]:""?>
                                        name="nomfokontany" placeholder="Selectionner Fokontany" id="soValue" readonly>
                                </div>
                                <div class="content">
                                    <div class="search">
                                        <input type="search" id="optionSearch" placeholder="Search">
                                    </div>
                                    <ul class="options">
                                        <?php foreach($Fokontany as $Fokontanys) { ?>
                                        <li class="<?=$Fokontanys["idfokontany"]?>">
                                            <span><?=$Fokontanys["nomfokontany"]?></span>-<span><?=$Fokontanys["nomcommune"]?></span>-<span><?=$Fokontanys["nomdistrict"]?></span>-<span><?=$Fokontanys["nomregion"]?></span>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nom : </label>
                                <input type="text" value=<?=isset($_POST["nompresident"])?$_POST["nompresident"]:""?>
                                    name="nompresident" class="form-control" id="nompresident"
                                    placeholder="Entrer nom de President Fokontany" required>
                            </div>
                            <div class="form-group">
                                <label for="">Prénom : </label>
                                <input type="text"
                                    value=<?=isset($_POST["prenompresident"])?$_POST["prenompresident"]:""?>
                                    name="prenompresident" class="form-control" id="prenompresident"
                                    placeholder="Entrer Prénom de President Fokontany" required>
                            </div>
                            <div class="form-group">
                                <div class="containerss">
                                    <figure class="image-container">
                                        <img id="chosen-imagee">
                                        <figcaption id="file-namee">
                                        </figcaption>
                                    </figure>
                                    <input class="inputphoto"
                                        value=<?=isset($_FILES["prenompresident"])?$_FILES["prenompresident"]:""?>
                                        type="file" name="imgFokontany" id="upload-buttonn" accept="image/*">
                                    <label class="labelphoto" for="upload-buttonn">
                                        <i class="fas fa-upload"></i> &nbsp;Inserer image de Président Fokontany
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""> Date de naissance : </label>
                                <input type="date" value=<?=isset($_POST["ddn"])?$_POST["ddn"]:""?> name="ddn"
                                    class="form-control" id="ddn" placeholder="Entrer date de naissance" required>
                            </div>
                            <div class="form-group">
                                <label for="">Lieux de naissance : </label>
                                <input type="text"
                                    value=<?=isset($_POST["lieuxnaissance"])?$_POST["lieuxnaissance"]:""?>
                                    name="lieuxnaissance" class="form-control" id="lieuxnaissance"
                                    placeholder="Entrer lieux de naissance" required>
                            </div>
                            <div class="form-group">
                                <label for="">Père : </label>
                                <input type="text" value=<?=isset($_POST["pere"])?$_POST["pere"]:""?> name="pere"
                                    class="form-control" id="pere" placeholder="Entrer votre Père" required>
                            </div>
                            <div class="form-group">
                                <label for="">Mère : </label>
                                <input type="text" value=<?=isset($_POST["mere"])?$_POST["mere"]:""?> name="mere"
                                    class="form-control" id="mere" placeholder="Entrer votre Mère" required>
                            </div>
                            <div class="form-group">
                                <label for="">CIN : </label>
                                <input type="number" value=<?=isset($_POST["CIN"])?$_POST["CIN"]:""?> name="cin"
                                    class="form-control" id="cin" placeholder="Entrer numero de carte d'identité"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="">fait le : </label>
                                <input type="date" value=<?=isset($_POST["datecin"])?$_POST["datecin"]:""?>
                                    name="datecin" class="form-control" id="datecin" placeholder="Entrer date du CIN"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="">à : </label>
                                <input type="text" value=<?=isset($_POST["lieuxcin"])?$_POST["lieuxcin"]:""?>
                                    name="lieuxcin" class="form-control" id="lieuxcin"
                                    placeholder="Entrer lieux de faire le CIN" required>
                            </div>
                            <div class="form-group">
                                <label for="">Travail : </label>
                                <input type="text" value=<?=isset($_POST["travail"])?$_POST["travail"]:""?>
                                    name="travail" class="form-control" id="travail" placeholder="Entrer travail"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="">Contact : </label>
                                <input type="number" value=<?=isset($_POST["contact"])?$_POST["contact"]:""?>
                                    name="contact" class="form-control" id="contact" placeholder="Entrer Contact"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="">Sexe : </label>
                                <select class="form-select inputselect" name="sexe" required>
                                    <option value="<?=isset($_POST["sexe"])?$_POST["sexe"]:"Lahy"?>"><?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"H":"F"?></option>
                                    <option
                                        value="<?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"Vavy":"Lahy"?>">
                                        <?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"F":"H"?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Adresse : </label>
                                <input type="text" value=<?=isset($_POST["adresse"])?$_POST["adresse"]:""?>
                                    name="adresse" class="form-control" id="adresse" placeholder="Entrer Adresse"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="">Mot de passe : </label>
                                <input type="password" value=<?=isset($_POST["pwd"])?$_POST["pwd"]:""?> name="pwd"
                                    class="form-control" id="pwd" placeholder="Entrer Mot de Passe" required>
                            </div>
                            <div class="form-group">
                                <label for="">Confirmation de Mot de passe : </label>
                                <input type="password" value=<?=isset($_POST["pwdConfi"])?$_POST["pwdConfi"]:""?>
                                    name="pwdConfi" class="form-control" id="pwdConfi"
                                    placeholder="Confirmation de Mot de Passe" required>
                            </div>
                            <button type="submit" name="btnpresidentfkt" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <script src="../../js/ajoutepresidentfkt.js"></script>
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>