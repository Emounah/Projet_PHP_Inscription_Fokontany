<?php

    // if(isset($_GET['idusers'])){
    //     $id=$_GET['idusers'];
    //     deleteentity("users",$id,"idusers");
    //     header("Location:listepresidentfokontany.php");
    //   }
    $usersnav = true;
    include_once '../../ressourse/layoutFokontany/header.php';
    // if (isset($_GET['idankohonana'])) {
    //     $ankohonana = affichageAnkohonana("idankohonana",intval($_GET['idankohonana']));
    // }
    if (isset($_GET["idusers"])) {
        $user = affichageUsersCertificat('idusers',intval($_GET["idusers"]));
    }
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <a href="listeusers.php" class="float-start mb-2"> <button class="btn btn-danger btn-round"><i class="fas fa-x"></i></button> </a>
        <button class="btn btn-secondary btn-round " id="print">IMPRIMER</button>
        <div class="col-lg-12 grid-margin stretch-card" id="printable">
            <div class="card" >
                <?php foreach($user as $users) { ?>
                    <div class="blockcertificat" >
                        <div class="titrecert">
                          <h1>REPOBLIKAN'I MADAGASIKARA</h1>
                          <span><span>Fitiavana </span>-<span class="titrespanbar"> Tanindrazana </span>-<span> Fandrosoana</span></span>
                        </div>
                        <div class="titre1">
                         <div class="titre11 titre13" style="text-transform: uppercase;">
                            <h6>MINISTERAN'NY ATITANY SY NY FITSINJARAM-PAHEFANA</h6> 
                            <span class="titre11span"></span>
                            <h6>PREFEKTIORAN'NY POLISIN<span id="apostre"></span><span id="nomCommune"><?=$users["nomKaomininas"]?></span></h6>
                            <span class="titre11span"></span>
                            <h6>DISTRIKAN<span id="apostreD"></span> <span id="nomDistrict"><?=$users["nomDistrikas"]?></span></h6>
                            <span class="titre11span"></span>
                             
                         </div>
                         <div class="titre12 titre13">
                            <h4>FANAMARINAM-PONENANA</h4> 
                            <h5><i>CERTIFICAT DE RESIDENCE</i></h5> 
                         </div>
                        </div>
                        <div class="corp">
                           <div class="corp1">
                            <div class="corp2 corp22">
                                <p>FOKONTANY : </p>
                                <p class="pcorp"><?=$users["nomFokontanys"]?></p>
                            </div>
                             <div class="chef corp22">
                                <h4>NY SEFO FOKONTANY DIA MANAMARINA FA :</h4> 
                                 <i>(LE CHEF FOKONTANY CERTIFIE QUE)</i>
                             </div>
                           </div>
                           <div class="corp1 corp221">
                            <div class="corp2 corp22">
                                <p>Atoa/Rtoa (M/Mme/Mle) : </p>
                                <p class="pcorp"><?=$users["nom"]." ".$users["prenom"]?></p>
                            </div>
                             <div class="corp2 corp22">
                                <p>Asa : </p>
                                <p class="pcorp"><?=$users["asaatao"]?></p>
                             </div>
                           </div>
                           <div class="corp1 corp221">
                            <div class="corp2 corp22">
                                <p>Teraka tamin'ny : </p>
                                <p class="pcorp"><?=$users["ddn"]?></p>
                            </div>
                             <div class="corp2 corp22">
                                <p>Tao : </p>
                                <p class="pcorp"><?=$users["ddnlieux"]?></p>
                                <p>Zom-pirenena(Nationalité) : </p>
                                <p class="pcorp">MALAGASY</p>
                             </div>
                           </div>
                           <div class="corp1 corp221">
                            <div class="corp2 corp22">
                                <p>Zanak'i(Fils ou Fille de) : </p>
                                <p class="pcorp"><?=$users["rayniteraka"]?></p>
                            </div>
                             <div class="corp2 corp22">
                                <p>sy : </p>
                                <p class="pcorp"><?=$users["renyniterak"]?></p>
                             </div>
                           </div>
                           <div class="corp1 corp221">
                            <div class="corp2 corp22">
                                <p>Dia monina ao amin'ny : </p>
                                <p class="pcorp"><?=$users["adiresy"]?></p>
                            </div>
                           </div>
                           <div class="corp1 corp221">
                            <div class="corp2 corp22">
                                <p>Antony ilana azy(Motif d'usage) : </p>
                                <p class="pcorp"></p>
                            </div>
                           </div>
                        </div>
                        <p style="font-size:18px;">Noho izany, dia omena azy ity fanamarinana ity, mba hampiasainy sy hanan-kery amin'izay rehetra mety ilàna azy.</p>
                        <p style="font-size:18px;">(En foi de quoi, le présent certificat lui est délivre pour servir et valoir ce que de droit)</p>
                        <div class="corp1 corp221 mgbottom">
                            <div class="corpcin">
                                <div class="corp2 corp22">
                                    <p>CIN-Passeport N° : </p>
                                    <p class="pcorp"><?=$users["cin"]?></p>
                                </div>
                                <div class="corp2 corp22">
                                    <p>Du : </p>
                                    <p class="pcorp"><?=$users["cindate"]?></p>
                                </div>
                            </div>
                             <div class="corp2 corp22">
                                <p>Natao teto(Fait à) : </p>
                                <p class="pcorp" style="color:red;"><?=$users["nomKaomininas"]?></p>
                                <p>Androany Faha(de) : </p>
                                <p class="pcorp" style="color:red;" id="datyandroany"></p>
                             </div>
                           </div>
                    </div>
                    <?php } ?>
                    <script>
                     let newDay,newM,newDate,newJours,newMois;
                    newDate = (new Date().getFullYear());
                    newM = (new Date().getMonth() + 1);
                    newDay = (new Date().getDate()); 
                    if (newM <= 9) {  
                       newMois = "0"+newM     
                    }else{
                        newMois = newM;
                    }
                    if (newDay <= 9) {  
                        newJours = "0"+newDay     
                    }else{
                        newJours = newDay;
                    }
                    // console.log(newMTab);

                    document.querySelector('#datyandroany').textContent=`${newJours}/${newMois}/${newDate}`;

                    let apostre = document.querySelector('#apostre');
                    let nomCommune = document.querySelector('#nomCommune');
                    let nomCommuneSplit = nomCommune.textContent.split("");
                    let premierNbr = nomCommuneSplit[0];
                    console.log(premierNbr);
                    if (premierNbr == "O" || premierNbr == "E" || premierNbr == "A" || premierNbr == "I" || premierNbr == "U" || premierNbr == "Y") {
                        apostre.textContent = `'`;
                    }else{
                        apostre.textContent = `Y `;
                    }

                    let apostreD = document.querySelector('#apostreD');
                    let nomDistrict = document.querySelector('#nomDistrict');
                    let nomDistrictSplit = nomDistrict.textContent.split("");
                    let premierNbrDistrict = nomDistrictSplit[0];
                    // console.log(premierNbrDistrict );
                    if (premierNbrDistrict == "O" || premierNbrDistrict == "E" || premierNbrDistrict == "A" || premierNbrDistrict == "I" || premierNbrDistrict == "U" || premierNbrDistrict == "Y") {
                        apostreD.textContent = `'`;
                    }else{
                        apostreD.textContent = `Y `;
                    }
                    </script>
                </div>
            </div>
            <!-- <button class="btn btn-secondary btn-round imprimente">IMPRIMER</button> -->
        </div>
    </div>
    <!-- content-wrapper ends -->

    <?php
    include_once '../../ressourse/layoutFokontany/footer.php';
?>
    <script src="../../js/jQuery.print.min.js"></script>
    <script>
        $(function() {
            $('#print').on('click', function() {
                document.querySelector('.titre1').classList.add('toprint');
                $.print("#printable");
            });
            });
    </script>