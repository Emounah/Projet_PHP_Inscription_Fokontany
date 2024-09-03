<?php
    $searchtabdiscom = true;
    $usersnav = true;
include_once '../../ressourse/layoutFokontany/header.php';
if (isset($_POST["btnsazy"])) {
   $sazyajouter = insertionSazy();
}
$sazy = affichageSazy("idkarine",$_GET["idkarines"])
?>
<!-- partial -->
<div class="main-panel" id="tablesektera">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <a href="listeusers.php" class="float-start ms-2 mt-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
                    <div class="card-body">
                        <h4 class="card-title">Takelaka Fanaovana mari-pahatongavana</h4>
                        <?php if (isset($sazyajouter)) { ?>
                      <p class="card-description">
                         <?=$sazyajouter?>
                      </p>
                  <?php } ?>
                        <form action="" class="forms-sample" method="post">
                        <div class="form-group">
                                <label for="">Anarana sy Fanampiny : </label>
                                <input type="text" value="<?=$_GET['nomUsers']." ".$_GET['prenomUsers']?>" name="idusers" class="form-control"
                                    id="idfokontany" placeholder="Id Karine" readonly>
                            </div>
                            <div class="form-group">
                                <!-- <label for="">idKarine : </label> -->
                                <input type="hidden" value="<?=$_GET['idkarines']?>" name="idKarine" class="form-control"
                                    id="idfokontany" placeholder="Id Karine" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Fahatongavana : </label>
                                <select class="form-select" name="sazy">
                                <option value=""></option>
                                    <option value="Tonga">Tonga</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Antony : </label>
                                    <textarea name="motif" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Daty : </label>
                                <input type="date" name="daty" class="form-control"
                                    id="idfokontany" placeholder="Daty">
                            </div>
                              <!--Modal-->
                              <div class="modal fade" id="modal12">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" aria-labelledby="modal title">
                                                Adidy
                                            </h5>
                                            <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                    class="ti-close"></i></button>
                                        </div>
                                        <div class="modal-body" aria-describedby="content">
                                            <p>Tena vonona ve ianao ampiditra anio adidy io?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-round"
                                                data-bs-dismiss="modal">Tsia</button>
                                            <button class="btn btn-danger btn-round"
                                            name="btnsazy" >Eny</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin du Modal-->
                        </form>
                        <button type="submit" id="btnkarine" data-bs-toggle="modal" data-bs-target="#modal12"
                                class="btn btn-primary mr-2">Alefa</button>
                            <a href="listeusers.php"><button class="btn btn-light">Ajanony</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lisitr'ireo Fahatongavana aminy fandraisana anjara amin'ny hetsika ataony fokontany</h4>
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
                                            Laharana karine
                                        </th>
                                        <th>
                                            Fahatongavana
                                        </th>
                                        <th>
                                            Antony
                                        </th>
                                        <th>
                                            Daty
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sazy as $sazys) { ?>
                                    <tr class="trsektera">
                                        <td><?=$sazys["idsazy"]?></td>
                                        <td><?=$sazys["laharanaKarineSazy"]?></td>
                                        <td><?=$sazys["presence"]?></td>
                                        <td><?=$sazys["motif"]?></td>
                                        <td><?=$sazys["date"]?></td>
                                    </tr>
                                    <?php } ?>
                                    <script>
                                    let Actbtn = document.querySelectorAll('.Actbtn')
                                    for (let i = 0; i < Actbtn.length; i++) {
                                        setTimeout('load_table()');

                                        function load_table() {
                                            Actbtn[i].addEventListener('click', () => {
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