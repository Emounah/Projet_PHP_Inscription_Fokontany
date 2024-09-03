<?php
$searchtab = true;
$count=0;
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $LIMIT = 10;
    $db = bdd();
    
$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;

$search = isset($_GET["search"]) ? $_GET["search"] : null;

$orderById = isset($_POST["orderById"]) ? ($_POST["orderById"] === "DESC" ? "ASC" : "DESC") : "ASC";

$region = affichageRegion($page, $search, $orderById)["faritra"];

$regionCount = affichageRegion($page, $search, $orderById)["count"];

$regionCountTotal = getRegionCount();
$pagetotal=ceil($regionCountTotal/$LIMIT);

if(isset($_GET['idfaritra'])){
  $id=$_GET['idfaritra'];
  deleteentity("faritra",$id,"idfaritra");
  unlink("../../Public/img/image_region/".$_GET["image"]);
  header("Location:listeregion.php");
}

$regionnav = true;
include_once '../../ressourse/layoutsAdmin/header.php';
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listes des Régions</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p> -->
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>
                          <form method="post">
                                <span>ID</span>
                                <input type="hidden" name="orderById" value="<?= $orderById ?>" />
                                <button class="btn btn-flat text-warning">
                                    <i class="fas fa-angle-<?= $orderById === "ASC" ? "up" : "down" ?>"></i>
                                </button>
                            </form>
                          <th>
                            Nom Région
                          </th>
                          <th>
                            Photo
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($region as $regions) { $count++; ?>
                        <tr>
                        <td><?= $regions["idfaritra"] ?></td>
                        <td><?= $regions["nomfaritra"] ?></td>
                        <td><img width="40" height="40" src="../../Public/img/image_region/<?=$regions["saryregion"] ?>" alt="" srcset=""></td>
                        <td>
                            <a href="modification_region.php?idfaritra=<?=$regions["idfaritra"]?>&image=<?=$regions["saryregion"]?>"><button class="btn btn-success btn-icon" ><i class="ti-pencil"></i></button></a>
                            <button class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#modal1<?php echo $count; ?>"><i class="ti-trash" ></i></button>
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
                                  <button class="btn btn-white" data-bs-dismiss="modal"><i class="ti-close"></i></button>
                              </div>
                              <div class="modal-body" aria-describedby="content">
                                  <p>Voulez-vous vraiment supprimer le donner ?</p>
                              </div>
                              <div class="modal-footer">
                              <button class="btn btn-success btn-round" data-bs-dismiss="modal">Non</button>
                              <a href="listeregion.php?idfaritra=<?= $regions["idfaritra"]?>&image=<?=$regions["saryregion"]?>" >
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
              <div class="pagination mt-3">
                 <a href="listeregion.php?search=<?= $search ?>&page=<?= $page - 1 ?>" class="btn btn-primary me-1  <?=($page==1) ? "disabled":"" ?>" ><i class="bi bi-chevron-left"></i> Précédent</a>
                  <button class="btn btn-dark ms-4 me-4"><b><?=$regionCount?> / <?=$regionCountTotal ?></b></button>
                 <a href="listeregion.php?search=<?= $search ?>&page=<?= $page + 1 ?>" class="btn btn-primary <?=($page==$pagetotal) ? "disabled":"" ?>">Suivant<i class="bi bi-chevron-right"></i></a>
                 <div style="flex-grow: 1"></div>
              <div>
        </div>
    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>