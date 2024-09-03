<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    $districCommune = affichageCommuneDistric();
    if (isset($_POST["btnFokonatany"])) {
      $errorFokontany = insertionFokontany();
  }
    $fokontanynav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaires des Fokontany</h4>
                        <?php if (isset($errorFokontany)) { ?>
                        <?php  foreach($errorFokontany as $errorFokontanys): ?>
                        <p class="card-description">
                            <?=$errorFokontanys?>
                        </p>
                        <?php
                         endforeach;
                   }?>
                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <!-- <label for="">Id-District-Commune : </label> -->
                                <input type="hidden" name="DistrictCommune" class="form-control"
                                    id="Id-District-Commune" placeholder="Id-District-Commune" readonly>
                            </div>
                            <div class="form-group">
                                <label for="a">Région : </label>
                                <input type="text" class="form-control" id="NomRegion" placeholder="Nom Région"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">District : </label>
                                <input type="text" class="form-control" id="NomDistrict" placeholder="Nom District"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Commune : </label>
                                <input type="text" class="form-control" id="NomCommune" placeholder="Nom Commune"
                                    readonly>
                            </div>
                            <div class="form-group select-box">
                                <div class="select-option">
                                    <input type="text" name="" placeholder="Selectionner Région,District,Commune" id="soValue"
                                        readonly>
                                </div>
                                <div class="content">
                                    <div class="search">
                                        <input type="search" name="" id="optionSearch" placeholder="Search">
                                    </div>
                                    <ul class="options">
                                        <?php foreach ($districCommune as $districCommunes) { ?>
                                        <li id="<?=$districCommunes["iddistrika_kaominina"]?>"><span><?=$districCommunes["region"]?></span>-<span><?=$districCommunes["district"]?></span>-<span><?=$districCommunes["commune"]?></span></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Fokontany</label>
                                <input type="text" name="NomFokonatny" class="form-control" id="exampleInputName1"
                                    placeholder="Entrer nom de Fokontany" required>
                            </div>
                            <div class="form-group">
                                <div class="containerss">
                                    <figure class="image-container">
                                        <img id="chosen-imagee">
                                        <figcaption id="file-namee">
                                        </figcaption>
                                    </figure>
                                    <input class="inputphoto" type="file" name="imgFokontany" id="upload-buttonn" accept="image/*">
                                    <label class="labelphoto" for="upload-buttonn">
                                        <i class="fas fa-upload"></i> &nbsp;Inserer image de fokontany
                                    </label>
                                </div>
                            </div>
                            <button type="submit" name="btnFokonatany" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <script src="../../js/ajoutfokonatany.js"></script>
    <script src="../../js/nomfokontany.js"></script>
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>