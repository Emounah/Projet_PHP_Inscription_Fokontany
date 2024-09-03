<?php
    $searchtabdiscom = true;
    $count=0;
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    $Users = get("admin");
    if(isset($_GET['idadmin'])){
      $id=$_GET['idadmin'];
      deleteentity("admin",$id,"idadmin");
      header("Location:listeuser.php");
    }
    if (isset($_POST["btnregionModifier"])) {
      $error = insertionUtilisateur($_GET['idadmin']);
  }
    $utilisateurnav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listes des Admin</h4>
                        <!-- <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p> -->
                        <div class="table-responsive pt-3">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Pseudo
                                        </th>
                                        <th>
                                            Mot de passe
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Users as $Userss) { $count++?>
                                    <tr class="truser">
                                        <td>
                                            <?=$Userss["idadmin"]?>
                                        </td>
                                        <td>
                                            <?=$Userss["pseudoadmin"]?>
                                        </td>
                                        <td>
                                            <?=$Userss["mdpadmin"]?>
                                        </td>
                                        <td>
                                            <a
                                                href="modification_user.php?idadmin=<?=$Userss["idadmin"]?>"><button
                                                    class="btn btn-success btn-icon"><i
                                                        class="ti-pencil"></i></button></a>
                                            <button class="btn btn-danger btn-icon" data-bs-toggle="modal"
                                                data-bs-target="#modal1<?php echo $count; ?>"><i
                                                    class="ti-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!--Modal-->
                                    <div class="modal fade" id="modal1<?php echo $count; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" aria-labelledby="modal title">
                                                        Suppression
                                                    </h5>
                                                    <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                            class="ti-close"></i></button>
                                                </div>
                                                <div class="modal-body" aria-describedby="content">
                                                    <p>Voulez-vous vraiment supprimer le donner ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success btn-round"
                                                        data-bs-dismiss="modal">Non</button>
                                                    <a href="listeuser.php?idadmin=<?=$Userss["idadmin"]?>">
                                                        <button class="btn btn-danger btn-round">OUI</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Fin du Modal-->
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- content-wrapper ends -->
    <script src="../../js/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
                $("#tadiavina").on("keyup", function() {
                    let value = $(this).val().toUpperCase();
                    $(".truser").each(function() {
                        $(this).toggle($(this).text().toUpperCase().indexOf(value) >= 0);
                    });
                });
            });
    </script>
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>