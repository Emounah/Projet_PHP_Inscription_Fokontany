<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    $region = get("faritra");
    if(isset($_GET['idkaominina'])){
        $id=$_GET['idkaominina'];
        $commune = sqlcommune("idkaominina",$id);
    }
    if (isset($_POST["btncommuneModifier"])) {
        $errorregion = updateCommune();
    }

    $communenav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaires de Commune</h4>
                        <?php if (isset($errorregion)) { ?>
                        <?php  foreach($errorregion as $erreurs): ?>
                        <p class="card-description">
                            <?=$erreurs?>
                        </p>
                        <?php
                         endforeach;
                   }?>
                        <form class="forms-sample" method="post">
                            <?php foreach ($commune as $communes) { ?>
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
                                <label for="idregioncommune">Région : </label>
                                <input type="number" name="idregioncommune" value="<?=$communes["idkaominina"]?>"
                                    class="form-control" id="idregioncommune" placeholder="Id Région" readonly>
                            </div>
                            <div class="form-group select-box">
                                <div class="select-option">
                                    <input type="text" name="nomregion" value="<?=$communes["region"]?>"
                                        placeholder="Selectionner Région" id="soValue" readonly>
                                </div>
                                <div class="content">
                                    <div class="search">
                                        <input type="search" id="optionSearch" placeholder="Search">
                                    </div>
                                    <ul class="options">
                                        <?php foreach ($region as $regions) { ?>
                                        <li class="<?=$regions["idfaritra"]?>"><?=$regions["nomfaritra"]?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Commune : </label>
                                <input type="text" value="<?=$communes["nomkaominina"]?>" name="commune"
                                    class="form-control" id="exampleInputName1" placeholder="Entrer nom de commune"
                                    required>
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
                                                name="btncommuneModifier">OUI</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin du Modal-->
                            <?php } ?>
                        </form>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#modal1"
                            class="btn btn-primary mr-2">Modifier</button>
                        <a href="listecommune.php"><button class="btn btn-light">Cancel</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>