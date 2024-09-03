<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    if (isset($_POST["btndistric"])) {
      $errordistric = insertionDistric();
  }
    $arrondissementnav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulaires des District</h4>
                  <?php if (isset($errordistric)) { ?>
                  <?php  foreach($errordistric as $erreurs): ?>
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
                    <!-- <div class="form-group">
                      <label for="communearrondissement">Commune : </label>
                      <input type="number" class="form-control" id="communearrondissement" placeholder="Id Commune" readonly>
                    </div> -->
                    <!-- <div class="form-group select-box">
                          <div class="select-option">
                             <input type="text" name="" placeholder="Selectionner Commune" id="soValue" readonly>
                          </div>
                          <div class="content">
                             <div class="search">
                                <input type="search" name="" id="optionSearch" placeholder="Search">
                             </div>
                             <ul class="options">
                                 <li class="1">HTML</li>
                                 <li class="2">CSS</li>
                                 <li class="3">JavaScript</li>
                                 <li class="4">PHP</li>
                                 <li class="5">Python</li>
                                 <li class="6">React</li>
                                 <li class="7">Angular</li>
                                 <li class="8">HTML</li>
                                 <li class="9">CSS</li>
                                 <li class="10">JavaScript</li>
                                 <li class="11">PHP</li>
                                 <li class="12">Python</li>
                                 <li class="13">React</li>
                                 <li class="14">Angular</li>
                             </ul>
                          </div>
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputName1">District : </label>
                      <input type="text" name="nomdistric" class="form-control" id="exampleInputName1" placeholder="Entrer nom de Distric" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="btndistric">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- <script src="../../js/nomdistrict.js"></script> -->
<?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>
