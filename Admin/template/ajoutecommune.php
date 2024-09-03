<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    $region = get("faritra");
    if (isset($_POST["btncommune"])) {
      $errorregion = insertionCommune();
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
                  <h4 class="card-title">Formulaires des Communes</h4>
                  <?php if (isset($errorregion)) { ?>
                  <?php  foreach($errorregion as $erreurs): ?>
                      <p class="card-description">
                         <?=$erreurs?>
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
                      <label for="idregioncommune">Région : </label>
                      <input type="hidden" name="idregioncommune" class="form-control" id="idregioncommune" placeholder="Id Région" readonly>
                    </div>
                    <div class="form-group select-box">
                          <div class="select-option">
                             <input type="text" name="nomregion" placeholder="Selectionner Région" id="soValue" readonly>
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
                      <input type="text" name="commune" class="form-control" id="exampleInputName1" placeholder="Entrer nom de commune" required>
                    </div>
                    <button type="submit" name="btncommune" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <script src="../../js/nomcommune.js"></script>
<?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>
