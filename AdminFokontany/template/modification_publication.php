<?php
$publicationnav = true;
include_once '../../ressourse/layoutFokontany/header.php';
if (isset($_GET["idpub"])) {
    $publication = affichagePublication("idpublication",intval($_GET["idpub"]));
}
if (isset($_POST["btnPublicationModifier"])) {
    $errorkarine = updatePublication();
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <a href="listepublication.php" class="float-start ms-2 mt-2"> <button
                            class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
                    <div class="card-body">
                        <h4 class="card-title">Takelaka Fanovana Filazana</h4>
                        <?php if (isset($errorkarine)) { ?>
                        <?php  foreach($errorkarine as $errorkarines): ?>
                        <p class="card-description">
                            <?=$errorkarines?>
                        </p>
                        <?php
                     endforeach;
               }?>

                        <form action="" class="forms-sample" method="post">
                            <div class="form-group">
                                <!-- <label for="">Fokontany : </label> -->
                                <input type="hidden" value="<?=$_SESSION["idFokontanys"]?>" name="idfokontany"
                                    class="form-control" id="idfokontany" placeholder="Id Fokontany" readonly>
                                <input type="hidden" value="<?=$_SESSION["nomFokontanys"]?>" name="nomfokontany"
                                    class="form-control" id="nomfokontany" placeholder="Anarany Fokontany" readonly>
                            </div>
                            <?php foreach($publication as  $publications) { ?>
                            <div class="form-group">
                                <label for="">Filazana : </label>
                                <textarea name="filazana" class="form-control" id="exampleTextarea1"
                                    rows="4"><?=$publications["publication"]?></textarea>
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
                                            <p>Tena vonona ve ianao hanova anio lisitra iray io?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-round"
                                                data-bs-dismiss="modal">Tsia</button>
                                            <button class="btn btn-danger btn-round"
                                                name="btnPublicationModifier">Eny</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin du Modal-->
                            <?php } ?>
                        </form>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#modal1"
                            class="btn btn-primary mr-2">Alefa</button>
                        <a href="listepublication.php"><button class="btn btn-light">Ajanony</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
include_once '../../ressourse/layoutFokontany/footer.php';
?>