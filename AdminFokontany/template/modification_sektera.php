<?php

    $sekteranav = true;
    require '../../ressourse/layoutFokontany/header.php';
    if (isset($_GET["idsektera"])) {
        $affichesektera  = affichageSecteur("idsektera",intval($_GET["idsektera"]));
    }
    
    if (isset($_POST["btnsekteraModifier"])) {
        $errorsektera = updateSecteur(intval($_GET["idsektera"]));
    }
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Takelaka Fanovana Sektera</h4>
                        <?php if (isset($errorsektera)) { ?>
                        <?php  foreach($errorsektera as $errorsekteras): ?>
                        <p class="card-description pp">
                            <?=$errorsekteras?>
                        </p>
                        <?php
                         endforeach;
                   }?>
                        <form class="forms-sample" method="post">
                            <?php foreach($affichesektera as $affichesekteras) { ?>
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
                                <!-- <label for="">Fokontany : </label> -->
                                <input type="hidden" value="<?=$_SESSION["idFokontanys"]?>" name="idfokontany"
                                    class="form-control" id="idfokontany" placeholder="Id Fokontany" readonly>
                                <input type="hidden" value="<?=$_SESSION["nomFokontanys"]?>" name="nomfokontany"
                                    class="form-control" id="nomfokontany" placeholder="Anarany Fokontany" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Sektera : </label>
                                <input type="text" value="<?=$affichesekteras["nomsektera"]?>" name="nomsektera"
                                    class="form-control" id="nomsektera" placeholder="Ampidiro anarany sektera"
                                    required>
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
                                                name="btnsekteraModifier">Eny</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin du Modal-->
                            <?php } ?>
                        </form>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#modal1"
                            class="btn btn-primary mr-2">Alefa</button>
                        <a href="listesektera.php"><button class="btn btn-light">Ajanony</button></a>
                        <!-- <script>
                        let pp = document.querySelectorAll('.pp')
                        if (pp.textContent == "Tafiditra soamantsara ny sektera izay nampidirinao") {
                            setInterval('newDoc()',1000);
                        }
                        function newDoc() {
                            "listesektera.php" + window.location.href;
                        }
                        </script> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
    require '../../ressourse/layoutFokontany/footer.php';
?>