<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    $districCommune = affichageCommuneDistric();
    if(isset($_GET['idfokontany'])){
        $id=$_GET['idfokontany'];
        $fokontany = sqlFokontany("idfokontany",$id);
    }
    if (isset($_POST["btnfokontanyModifier"])) {
        $errorFokontany = updateFokontany(intval($_GET['idfokontany']),$_GET['image']);
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
                            <?php foreach ($fokontany as $fokontanys) { ?>
                            <div class="form-group">
                                <label for="">Id-District-Commune : </label>
                                <input type="number" value="<?=$fokontanys["iddistrika_kaominina"]?>" name="DistrictCommune" class="form-control" id="Id-District-Commune" placeholder="Id-District-Commune" readonly>
                            </div>
                            <div class="form-group">
                                <label for="a">Région : </label>
                                <input type="text" value="<?=$fokontanys["nomregion"]?>" class="form-control" id="NomRegion" placeholder="Nom Région"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">District : </label>
                                <input type="text" value="<?=$fokontanys["nomdistrict"]?>" class="form-control" id="NomDistrict" placeholder="Nom District" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Commune : </label>
                                <input type="text" value="<?=$fokontanys["nomcommune"]?>" class="form-control" id="NomCommune" placeholder="Nom Commune" readonly>
                            </div>
                            <div class="form-group select-box">
                                <div class="select-option">
                                    <input type="text" value="<?=$fokontanys["nomregion"]?>-<?=$fokontanys["nomdistrict"]?>-<?=$fokontanys["nomcommune"]?>" name="" placeholder="Selectionner Région, District et Commune" id="soValue" readonly>
                                </div>
                                <div class="content">
                                    <div class="search">
                                        <input type="search" name="" id="optionSearch" placeholder="Search">
                                    </div>
                                    <ul class="options">
                                        <?php foreach ($districCommune as $districCommunes) { ?>
                                        <li id="<?=$districCommunes["iddistrika_kaominina"]?>">
                                            <span><?=$districCommunes["region"]?></span>-<span><?=$districCommunes["district"]?></span>-<span><?=$districCommunes["commune"]?></span>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Fokontany</label>
                                <input type="text" value="<?=$fokontanys["nomfokontany"]?>" name="NomFokonatny" class="form-control" id="exampleInputName1" placeholder="Entrer nom de Fokontany" required>
                            </div>
                            <div class="form-group">
                                <div class="containerss">
                                    <figure class="image-container">
                                        <img id="chosen-imagee" src="../../Public/img/image_fokonatny/<?=$fokontanys["saryfokontany"]?>">
                                        <figcaption id="file-namee">
                                        </figcaption>
                                    </figure>
                                    <input class="inputphoto" type="file" name="imgFokontany" id="upload-buttonn" accept="image/*">
                                    <label class="labelphoto" for="upload-buttonn">
                                        <i class="fas fa-upload"></i> &nbsp;Inserer image de fokontany
                                    </label>
                                </div>
                            </div>
                                                        <!--Modal-->
                                                        <div class="modal fade" id="modal1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" aria-labelledby="modal title">
                                                Modification
                                            </h5>
                                            <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                    class="ti-close"></i></button>
                                        </div>
                                        <div class="modal-body" aria-describedby="content">
                                            <p>Voulez-vous vraiment enregistrer la modification?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-round"
                                                data-bs-dismiss="modal">Non</button>
                                            <button class="btn btn-danger btn-round"
                                                name="btnfokontanyModifier">OUI</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin du Modal-->
                            <?php } ?>
                        </form>
                        </form>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#modal1" class="btn btn-primary mr-2">Modifier</button>
                        <a href="listecommune.php"><button class="btn btn-light">Cancel</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <script src="../../js/ajoutfokonatany.js"></script>
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>