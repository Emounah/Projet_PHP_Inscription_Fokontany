<?php
    $searchtabdiscom = true;
    $count=0;
    $karinenav = true;
include_once '../../ressourse/layoutFokontany/header.php';
if (isset($_GET["idkarine"])) {
  $id = $_GET["idkarine"];
  deleteentity("karine",$id,"idkarine");
}
$carnet = affichageCarnet("idfokontany",intval($_SESSION["idFokontanys"]));
?>
<!-- partial -->
<div class="main-panel" id="tablesektera">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lisitr'ireo laharana karine</h4>
                        <!-- <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p> -->
                        <div class="table-responsive pt-3">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        <th>
                                            Laharana Karine
                                        </th>
                                        <th>
                                            Fanovana/Famafana
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($carnet as $carnets) { $count++ ?>
                                    <tr class="trsektera">
                                        <td><?=$carnets["idkarine"]?></td>
                                        <td><?=$carnets["laharanakarine"]?></td>
                                        <td>
                                            <a href="modification_carnet.php?idkarine=<?=$carnets["idkarine"]?>"><button class="btn btn-success btn-icon"><i
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
                                                        Famafana
                                                    </h5>
                                                    <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                            class="ti-close"></i></button>
                                                </div>
                                                <div class="modal-body" aria-describedby="content">
                                                    <p>Tena vonona marina ve ianaao hamafa anio lisitra iray io ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success btn-round"
                                                        data-bs-dismiss="modal">Tsia</button>
                                                    <a href="listecarnet.php?idkarine=<?=$carnets["idkarine"]?>">
                                                        <button  id="" class="btn btn-danger btn-round Actbtn">ENY</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Fin du Modal-->
                                    <?php } ?>
                                    <script>
                                        let Actbtn = document.querySelectorAll('.Actbtn')
                                        for (let i = 0; i < Actbtn.length; i++) { 
                                            setTimeout('load_table()');
                                            function load_table() {
                                                Actbtn[i].addEventListener('click',()=>{
                                                    $('#tablesektera').load('../controller/fonction_du_site.php');
                                                })
                                            }
                                        }
                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
            $(".trsektera").each(function() {
                $(this).toggle($(this).text().toUpperCase().indexOf(value) >= 0);
            });
        });
    });
    </script>
<?php
    include_once '../../ressourse/layoutFokontany/footer.php';?>