<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    if (isset($_GET["idadmin"])) {
        $id=intval($_GET["idadmin"]);
       $userModif = getentitybyid("admin",$id,"idadmin");
    }
    if (isset($_POST["btnModifierUser"])) {
        $errorUser = updateUtilisateur(intval($_GET["idadmin"]));
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
                  <h4 class="card-title">Modification de l'Utilisateur</h4>
                  <?php if (isset($errorUser)) { ?>
                  <?php  foreach($errorUser as $errorUsers): ?>
                      <p class="card-description">
                         <?=$errorUsers?>
                      </p>
                  <?php
                         endforeach;
                   }?>
                  <form class="forms-sample" method="post">
                    <?php foreach($userModif as $userModifs) { ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Pseudo</label>
                      <input type="text" value="<?=$userModifs["pseudoadmin"]?>" name="pseudouser" class="form-control" id="exampleInputName1" placeholder="Votre Pseudo" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Mot de passe</label>
                      <input type="password" value="<?=$userModifs["mdpadmin"]?>" name="mdpuser" class="form-control" id="exampleInputName1" placeholder="Votre Mot de passe" required>
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
                                            <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                    class="ti-close"></i></button>
                                        </div>
                                        <div class="modal-body" aria-describedby="content">
                                            <p>Voulez-vous vraiment enregistrer la modification?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-round"
                                                data-bs-dismiss="modal">Non</button>
                                            <button class="btn btn-danger btn-round"
                                                name="btnModifierUser">OUI</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin du Modal-->
                  </form>
                  <button type="submit" data-bs-toggle="modal" data-bs-target="#modal1"
                            class="btn btn-primary mr-2">Modifier</button>
                        <a href="listeuser.php"><button class="btn btn-light">Cancel</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>