<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    if (isset($_POST["btnregion"])) {
      $errorregion = insertionRegion();
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
                        <h4 class="card-title">Formulaires des Région</h4>
                        <?php if (isset($errorregion)) { ?>
                        <?php  foreach($errorregion as $erreurs): ?>
                        <p class="card-description">
                            <?=$erreurs?>
                        </p>
                        <?php
                         endforeach;
                   }?>
                        <form action="" class="forms-sample" method="post">
                            <div class="form-group">
                                <label for="region">Région</label>
                                <input type="text" name="region" class="form-control" id="region"
                                    placeholder="Nom de Région">
                            </div>
                            <div class="form-group">
                                <div class="containerss">
                                    <figure class="image-container">
                                        <img id="chosen-imagee">
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
                            <button type="submit" name="btnregion" id="btnregion"
                                class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Ajouter</button>
                        </form>
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