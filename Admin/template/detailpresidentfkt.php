<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    $presidentFokontany = sqlPresidentFkt("idusers",intval($_GET["idusers"]));
    // if(isset($_GET['idusers'])){
    //     $id=$_GET['idusers'];
    //     deleteentity("users",$id,"idusers");
    //     header("Location:listepresidentfokontany.php");
    //   }
    $presidentfokontanynav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <a href="listepresidentfokontany.php" class="float-start mb-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
        <!-- <button class="btn btn-secondary btn-round " id="print">IMPRIMER</button> -->
            <div class="col-lg-12 grid-margin stretch-card" id="printable">
                <div class="card">
                    <div class="card-body" style="display:flex; align-items:center; flex-direction:column;">
                        <h4 class="card-title">Details</h4>
                        <?php foreach($presidentFokontany as $presidentFokontanys) { ?>
                        <div class="containerss">
                            <figure class="image-container">
                                <img id="chosen-imagee" src="../../Public/img/image_presidentFkt/<?=$presidentFokontanys["sary"]?>">
                            </figure>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Nom :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["nom"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Prénom :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["prenom"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Date de naissance :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["ddn"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Lieux de naissance :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["ddnlieux"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Père :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["rayniteraka"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Mère :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["renyniterak"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>CIN :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["cin"]?></p>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"> <span style="font-size:20px;color:black; font-weight:bold;">fait le </span> <?=$presidentFokontanys["cindate"]?></p>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><span style="font-size:20px;color:black; font-weight:bold;">à </span> <?=$presidentFokontanys["cinlieux"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Adresse :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["adiresy"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Travail :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["asaatao"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Sexe :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["sexe"]?></p>
                        </div>
                    
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Mot de passe :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=dechiffrement($presidentFokontanys["mdp"])?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Fokontany :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["nomFokontanys"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Commune :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["nomKaomininas"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>District :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["nomDistrikas"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Région :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["nomFaritras"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Statut :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$presidentFokontanys["statut"]?></p>
                        </div>
                        <!-- <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p> -->
                  <?php } ?>
                        <div class="table-responsive pt-3">

                        </div>
                    </div>
                </div>
            </div>
            <a href="listepresidentfokontany.php" class="float-start mb-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>

        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- <script src="../../js/jQuery.print.min.js"></script> -->
    <!-- <script>
        $(function() {
            $('#print').on('click', function() {
                document.querySelector('.titre1').classList.add('toprint');
                $.print("#printable");
            });
            });
    </script> -->
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>