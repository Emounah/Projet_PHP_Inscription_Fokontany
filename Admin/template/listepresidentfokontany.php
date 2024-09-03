<?php
    $searchtabdiscom = true;
    $count=0;
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    if(isset($_GET['idusers'])){
        $id=$_GET['idusers'];
        deleteentity("users",$id,"idusers");
        $image = $_GET["image"];
        unlink("../../Public/img/image_presidentFkt/".$image);
        header("Location:listepresidentfokontany.php");
    }
    $presidentFokontany = affichagePresidentFkt();
    $presidentfokontanynav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listes des Presidents Fokontany</h4>
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
                                            Nom
                                        </th>
                                        <th>
                                            Prénom
                                        </th>
                                        <th>
                                            Age
                                        </th>
                                        <th>
                                            CIN
                                        </th>
                                        <th>
                                            Mot de Passe
                                        </th>
                                        <th>
                                            Fokontany
                                        </th>
                                        <th>
                                            Commune
                                        </th>
                                        <th>
                                            District
                                        </th>
                                        <th>
                                            Région
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($presidentFokontany as $presidentFokontanys) { $count++ ?>
                                    <tr class="trusers">
                                        <td><?=$presidentFokontanys["idusers"]?></td>
                                        <td><?=$presidentFokontanys["nom"]?></td>
                                        <td><?=$presidentFokontanys["prenom"]?></td>
                                        <td class="tdDdnAge"></td>
                                        <td><?=$presidentFokontanys["cin"]?></td>
                                        <td><?=dechiffrement($presidentFokontanys["mdp"])?></td>
                                        <td><?=$presidentFokontanys["nomFokontanys"]?></td>
                                        <td><?=$presidentFokontanys["nomKaomininas"]?></td>
                                        <td><?=$presidentFokontanys["nomDistrikas"]?></td>
                                        <td><?=$presidentFokontanys["nomFaritras"]?></td>
                                    <td>
                                            <a href="modification_presidentfkt.php?idusers=<?=$presidentFokontanys["idusers"]?>&image=<?=$presidentFokontanys["sary"]?>"><button class="btn btn-success btn-icon"><i class="ti-pencil"></i></button></a>
                                            <button class="btn btn-danger btn-icon" data-bs-toggle="modal"
                                                data-bs-target="#modal1<?php echo $count; ?>"><i
                                                    class="ti-trash"></i></button>
                                            <a href="detailpresidentfkt.php?idusers=<?=$presidentFokontanys["idusers"]?>"><button class="btn btn-primary btn-icon"><i class="fab fa-readme"></i></button></a>
                                        </td>
                                    </tr>
                                    <input type="hidden" value="<?=$presidentFokontanys["ddn"]?>" name="" id="inputAge">
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
                                                    <a href="listepresidentfokontany.php?idusers=<?=$presidentFokontanys["idusers"]?>&image=<?=$presidentFokontanys["sary"]?>">
                                                        <button class="btn btn-danger btn-round">OUI</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Fin du Modal-->
                                    <?php } ?>
                                    <script>
                                        let dmj,year,m,day,newDate,sumDate;
                                        newDate = (new Date().getFullYear());
                                        newM = (new Date().getMonth()+1);
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
                                            }else{
                                                sumDate = newDate - year;
                                                if (sumDate===0) {
                                                   sumDate = newDate - year;
                                                }else{
                                                    sumDate = newDate - year-1;
                                                }
                                            }
                                            tdDdnAg[i].textContent = sumDate + " ans";
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
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>