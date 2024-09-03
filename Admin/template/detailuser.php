<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    if (isset($_GET["idusers"])) {
        $user = affichageUser("idusers",intval($_GET["idusers"]));
    }
    $populationnav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="display:flex; align-items:center; flex-direction:column;">
                        <h4 class="card-title">Details</h4>
                        <?php foreach($user as $users) { ?>
                        <div class="containerss">
                            <figure class="image-container">
                                <img id="chosen-imagee" src="../../Public/img/image_users/<?=$users["sary"]?>">
                            </figure>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Nom :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["nom"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Prénom :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["prenom"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Date de naissance :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["ddn"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Lieux de naissance :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["ddnlieux"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Père :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["rayniteraka"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Mère :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["renyniterak"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>CIN :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["cin"]?></p>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"> <span style="font-size:20px;color:black; font-weight:bold;">fait le </span> <?=$users["cindate"]?></p>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><span style="font-size:20px;color:black; font-weight:bold;">à </span> <?=$users["cinlieux"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Adresse :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["adiresy"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Travail :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["asaatao"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Sexe :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["sexe"]?></p>
                        </div>
                    
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Mot de passe :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=dechiffrement($users["mdp"])?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Fokontany :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["nomFokontanys"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Commune :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["nomKaomininas"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>District :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["nomDistrikas"]?></p>
                        </div>
                        <div style="display:flex; align-items:center; flex-direction:row;">
                            <h4>Région :</h4>
                            <p style="margin:.1px 0 2px 10px; font-size:18px;"><?=$users["nomFaritras"]?></p>
                        </div>
                        <!-- <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p> -->
                  <?php } ?>
                  <a href="listepopulation.php"> <button class="btn btn-danger btn-round">Fermer</button> </a>
                        <div class="table-responsive pt-3">

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