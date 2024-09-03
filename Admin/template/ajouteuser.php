<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    if (isset($_POST["btnEnregistrerUser"])) {
      $errorUser = insertionUtilisateur();
  }
  $utilisateurnav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulaires des Utilisateurs</h4>
                  <?php if (isset($errorUser)) { ?>
                  <?php  foreach($errorUser as $errorUsers): ?>
                      <p class="card-description">
                         <?=$errorUsers?>
                      </p>
                  <?php
                         endforeach;
                   }?>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Pseudo</label>
                      <input type="text" name="pseudouser" class="form-control" id="exampleInputName1" placeholder="Votre Pseudo" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Mot de passe</label>
                      <input type="password" name="mdpuser" class="form-control" id="exampleInputName1" placeholder="Votre Mot de passe" required>
                    </div>
                    <button type="submit" name="btnEnregistrerUser" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>