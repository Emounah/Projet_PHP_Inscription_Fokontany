<?php

    $karinenav = true;
    include_once '../../ressourse/layoutFokontany/header.php';
    if (isset($_POST["btnkarine"])) {
      $errorkarine = insertionCarnet();
   }
?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
              <a href="listecarnet.php" class="float-start ms-2 mt-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
                <div class="card-body">
                  <h4 class="card-title">Takelaka Fampidirana laharana karinem-pokontany</h4>
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
                      <input type="hidden" value="<?=$_SESSION["idFokontanys"]?>" name="idfokontany" class="form-control" id="idfokontany" placeholder="Id Fokontany" readonly>
                      <input type="hidden" value="<?=$_SESSION["nomFokontanys"]?>" name="nomfokontany" class="form-control" id="nomfokontany" placeholder="Anarany Fokontany" readonly>
                    </div>
                    <div class="form-group">
                      <label for="region">Laharana Karinem-pokontany : </label>
                      <input type="text" name="karine" class="form-control" id="karine" placeholder="Laharana karine">
                    </div>
                    <button type="submit" name="btnkarine" id="btnkarine" class="btn btn-primary mr-2">Alefa</button>
                    <a href="listecarnet.php"><button class="btn btn-light">Ajanony</button></a>
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