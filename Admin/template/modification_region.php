<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    if(isset($_GET['idfaritra'])){
        $id=$_GET['idfaritra'];
        $region = getentitybyid("faritra",$id,"idfaritra");
    }
    if (isset($_POST["btnregionModifier"])) {
        $errorregion = updateRegion($_GET["image"],$_GET['idfaritra']);
    }

  $regionnav = true;
  include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modification de Région</h4>
                        <?php if (isset($errorregion)) { ?>
                        <?php  foreach($errorregion as $erreurs): ?>
                        <p class="card-description">
                            <?=$erreurs?>
                        </p>
                        <?php
                         endforeach;
                   }?>
                        <form action="" class="forms-sample" method="post" enctype="multipart/form-data">
                            <?php foreach ($region as $regions) { ?>
                            <div class="form-group">
                                <label for="region">Région</label>
                                <input type="text" value="<?= $regions["nomfaritra"] ?>" name="region"
                                    class="form-control" id="region" placeholder="Nom de Région">
                            </div>
                            <div class="form-group">
                                <div class="containerss">
                                    <figure class="image-container">
                                        <img id="chosen-imagee" src="../../Public/image_region/<?=$regions["saryregion"]?>">
                                        <figcaption id="file-namee">
                                        </figcaption>
                                    </figure>
                                    <input class="inputphoto" type="file" name="imgFokontany" id="upload-buttonn"
                                        accept="image/*">
                                    <label class="labelphoto" for="upload-buttonn">
                                        <i class="fas fa-upload"></i> &nbsp;Inserer image de région
                                    </label>
                                </div>
                            </div>
                            <?php } ?>

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
                                                name="btnregionModifier">OUI</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin du Modal-->
                        </form>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#modal1"
                            class="btn btn-primary mr-2">Modifier</button>
                        <a href="listeregion.php"><button class="btn btn-light">Cancel</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <script src="../../js/nomregion.js"></script>
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>