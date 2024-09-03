<?php
    $searchtabdiscom = true;
    $count=0;
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
$districCommune = affichageCommuneDistric();
if(isset($_GET['iddistrika_kaominina'])){
  $id=$_GET['iddistrika_kaominina'];
  deleteentity("distrika_kaominina",$id,"iddistrika_kaominina");
  header("Location:listedistriccommune.php");
}
    $districcommunenav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listes des District et Commune</h4>
                        <!-- <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p> -->
                        <div class="table-responsive pt-3">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>
                                           ID
                                        </th>
                                        <th>
                                            Région
                                        </th>
                                        <th>
                                            District
                                        </th>
                                        <th>
                                            Commune
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($districCommune as $districCommunes) { $count++ ?>
                                    <tr class="tr">
                                        <td>
                                            <?=$districCommunes["iddistrika_kaominina"]?>
                                        </td>
                                        <td>
                                            <?=$districCommunes["region"]?>
                                        </td>
                                        <td>
                                            <?=$districCommunes["district"]?>
                                        </td>
                                        <td>
                                            <?=$districCommunes["commune"]?>
                                        </td>
                                        <td>
                                            <a
                                                href="modification_discom.php?iddistrika_kaominina=<?=$districCommunes["iddistrika_kaominina"]?>"><button
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
                                                    <a
                                                        href="listedistriccommune.php?iddistrika_kaominina=<?=$districCommunes["iddistrika_kaominina"]?>">
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
            <!-- content-wrapper ends -->
            <script src="../../js/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
                $("#tadiavina").on("keyup", function() {
                    let value = $(this).val().toUpperCase();
                    $(".tr").each(function() {
                        $(this).toggle($(this).text().toUpperCase().indexOf(value) >= 0);
                    });
                });
            });
            </script>
            <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>