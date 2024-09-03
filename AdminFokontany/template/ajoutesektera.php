<?php

    $sekteranav = true;
    include_once '../../ressourse/layoutFokontany/header.php';
    if (isset($_POST["btnsektera"])) {
       $errorsektera = insertionSecteur();
    }
?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
              <a href="listesektera.php" class="float-start ms-2 mt-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
                <div class="card-body">
                  <h4 class="card-title">Takelaka Famenona Sektera</h4>
                  <?php if (isset($errorsektera)) { ?>
                  <?php  foreach($errorsektera as $errorsekteras): ?>
                      <p class="card-description">
                         <?=$errorsekteras?>
                      </p>
                  <?php
                         endforeach;
                   }?>
                  <form class="forms-sample" method="post">
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
                      <input type="hidden" value="<?=$_SESSION["idFokontanys"]?>" name="idfokontany" class="form-control" id="idfokontany" placeholder="Id Fokontany" readonly>
                      <input type="hidden" value="<?=$_SESSION["nomFokontanys"]?>" name="nomfokontany" class="form-control" id="nomfokontany" placeholder="Anarany Fokontany" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Sektera : </label>
                      <input type="text" name="nomsektera" class="form-control" id="nomsektera" placeholder="Ampidiro anarany sektera">
                    </div>
                    <button type="submit" name="btnsektera" class="btn btn-primary mr-2">Alefa</button>
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
