<?php
$publicationnav = true;
include_once '../../ressourse/layoutFokontany/header.php';
if (isset($_POST["btnkarine"])) {
  $errorkarine = insertionPublication();
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <a href="listepublication.php" class="float-start ms-2 mt-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
                    <div class="card-body">
                        <h4 class="card-title">Takelaka Fanoratana Filazana</h4>
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
                            <div class="form-group">
                                <label for="">Filazana : </label>
                                <textarea name="filazana" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                            </div>
                            <button type="submit" name="btnkarine" id="btnkarine"
                                class="btn btn-primary mr-2">Alefa</button>
                            <button class="btn btn-light">Ajanony</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
include_once '../../ressourse/layoutFokontany/footer.php';
?>