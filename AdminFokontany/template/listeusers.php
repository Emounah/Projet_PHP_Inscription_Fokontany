<?php
    $searchtabdiscom = true;
    $count = 0;
    $count1 = 0;
    $usersnav = true;
    include_once '../../ressourse/layoutFokontany/header.php';
    if (isset($_GET["idusers"])) {
        $id = $_GET["idusers"];
        deleteentity("users",$id,"idusers");
        $image = $_GET["image"];
        unlink("../../Public/img/image_users/".$image);
        echo "<script>window.location.href='listeusers.php';</script>";
    }
    if (isset($_GET["idusers"]) && isset($_GET["idankohonana"]) && isset($_GET["image"])) {
        $id = $_GET["idusers"];
        $idank = $_GET["idankohonana"];
        deleteentity("ankohonana",$id,"idankohonana");
        deleteentity("users",$id,"idusers");
        $image = $_GET["image"];
        unlink("../../Public/img/image_users/".$image);
        echo "<script>window.location.href='listeusers.php';</script>";
    }
    $user = affichageUsers('idfokontany',intval($_SESSION["idFokontanys"]));
    $userAkohonana = affichageAnkohonana('idfokontany',intval($_SESSION["idFokontanys"]));

?>
<!-- partial -->
<div class="main-panel" id="tablesektera">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <?php if (count($userindex)==0) {
                    } else{ ?>
                    <div class="card-body">
                        <h4 class="card-title">Lisitr'ireo nanoratra anarana sy hifindra monina</h4>
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
                                            Sary
                                        </th>
                                        <th>
                                            Anarana
                                        </th>
                                        <th>
                                            Fanampin'anarana
                                        </th>
                                        <th>
                                            Taona
                                        </th>
                                        <th>
                                            Karapanondro
                                        </th>
                                        <th>
                                            Sektera
                                        </th>
                                        <th>
                                            Karine
                                        </th>
                                        <th>
                                            Statut
                                        </th>
                                        <th>
                                            Fanovana/Famafana
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach($user as $users) { $count++ ?>
                                    <tr class="trusers">
                                        <td><?=$users["idusers"]?></td>
                                        <td>
                                            <img src="../../Public/img/image_users/<?=$users["sary"]?>" width="40"
                                                height="40" alt="">
                                        </td>
                                        <td><?=$users["nom"]?></td>
                                        <td><?=$users["prenom"]?></td>
                                        <td class="tdDdnAge"></td>
                                        <td><?=$users["cin"]?></td>
                                        <td><?=$users["nomSecteur"]?></td>
                                        <td class="<?=$users["numkarine"]==""?"":"bg-primary" ?>"><?=$users["numkarine"]?></td>
                                        <td class="<?=$users["statut"]=="Vaovao"?"bg-danger":"bg-success" ?>"
                                            style="text-align:center;"><?=$users["statut"]?></td>
                                        <td>
                                            <a
                                                href="modification_users.php?idusers=<?=$users["idusers"]?>&image=<?=$users["sary"]?>"><button
                                                    class="btn btn-success btn-icon"><i
                                                        class="ti-pencil"></i></button></a>
                                            <button class="btn btn-danger btn-icon" data-bs-toggle="modal"
                                                data-bs-target="#modal11<?php echo $count; ?>"><i
                                                    class="ti-trash"></i></button>
                                            <a href="karine_users.php?idusers=<?=$users["idusers"]?>"><button
                                                    class="btn btn-primary btn-icon"><i
                                                        class="fab fa-readme"></i></button></a>
                                        </td>
                                    </tr>
                                    <input type="hidden" value="<?=$users["ddn"]?>" name="" id="inputAge">
                                    <!--Modal-->
                                    <div class="modal fade" id="modal11<?php echo $count; ?>">
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
                                                    <p>Tena ho fafanao marina ve io lisitra iray io ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success btn-round"
                                                        data-bs-dismiss="modal">Tsia</button>
                                                    <a
                                                        href="listeusers.php?idusers=<?=$users["idusers"]?>&image=<?=$users["sary"]?>">
                                                        <button class="btn btn-danger btn-round Actbtn">Eny</button>
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
                    <?php } ?>
                    <div class="card-body">
                        <h4 class="card-title">Lisitr'ireo Mponina amin'ny Fokontany</h4>
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
                                            Laharana Karine
                                        </th>
                                        <th>
                                            Sektera
                                        </th>
                                        <th>
                                            Laharana Finday
                                        </th>
                                        <th>
                                            Anarana
                                        </th>
                                        <th>
                                            Fanampin'anarana
                                        </th>
                                        <th>
                                            Taona
                                        </th>
                                        <th>
                                            Karapanondro
                                        </th>
                                        <th>
                                            Sarampisoratana anarana
                                        </th>
                                        <th>
                                            Fanovana/Famafana
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach($userAkohonana as $userAkohonas) { $count1++ ?>
                                    <tr class="trusers">
                                        <td><?=$userAkohonas["idankohonana"]?></td>
                                        <td>
                                            <?=$userAkohonas["numeroCarnet"]?>
                                        </td>
                                        <td><?=$userAkohonas["nomSecteur"]?></td>
                                        <td><?=$userAkohonas["ContactUsers"]?></td>
                                        <td><?=$userAkohonas["NomtUsers"]?></td>
                                        <td><?=$userAkohonas["PrenomtUsers"]?></td>
                                        <td class="tdDdnAgefkt"></td>
                                        <td><?=$userAkohonas["NumeroCin"]?></td>
                                        <td class="<?=$userAkohonas["sarampisoratana"]=="Tsy voaloha" || $userAkohonas["sarampisoratana"]==""?"bg-danger":"bg-success"?>"
                                            style="text-align:center;"><?=$userAkohonas["sarampisoratana"]?></td>
                                        <td>
                                            <button class="btn btn-success btn-icon" data-bs-toggle="modal" data-bs-target="#modal3<?php echo $count1; ?>" ><i class="ti-pencil"></i></button>
                                            <button class="btn btn-danger btn-icon" data-bs-toggle="modal"
                                                data-bs-target="#modal1<?php echo $count1; ?>"><i
                                                    class="ti-trash"></i></button>
                                            <button class="btn btn-primary btn-icon" data-bs-toggle="modal"
                                                data-bs-target="#modal2<?php echo $count1; ?>"><i
                                                    class="fab fa-readme"></i></button>
                                        </td>
                                    </tr>
                                    <input type="hidden" value="<?=$userAkohonas["DdntUsers"]?>" name=""
                                        id="inputAgefkt">
                                    <!--Modal-->
                                    <div class="modal fade" id="modal1<?php echo $count1; ?>">
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
                                                    <p>Tena ho fafanao marina ve io lisitra iray io ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success btn-round"
                                                        data-bs-dismiss="modal">Tsia</button>
                                                    <a
                                                        href="listeusers.php?idankohonana=<?=$userAkohonas["idankohonana"]?>&idusers=<?=$userAkohonas["idusers"]?>&image=<?=$userAkohonas["saryUsers"]?>">
                                                        <button class="btn btn-danger btn-round Actbtnfkt">Eny</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Fin du Modal-->
                                     <!--Modal-->
                                     <div class="modal fade" id="modal2<?php echo $count1; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" aria-labelledby="modal title">
                                                        Takelaka
                                                    </h5>
                                                    <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                            class="ti-close"></i></button>
                                                </div>
                                                <div class="modal-body" aria-describedby="content">
                                                    <p>Raha hijery ny mombamomba dia tsindrio ny bokotra manga hoe "mombamoba" ,fa raha hanome fanamarinam-ponenana dia tsindrio ny bokotra mena hoe "Fanamarinam-ponenana" </p>
                                                </div>
                                                <div class="modal-footer">
                                                        <a href="detailusersfkt.php?idankohonana=<?=$userAkohonas["idankohonana"]?>">
                                                        <button class="btn btn-primary btn-round" data-bs-dismiss="modal">Mombamomba</button>
                                                        </a>
                                                    <a
                                                        href="certificat.php?idusers=<?=$userAkohonas["idusers"]?>">
                                                        <button class="btn btn-danger btn-round Actbtnfkt">Fanamarinam-ponenana</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Fin du Modal-->
                                       <!--Modal-->
                                       <div class="modal fade" id="modal3<?php echo $count1; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" aria-labelledby="modal title">
                                                        Takelaka
                                                    </h5>
                                                    <button class="btn btn-white" data-bs-dismiss="modal"><i
                                                            class="ti-close"></i></button>
                                                </div>
                                                <div class="modal-body" aria-describedby="content">
                                                    <p>Raha hanova ny mombamomba dia tsindrio ny bokotra manga hoe "Fanovana" , raha hijery ny adidy dia tsindrio ny bokotra manga hoe "Adidy" ary raha hijery ny sazy dia tsindrio ny "Sazy", fa raha hamindra toerana dia tsindrio ny bokotra mena "Hifindra" </p>
                                                </div>
                                                <div class="modal-footer">
                                                        <a href="modification_ankohonana.php?idkarine=<?=$userAkohonas["numeroCarnet"]?>&idkarines=<?=$userAkohonas["idkarine"]?>&idusers=<?=$userAkohonas["idusers"]?>&idankohonana=<?=$userAkohonas["idankohonana"]?>&image=<?=$userAkohonas["saryUsers"]?>">
                                                        <button class="btn btn-primary btn-round" data-bs-dismiss="modal">Fanovana</button>
                                                        </a>
                                                        <a href="adidy.php?idkarine=<?=$userAkohonas["numeroCarnet"]?>&idusers=<?=$userAkohonas["idusers"]?>&idkarines=<?=$userAkohonas["idkarine"]?>&nomUsers=<?=$userAkohonas["NomtUsers"]?>&prenomUsers=<?=$userAkohonas["PrenomtUsers"]?>">
                                                        <button class="btn btn-success btn-round" data-bs-dismiss="modal">Adidy</button>
                                                        </a>
                                                        <a href="sazy.php?idusers=<?=$userAkohonas["idusers"]?>&idkarines=<?=$userAkohonas["idkarine"]?>&nomUsers=<?=$userAkohonas["NomtUsers"]?>&prenomUsers=<?=$userAkohonas["PrenomtUsers"]?>">
                                                        <button class="btn btn-success btn-round" data-bs-dismiss="modal">Fandraisana Anjara</button>
                                                        </a>
                                                    <a
                                                        href="transfere.php?idusers=<?=$userAkohonas["idusers"]?>&idankohonana=<?=$userAkohonas["idankohonana"]?>">
                                                        <button class="btn btn-danger btn-round Actbtnfkt">Hifindra</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Fin du Modal-->
                                    <?php } ?>
                                    <script>
                                    let dmj, year, m, day, newDate, sumDate;
                                    newDate = (new Date().getFullYear());
                                    newM = (new Date().getMonth() + 1);
                                    newDay = (new Date().getDate());
                                    let inputAges = document.querySelectorAll('#inputAge');
                                    let tdDdnAg = document.querySelectorAll('.tdDdnAge');
                                    for (let i = 0; i < inputAges.length; i++) {
                                        dmj = inputAges[i].value.split("-");
                                        year = +dmj[0];
                                        m = +dmj[1];
                                        day = +dmj[2];
                                        if ((m <= newM && day <= newDay) || (m < newM && day > newDay)) {
                                            sumDate = newDate - year;
                                        } else {
                                            sumDate = newDate - year;
                                            if (sumDate === 0) {
                                                sumDate = newDate - year;
                                            } else {
                                                sumDate = newDate - year - 1;
                                            }
                                        }
                                        tdDdnAg[i].textContent = sumDate + " Taona";
                                    }

                                    let dmjfkt, yearfkt, mfkt, dayfkt, newDatefkt, sumDatefkt;
                                    newDatefkt = (new Date().getFullYear());
                                    newMfkt = (new Date().getMonth() + 1);
                                    newDayfkt = (new Date().getDate());
                                    let inputAgesfkt = document.querySelectorAll('#inputAgefkt');
                                    let tdDdnAgfkt = document.querySelectorAll('.tdDdnAgefkt');
                                    for (let i = 0; i < inputAgesfkt.length; i++) {
                                        dmjfkt = inputAgesfkt[i].value.split("-");
                                        yearfkt = +dmjfkt[0];
                                        mfkt = +dmjfkt[1];
                                        dayfkt = +dmjfkt[2];
                                        if ((mfkt <= newMfkt && dayfkt <= newDayfkt) || (mfkt < newMfkt && dayfkt >
                                                newDayfkt)) {
                                            sumDatefkt = newDatefkt - yearfkt;
                                        } else {
                                            sumDatefkt = newDatefkt - yearfkt;
                                            if (sumDatefkt === 0) {
                                                sumDatefkt = newDatefkt - yearfkt;
                                            } else {
                                                sumDatefkt = newDatefkt - yearfkt - 1;
                                            }
                                        }
                                        tdDdnAgfkt[i].textContent = sumDatefkt + " Taona";
                                    }
                                    </script>
                                    <script>
                                    let Actbtn = document.querySelectorAll('.Actbtnfkt')
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
    <!-- content-wrapper ends -->
    <script src="../../js/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#tadiavina").on("keyup", function() {
            let value = $(this).val().toUpperCase();
            $(".trusers").each(function() {
                $(this).toggle($(this).text().toUpperCase().indexOf(value) >= 0);
            });
        });
    });
    </script>
    <?php
    include_once '../../ressourse/layoutFokontany/footer.php';
?>