<?php
   $membrenav = true;
   include_once 'ressourse/layouts/page/header.php';
   if (!isset($_SESSION["nomUser"])) {
    header("Location:connexion.php");
   }

   $Fokontany = sqlFokontany("idfokontany",intval($_SESSION["idFokontanysUser"]));
   $affichageSecteur = affichageSecteur("idfokontany",intval($_SESSION["idFokontanysUser"]));
   $publication = affichagePublication("idfokontany",intval($_SESSION["idFokontanysUser"]));
   $carnet = sqlCarnet("idusers",intval($_SESSION["idusersUser"]));
   $idcarnet = $carnet["idkarine"];
   $numCarnet = sqlCarnetNumero("idkarine",intval($idcarnet));
   $ankohonana = affichageAnkohonana("idkarine",$idcarnet);
   if (isset($_POST["btnentrer"])) {
    $errorUser = insertionUsersAnkohonana($numCarnet["laharanakarine"]);
   }
   $adidy = get("payment");
   if (isset($_POST["btnpaymentinscri"])) {
        $erroradidy = payementFrais();
   }
   if (isset($_POST["btninscrAdidy"])) {
    $erroradidyTaona = insertionAdidy();
}
if (isset($_POST["btninscrSazy"])) {
    $errorsazy = insertionSazy();
}
if (isset($_POST["btnmdp"])) {
    $errormdp = updateMdp();
}
$adidyListe = affichageAdidy("idkarine", $idcarnet);
$sazy = affichageSazy("idkarine",$idcarnet)
?>
<section class="sec2-safidy sec2-membre">
    <div class="titre">
        <img src="Public/img/image_users/<?=$_SESSION["saryUser"]?>" alt="" srcset="">
        <h1><?=$_SESSION["nomUser"] ?> <?=$_SESSION["prenomUser"]?></h1>
        <h1>Tongasoa eto amin'ny <span>FOKONTANY</span> <?=$_SESSION["nomFokontanysUser"]?></h1>
        <span>Faritra : <span class="colore"><?=$_SESSION["nomFaritrasUser"]?></span>, Kaominina : <span
                class="colore"><?=$_SESSION["nomKaomininasUser"]?></span>,
            Disitrika : <span class="colore"><?=$_SESSION["nomDistrikasUser"]?></span></span>
    </div>
    <div class="sec2-block bg-basic ">
        <h1 class="text-danger"><?=isset($erroradidy)?$erroradidy:""?></h1>
        <h1 class="text-danger"><?=isset($errorsazy)?$errorsazy:""?></h1>
        <?php if (isset($errorUser)) { ?>
        <?php foreach($errorUser as $errorUsers) { ?>
        <h1 class="text-danger responsePara"><?=$errorUsers?></h1>
        <?php } ?>
        <?php } ?>
        <?php if (isset($erroradidyTaona)) { ?>
        <h1 class="text-danger responsePara"><?=$erroradidyTaona?></h1>
        <?php } ?>
        <?php if (isset($errormdp)) { ?>
        <?php foreach($errormdp as $errormdps) { ?>
        <h1 class="text-danger responsePara"><?=$errormdps?></h1>
        <?php } ?>
        <?php } ?>
        <div class="btn-sec2">
            <button class="btn btn-success btnapropos btnkarine"><i class="fas fa-address-card me-2"></i>Hijery Bokim-pokontany</button>
            <button class="btn btn-success btnapropos" data-bs-toggle="modal" data-bs-target="#modal1"><i class="fas fa-money-bill-wave-alt me-2"></i>Handoa
                vola</button>
            <button class="btn btn-success btnapropos btnajouthomme"><i class="fas fa-plus-circle me-2"></i>Ampiditra olona ao anaty Boky</button>
            <button class="btn btn-success btnapropos btnmdp"><i class="fas fa-key me-2"></i>Hanova teny miafina</button>

        </div>
        <!--Modal-->
        <div class="modal fade" id="modal1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title responsePara" aria-labelledby="modal title">
                            Fandoavam-bola
                        </h5>
                        <button class="btn btn-white" data-bs-dismiss="modal"><i class="ti-close"></i></button>
                    </div>
                    <div class="modal-body" aria-describedby="content">
                        <p class="responsePara">Safidio ny izay andoavanao vola</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-round responsePara btnpaymentinscri"
                            data-bs-dismiss="modal">Saram-pisoratan'anarana</button>
                        <button class="btn btn-primary btn-round responsePara btnpaymentadidy" data-bs-dismiss="modal">Adidy
                            isan-taona</button>
                        <button class="btn btn-danger btn-round responsePara btnpaymentsazy" data-bs-dismiss="modal">Andoa
                            sazy</button>
                        <button class="btn btn-success btn-round responsePara btnpaymentinscri"
                            data-bs-dismiss="modal">Ajanona</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin du Modal-->
        <div class="d-flex justify-content-center sec-karine">
            <?php foreach($ankohonana as $ankohonanas) { ?>
            <input type="hidden" value="<?=$ankohonanas["DdntUsers"]?>" name="" id="inputAge">
            <div class="sec2-list alert alert-dark mt-2 ms-2 me-2">
                <!-- <i class="fas fa-times retour-liste"></i> -->
                <div class="list-apropos">
                    <h4 class="nomp">Laharana Boky :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["numeroCarnet"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Sektera :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["nomSecteur"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Laharana finday :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["ContactUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Anarana :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["NomtUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Fanampin'anarana :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["PrenomtUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Adiresy :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["adiresyUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Date naterahana :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["DdntUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Taona :</h4>
                    <h4 class="nompersonne tdDdnAge"></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Toerana naterahana :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["ddnlieuxUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Ray niteraka :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["rayniterakaUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Reny niteraka :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["renyniterakUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Karapanondro laharana faha :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["NumeroCin"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Natao ny :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["cindateUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Tao :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["cinlieuxUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Pasipaoro laharana faha :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["pasipaoronumUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">natao tao :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["pasipaorolieuxUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Faharetany :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["pasipaorodelaiUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Asa atao :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["asaataoUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Toerana misy anao ao antokatrano :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["toeranaantranoUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Teny miafina(mot de passe) :</h4>
                    <h4 class="nompersonne"><?=dechiffrement($ankohonanas["mdpUsers"])?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nompersonne"><?=$ankohonanas["safidyUsers"]?></h4>
                </div>
                <div class="list-apropos">
                    <h4 class="nomp">Saram-pisoratan'anarana :</h4>
                    <h4 class="nompersonne"><?=$ankohonanas["sarampisoratana"]?></h4>
                </div>
                <div class="form-fokontany-karine">
                </div>
            </div>
            <?php } ?>
        </div>
        <form class="forminscri responsinscri form-payment bg-white" method="post">
            <i class="fas fa-times retour-form" style="cursor:pointer;"></i>
            <h2 class="btninscr">Andoa Saram-pisoratan'anarana</h2>
            <!-- <div class="row">
                <div class="col">
                    <label for="" class="form-label">id olonaandoavana vola :</label>
                    <input type="number" id="idolonaandoavana" name="iduserspayment" class="form-control" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">id mpandoa vola :</label>
                    <input type="number" id="idmpandoa" name="lieuxnaissance" class="form-control" readonly>
                </div>
            </div> -->
            <div class="row">
                <div class="col">
                    <label for="" class="form-label btninscr">Anarana andoavana vola :</label>
                    <select class="form-select inputselect" name="iduserspayer" required>
                        <?php foreach($ankohonana as $ankohonanass) { ?>
                            <?php if ($ankohonanass["sarampisoratana"] == "Voaloha") { ?>
                                
                           <?php } else {?>
                        <option value="<?=$ankohonanass["idankohonana"]?>"><?=$ankohonanass["NomtUsers"]?> <?=$ankohonanass["PrenomtUsers"]?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <label for="" class="form-label">Anarana mandoa vola :</label>
                    <select class="form-select inputselect" name="nomdonneur" required>
                        <?php foreach($ankohonana as $ankohonanass) { ?>
                        <option value="<?=$ankohonanass["idusers"]?>"><?=$ankohonanass["NomtUsers"]?> <?=$ankohonanass["PrenomtUsers"]?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <?php foreach($adidy as $adidys) { ?>
                <div class="col">
                    <label for="" class="form-label">Vola aloa (Ariary):</label>
                    <input type="number" value="<?=$adidys["saranyf"]?>" name="sarany" class="form-control" readonly>
                </div>
                <?php } ?>
                <!-- <div class="col">
                    <label for="" class="form-label">Aloa amin'alalany arange money :</label>
                    <input type="number" name="lieuxnaissance" class="form-control" required>
                </div> -->
            </div>

            <!-- <i class="fas fa-arrow-left retour-membre"></i> -->
            <button type="submit" class="btn btn-success btninscr" name="btnpaymentinscri"><i class="fas fa-check-circle me-2"></i>Alefa</button>
        </form>
        <form class="forminscri responsadsaz form-paymentAdidy bg-white" method="post">
            <i class="fas fa-times retour-form-adidy" style="cursor:pointer;"></i>
            <h2 class="btninscr">Andoa Adidy isan-taona</h2>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Anarana mandoa vola :</label>
                    <select class="form-select inputselect" name="nomdonneur" required>
                        <?php foreach($ankohonana as $ankohonanass) { ?>
                        <option value="<?=$ankohonanass["idusers"]?>"><?=$ankohonanass["NomtUsers"]?>
                            <?=$ankohonanass["PrenomtUsers"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <label for="" class="form-label">Vola aloa(Ariary) :</label>
                    <?php foreach($adidy as $adidys) { ?>
                    <input type="number" value="<?=$adidys["adidy"]?>" name="saranyadidy" class="form-control" readonly>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">taona :</label>
                    <input type="date" name="dateadidy" class="form-control">
                </div>
                <div class="col">
                    <!-- <label for="" class="form-label">idKarine :</label> -->
                    <input type="hidden" value="<?=$idcarnet?>" name="idkarine" class="form-control" readonly>
                </div>
            </div>

            <!-- <i class="fas fa-arrow-left retour-membre"></i> -->
            <button type="submit" class="btn btn-success btninscr" name="btninscrAdidy"><i class="fas fa-check-circle me-2"></i>Alefa</button>
            <h4 class="card-title mt-3 mb-1 btninscr">Lisitr'ireo adidy</h4>
            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Adidy isantaona
                                        </th>
                                        <th>
                                            Taona nandoavana adidy
                                        </th>
                                        <th>
                                            Daty
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($adidyListe as $adidyListes) { ?>
                                    <tr class="trsektera">
                                        <td><?=$adidyListes["idadidy"]?></td>
                                        <td><?=$adidyListes["prix"]?></td>
                                        <td><?=$adidyListes["ans"]?></td>
                                        <td><?=$adidyListes["date"]?></td>
                                    </tr>
                                    <?php } ?>
                                    <script>
                                    // let Actbtn = document.querySelectorAll('.Actbtn')
                                    // for (let i = 0; i < Actbtn.length; i++) {
                                    //     setTimeout('load_table()');

                                    //     function load_table() {
                                    //         Actbtn[i].addEventListener('click', () => {
                                    //             $('#tablesektera').load('../controller/fonction_du_site.php');
                                    //         })
                                    //     }
                                    // }
                                    </script>
                                </tbody>
                            </table>
        </form>
        <form class="forminscri responsadsaz form-paymentSazy bg-white" method="post">
            <i class="fas fa-times retour-form-sazy" style="cursor:pointer;"></i>
            <h2 class="btninscr">Andoa Sazy</h2>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Anarana mandoa vola :</label>
                    <select class="form-select inputselect" name="nomdonneur" required>
                        <?php foreach($ankohonana as $ankohonanass) { ?>
                        <option value="<?=$ankohonanass["idusers"]?>"><?=$ankohonanass["NomtUsers"]?>
                            <?=$ankohonanass["PrenomtUsers"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <label for="" class="form-label">Vola aloa(Ariary) :</label>
                    <?php foreach($adidy as $adidys) { ?>
                    <input type="number" value="<?=$adidys["sazy"]?>" name="saranyadidy" class="form-control" readonly>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Daty tsy natongavana:</label>
                    <input type="date" name="dateabsent" class="form-control">
                </div>
                <div class="col">
                    <label for="" class="form-label">Antony :</label>
                    <input type="text" name="motif" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- <label for="" class="form-label">idKarine :</label> -->
                    <input type="hidden" value="<?=$idcarnet?>" name="idkarine" class="form-control" readonly>
                </div>
            </div>
            <!-- <i class="fas fa-arrow-left retour-membre"></i> -->
            <button type="submit" class="btn btn-success btninscr" name="btninscrSazy"><i class="fas fa-check-circle me-2"></i>Alefa</button>
            <h4 class="card-title mt-4 mb-1 btninscr">Lisitr'ireo Fandoavana sazy</h4>
            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
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
                                        <td><?=$sazys["presence"]?></td>
                                        <td><?=$sazys["motif"]?></td>
                                        <td><?=$sazys["date"]?></td>
                                    </tr>
                                    <?php } ?>
                                    <script>
                                    // let Actbtn = document.querySelectorAll('.Actbtn')
                                    // for (let i = 0; i < Actbtn.length; i++) {
                                    //     setTimeout('load_table()');

                                    //     function load_table() {
                                    //         Actbtn[i].addEventListener('click', () => {
                                    //             $('#tablesektera').load('../controller/fonction_du_site.php');
                                    //         })
                                    //     }
                                    // }
                                    </script>
                                </tbody>
                            </table>
        </form>
        <form class="forminscri responsinscri form-membre bg-white" method="post" enctype="multipart/form-data">
            <i class="fas fa-times retour-membre"></i>
            <?php foreach ($Fokontany as $Fokontanys) ?>
            <div class="row">
                <div class="col">
                    <!-- <label for="" class="form-label">idFokontany :</label> -->
                    <input type="hidden" value="<?=$Fokontanys["idfokontany"]?>" name="idFokontany" id="idfokontany"
                        class="form-control" placeholder="Id fokontany" readonly>
                </div>
                <div class="col">
                    <!-- <label for="" class="form-label">idSektera :</label> -->
                    <input type="hidden" name="idSektera" value="<?=$_SESSION["idsekteraUser"]?>" id="idsektera"
                        class="form-control" placeholder="Id Sektera" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Faritra :</label>
                    <input type="text" value="<?=$Fokontanys["nomregion"]?>" class="form-control"
                        placeholder="Faritra misy anao" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">Distrika :</label>
                    <input type="text" value="<?=$Fokontanys["nomdistrict"]?>" class="form-control"
                        placeholder="Distrika misy anao" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Kaominina</label>
                    <input type="text" value="<?=$Fokontanys["nomcommune"]?>" class="form-control"
                        placeholder="Kaominina misy anao" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">Fokontany</label>
                    <input type="text" value="<?=$Fokontanys["nomfokontany"]?>" class="form-control"
                        placeholder="Fokontany misy anao" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Sektera :</label>
                    <input type="text" value="<?=$_SESSION["nomSecteurUser"]?>" name="Sektera" class="form-control"
                        placeholder="Ampidiro laharampindainao" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">Laharana finday :</label>
                    <input type="number" value="<?=isset($_POST["contact"])?$_POST["contact"]:""?>" name="contact" class="form-control" placeholder="Ampidiro laharampindainao">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Anarana :</label>
                    <input type="text" value="<?=isset($_POST["nomusers"])?$_POST["nomusers"]:""?>" name="nomusers" class="form-control" placeholder="Ampidiro Anaranao" required>
                </div>
                <div class="col">
                    <label for="" class="form-label">Fanampin'anarana :</label>
                    <input type="text" value="<?=isset($_POST["prenomusers"])?$_POST["prenomusers"]:""?>" name="prenomusers" class="form-control" placeholder="Ampidiro Fanampin'anaranao"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Taona Naterahana :</label>
                    <input type="date" value="<?=isset($_POST["ddn"])?$_POST["ddn"]:""?>" name="ddn" class="form-control" required>
                </div>
                <div class="col">
                    <label for="" class="form-label">Toerana naterahana :</label>
                    <input type="text" value="<?=isset($_POST["lieuxnaissance"])?$_POST["lieuxnaissance"]:""?>" name="lieuxnaissance" class="form-control"
                        placeholder="Ampidiro ny toerana naterahanao" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Ray niteraka :</label>
                    <input type="text" value="<?=isset($_POST["pere"])?$_POST["pere"]:""?>" name="pere" class="form-control" placeholder="Ampidiro ny Ray niteraka anao"
                        required>
                </div>
                <div class="col">
                    <label for="" class="form-label">Reny niteraka :</label>
                    <input type="text" value="<?=isset($_POST["mere"])?$_POST["mere"]:""?>" name="mere" class="form-control" placeholder="Ampidiro ny Reny niteraka anao"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Karapanondro Laharana Faha : </label>
                    <input type="number" value="<?=isset($_POST["cin"])?$_POST["cin"]:""?>" name="cin" class="form-control" placeholder="Ampidiro Laharana Karapanondronao">
                </div>
                <div class="col">
                    <label for="" class="form-label">Natao ny : </label>
                    <input type="date" value="<?=isset($_POST["datecin"])?$_POST["datecin"]:""?>" name="datecin" class="form-control"
                        placeholder="Ampidiro nanaovana karapanondro">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Tao : </label>
                    <input type="text" value="<?=isset($_POST["lieuxcin"])?$_POST["lieuxcin"]:""?>" name="lieuxcin" class="form-control" placeholder="Toerana nanaovana karapanondro">
                </div>
                <div class="col">
                    <!-- <label for="" class="form-label">Sary : </label> -->
                    <!-- <input type="file" class="form-control" placeholder="Ampidiro ny sarinao" required> -->

                </div>
            </div>
            <div class="row">
                <div class="containerss">
                    <span>Tsindrio ny bokotra <i class="fas fa-arrow-turn-down"></i></span>
                    <figure class="image-container">
                        <img id="chosen-imagee">
                        <figcaption id="file-namee">
                        </figcaption>
                    </figure>
                    <input class="inputphoto" type="file" value="<?=isset($_FILES["imgFokontany"])?$_FILES["imgFokontany"]:""?>" name="imgFokontany" id="upload-buttonn" accept="image/*">
                    <label class="labelphoto" for="upload-buttonn">
                        <i class="fas fa-upload"></i> &nbsp;Ampidiro ny sarinao
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Pasipaoro Laharana Faha : </label>
                    <input type="number" value="<?=isset($_POST["passportnum"])?$_POST["passportnum"]:""?>" name="passportnum" class="form-control"
                        placeholder="Laharana Pasipaoro raha misy">
                </div>
                <div class="col">
                    <label for="" class="form-label">Natao tao : </label>
                    <input type="text" value="<?=isset($_POST["passportlieux"])?$_POST["passportlieux"]:""?>" name="passportlieux" class="form-control"
                        placeholder="Toerana nanaovana pasipaoro">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Faharetany : </label>
                    <input type="text" value="<?=isset($_POST["passportdelai"])?$_POST["passportdelai"]:""?>" name="passportdelai" class="form-control" placeholder="Faharetany Pasipaoro">
                </div>
                <div class="col">
                    <label for="" class="form-label">Adiresy : </label>
                    <input type="text" value="<?= $_SESSION["adiresyUser"]?>" name="adresse" class="form-control"
                        placeholder="Lot ny trano" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Asa atao : </label>
                    <input type="text" value="<?=isset($_POST["travail"])?$_POST["travail"]:""?>" name="travail" class="form-control" placeholder="Asa ataonao" required>
                </div>
                <div class="col">
                    <label for="" class="form-label">Toerana misy anao antokatrano : </label>
                    <select class="form-select inputselect" value="<?=isset($_POST["toerna"])?$_POST["toerana"]:""?>" name="toerana" required>
                    <option><?=isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana"?></option>
                    <option><?=((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana" && (isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")!="Vady")?"Vady":"Loham-pianakaviana"?></option>
                    <option><?=((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana"?"Vady":"Loham-pianakaviana")=="Vady"?"Zanaka":"Vady"?></option>
                    <option><?=(((isset($_POST["toerana"])?$_POST["toerana"]:"Loham-pianakaviana")=="Loham-pianakaviana"?"Vady":"Loham-pianakaviana")=="Vady"?"Zanaka":"Vady")=="Zanaka"?"Miaramonina":"Zanaka"?></option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <div class="form-check">
                    <input class="radiompTomp" type="radio" class="form-check-input" id="radio1" name="optradio"
                    value="<?=isset($_POST["optradio"])?$_POST["optradio"]:"Tompon-trano"?>" checked>
                    <label class="form-check-label" for="radio1"><?=isset($_POST["optradio"])?$_POST["optradio"]:"Tompon-trano"?></label>
                </div>
                <div class="form-check">
                    <input class="radiompTomp" type="radio" class="form-check-input" id="radio2" name="optradio"
                    value="<?=((isset($_POST["optradio"])?$_POST["optradio"]:"Tompon-trano"))=="Tompon-trano"?"Mpanofa":"Tompon-trano"?>">
                    <label class="form-check-label" for="radio2"><?=(isset($_POST["optradio"])?$_POST["optradio"]:"Tompon-trano")=="Tompon-trano"?"Mpanofa":"Tompon-trano"?></label>
                </div>
                </div>
                <div class="col">
                    <label for="" class="form-label">sexe : </label>
                    <span>H : Lahy, F : Vavy</span>
                <select class="form-select inputselect" name="sexe" required>
                    <option value="<?=isset($_POST["sexe"])?$_POST["sexe"]:"Lahy"?>"><?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"H":"F"?></option>
                    <option value="<?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"Vavy":"Lahy"?>"><?=(isset($_POST["sexe"])?$_POST["sexe"]:"Lahy")=="Lahy"?"F":"H"?></option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Teny miafina(mot de passe) :</label>
                    <input type="password" value="<?=isset($_POST["pwd"])?$_POST["pwd"]:""?>" name="pwd" class="form-control" placeholder="Ampidiro ny teny miafina"
                        required>
                </div>
                <div class="col">
                    <label for="" class="form-label">hamarino ny teny miafina(mot de passe) :</label>
                    <input type="password" value="<?=isset($_POST["pwdconfi"])?$_POST["pwdconfi"]:""?>" name="pwdConfi" class="form-control" placeholder="Ampidiro ny teny miafina"
                        required>
                </div>
            </div>
            <i class="fas fa-arrow-left retour-membre"></i>
            <button type="submit" name="btnentrer" class="btn btn-success btninscr"><i class="fas fa-ad me-2"></i>Alefa</button>
        </form>
        <form class="forminscri responsinscri form-mdp bg-white" method="post">
            <i class="fas fa-times retour-form-mdp" style="cursor:pointer;"></i>
            <h2 class="btninscr">Hanova teny miafina</h2>
            <!-- <div class="row">
                <div class="col">
                    <label for="" class="form-label">id olonaandoavana vola :</label>
                    <input type="number" id="idolonaandoavana" name="iduserspayment" class="form-control" readonly>
                </div>
                <div class="col">
                    <label for="" class="form-label">id mpandoa vola :</label>
                    <input type="number" id="idmpandoa" name="lieuxnaissance" class="form-control" readonly>
                </div>
            </div> -->
            <div class="row">
                <div class="col">
                    <label for="" class="form-label btninscr">Safidio izay anaranao :</label>
                    <select class="form-select inputselect" name="idusersmdp" required>
                        <?php foreach($ankohonana as $ankohonanass) { ?>    
                           <option value="<?=$ankohonanass["idusers"]?>"><?=$ankohonanass["NomtUsers"]?> <?=$ankohonanass["PrenomtUsers"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                   <div class="col">
                       <label for="" class="form-label">Teny miafina teo aloha :</label>
                       <input type="number" placeholder="Ampiro ny teny miafina teo aloha" value="" name="mdpancien" class="form-control" required>
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Teny miafina vaovao :</label>
                    <input type="number" placeholder="Ampidiro ny teny miafina vaovao" name="mdpnouveau" class="form-control" required>
                </div>
                <div class="col">
                    <label for="" class="form-label">Fanamafisana teny miafina vaovao :</label>
                    <input type="number" placeholder="Ampidiro ny teny miafina vaovao" name="mdpnouveauconfi" class="form-control" required>
                </div>
            </div>

            <!-- <i class="fas fa-arrow-left retour-membre"></i> -->
            <button type="submit" class="btn btn-success btninscr" name="btnmdp"><i class="far fa-check-circle me-2"></i>Alefa</button>
        </form>
    </div>
    <?php if (count($publication) != 0) { ?>
    <div class="publication align-items-center text-secondary mb-0 w-100 titre"
        style="text-align:center;padding:10% 0;">
        <div class="sectionpub d-flex justify-content-center" style="flex-wrap:wrap;">
            <?php foreach($publication as $publications) { ?>
            <div class="sectionpub1 bg-success"
                style="margin:20px 5rem;display: flex;flex-direction: column;align-items: center;justify-content: center;flex-wrap:wrap;padding:1% 1%;border-right:.2rem solid green;border-bottom:.2rem solid green;border-radius:10rem 0 0 0;">
                <h1 class="publication-titre text-white" style="border-bottom: .1rem solid white;">Filazana</h1>
                <p class="paragraphe-publication text-dark"><?=$publications["publication"]?></p>
                <div class="date-publication"><i class="fas fa-calendar"></i>
                    <span class="text-dark"><?=$publications["datepublication"]?></span>
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- <div class="next-prev next-prev1">
                <p><a href="membre.php" ><i class="fas fa-chevron-left"></i></a>
                    <span class="text-black">6 / 2000 </span>
                    <a href="membre.php"><i class="fas fa-chevron-right"></i></a>
                </p>
            </div> -->
    </div>
    <?php } ?>
</section>
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
    tdDdnAg[i].textContent = sumDate + " taona";
}

let uploadButtonn = document.querySelector("#upload-buttonn");
let chosenImagee = document.querySelector("#chosen-imagee");
let fileNamee = document.querySelector("#file-namee");

uploadButtonn.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButtonn.files[0]);
    console.log(uploadButtonn.files[0]);
    reader.onload = () => {
        chosenImagee.setAttribute('src', reader.result);
    }
    fileNamee.textContent = uploadButtonn.files[0].name;
}

</script>
<!-- paypal -->
<!-- <script src=""></script>
<script>
    
</script> -->
<?php
   include_once 'ressourse/layouts/page/footer.php';
?>