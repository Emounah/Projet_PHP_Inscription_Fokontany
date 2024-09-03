<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    if(isset($_GET['idboribory'])){
        $id=$_GET['idboribory'];
        $distric = getentitybyid("boriborintany",$id,"idboribory");
    }
    if (isset($_POST["btndistricModifier"])) {
        $errordistric = updateDistric();
    }

    $districcommunenav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modification de Distric</h4>
                  <?php if (isset($errordistric)) { ?>
                  <?php  foreach($errordistric as $erreurs): ?>
                      <p class="card-description">
                         <?=$erreurs?>
                      </p>
                  <?php
                         endforeach;
                   }?>
                  <form action="" class="forms-sample" method="post">
                  <?php foreach ($distric as $districs) { ?>  
                    <div class="form-group">
                      <label for="region">Distric : </label>
                      <input type="text" value="<?= $districs["distrika"] ?>" name="nomdistric" class="form-control" id="nomdistric" placeholder="Nom de Distric">
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
                    <button class="btn btn-white" data-bs-dismiss="modal"><i class="ti-close"></i></button>
                </div>
                   <div class="modal-body" aria-describedby="content">
                      <p>Voulez-vous vraiment enregistrer la modification?</p>
                   </div>
                       <div class="modal-footer">
                            <button class="btn btn-success btn-round"  data-bs-dismiss="modal">Non</button>
                            <button class="btn btn-danger btn-round" name="btndistricModifier">OUI</button>
                        </div>
                    </div>
              </div>
     </div>
            <!--Fin du Modal-->
                  </form>
            <button type="submit"  data-bs-toggle="modal" data-bs-target="#modal1" class="btn btn-primary mr-2">Modifier</button>
            <a href="listearrondissement.php"><button class="btn btn-light">Cancel</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>