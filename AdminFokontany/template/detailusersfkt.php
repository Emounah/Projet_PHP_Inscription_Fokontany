<?php

    // if(isset($_GET['idusers'])){
    //     $id=$_GET['idusers'];
    //     deleteentity("users",$id,"idusers");
    //     header("Location:listepresidentfokontany.php");
    //   }
    $presidentfokontanynav = true;
    include_once '../../ressourse/layoutFokontany/header.php';
    if (isset($_GET['idankohonana'])) {
        $ankohonana = affichageAnkohonana("idankohonana",intval($_GET['idankohonana']));
    }
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body clearfix" style="display:flex; align-items:center; flex-direction:column;">
                    <a href="listeusers.php" class="float-start"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
                        <h4 class="card-title">Mombamomba</h4>
                        <?php foreach($ankohonana as $ankohonanas) { ?>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Faritra :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$_SESSION["nomFaritras"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Distrika :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$_SESSION["nomDistrikas"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Kaominina :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$_SESSION["nomKaomininas"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Fokontany :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$_SESSION["nomFokontanys"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Laharana Karine :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["numeroCarnet"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Sektera :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["nomSecteur"]?></p>
                        </div>
                        <div class="containerss">
                            <figure class="image-container">
                                <img id="chosen-imagee" src="../../Public/img/image_users/<?=$ankohonanas["saryUsers"]?>">
                            </figure>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Anarana :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["NomtUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Fanampin'anarana :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["PrenomtUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Laharana Finday :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["ContactUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Taona naterana :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["DdntUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Toerana naterana :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["ddnlieuxUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Ray niteraka :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["rayniterakaUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Reny niteraka :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["renyniterakUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Laharana karapanondro :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["NumeroCin"]?></p>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"> <span style="font-size:20px;color:black; font-weight:bold;">natao ny : </span> <?=$ankohonanas["cindateUsers"]?></p>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><span style="font-size:20px;color:black; font-weight:bold;">tao : </span><?=$ankohonanas["cinlieuxUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Adiresy :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["adiresyUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Asa :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["asaataoUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Sexa :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["sexeUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Toerana ao antokatrano :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["toeranaantranoUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4></h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["safidyUsers"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Laharana Pasipaoro :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["pasipaoronumUsers"]?></p>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"> <span style="font-size:20px;color:black; font-weight:bold;">natao tao : </span> <?=$ankohonanas["pasipaorolieuxUsers"]?></p>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><span style="font-size:20px;color:black; font-weight:bold;">Maharitra : </span><?=$ankohonanas["pasipaorodelaiUsers"]?></p>
                        </div>
                       
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Daty nidirana aminy fokontany :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$ankohonanas["usersDate"]?></p>
                        </div>
                    <?php } ?>
                        <!-- <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p> -->
                  <a href="listeusers.php"> <button class="btn btn-danger btn-round">Hiala</button> </a>
                        <div class="table-responsive pt-3">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
    include_once '../../ressourse/layoutFokontany/footer.php';
?>