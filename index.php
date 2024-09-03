<?php
    // include_once 'controller/database.php';
    // include_once 'controller/fonction_du_site.php';
    // $db = bdd();
    $indexnav=true;
    include_once 'ressourse/layouts/page/header.php';
    $Fokontany = affichageFokontany();
    $presidentFokontany = affichagePresidentFkt();
    $region = region();
    $district = Distric();
    $prix = get("payment");
    // $district = Distric(intval($regions["idfaritra"]));

?>
<section class="banner d-flex justify-content-center align-items-center">
    <div class="container my-5 py-5">
        <div class="row align-items-center">
            <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 colimg sec1-banner" data-aos="fade-up">
                <img src="images/madagascar.png" alt="" srcset="">
            </div>
            <?php foreach($prix as $prixs) { ?>
            <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 paragraphe sec1-banner" data-aos="fade-down">
                <div class="py-3 redressed banner-desc">
                    <div class="carrousel-2">
                        <div class="carrousel-2-child">
                            <div class="carrou-product-1">
                                <h1>Ity tranonkala ity dia fisoratana anarana amin'ny FOKONTANY izay misy anao,</h1>
                            </div>
                            <div class="carrou-product-1">
                                <h1>ny saram-pisoratan'anarana dia <?=$prixs["saranyf"]?> ariary </h1>
                            </div>
                            <div class="carrou-product-1">
                                <h1>ary ny fisoratana anarana izay atao dia mivaly aonatin'ny 24 ora</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="d-flex flex-wrap flex-row-reverse btnp"
                    style="<?=isset($_SESSION["cinUser"])?"display:none!important;":"display:;"?>">
                    <a class="btn-order merriweather" href="safidy.php"><i class="fas fa-plus me-2"></i>Hisoratr'anarana</a>
                    <a class="text-white merriweather" href="connexion.php"><i class="fas fa-plug me-2"></i>Hifandray</a>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="sec2 bg-dark">
    <div class="titre">
        <h1>IREO <span>FOKONTANY</span> MISY ETO MADAGASIKARA</h1>
    </div>

    <div class="containerss">

        <div class="slides">

            <?php foreach($presidentFokontany as  $presidentFokontanys) { ?>
            <div class="items"
                style="background-image: url(Public/img/image_fokonatny/<?=$presidentFokontanys["saryFokontanys"]?>) ;">
                <div class="content">
                    <div class="name"><?=$presidentFokontanys["nomFokontanys"]?></div>
                    <h3 class="presidentFo">Filohampokontany</h3>
                    <img src="Public/img/image_presidentFkt/<?=$presidentFokontanys["sary"]?>" alt="" srcset="">
                    <p class="nompfokonatny"><?=$presidentFokontanys["nom"]?> <?=$presidentFokontanys["prenom"]?></p>
                    <div class="des">
                        <span><?=$presidentFokontanys["nomFaritras"]?></span><br><span><?=$presidentFokontanys["nomDistrikas"]?></span><br><span><?=$presidentFokontanys["nomKaomininas"]?></span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="buttonnextprev">
            <button class="prevsection"><i class="fas fa-arrow-left"></i></button>
            <button class="nextsection"><i class="fas fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="sec2-block block-region">
        <div class="titre" data-aos="zoom-in">
            <h1>IREO DISITRIKA ISAKIN'NY FARITRA MISY ETO MADAGASIKARA</h1>
        </div>
        <div class="sec2-block-region">
            <?php foreach($region as $regions) { ?>
            <div class="footer-col">
                <h1 class="<?=$regions["idfaritra"]?>"><?=$regions["nomfaritra"]?></h1>
                <ul style="background-image: url(Public/img/image_region/<?=$regions["saryregion"]?>);">
                    <?php 
                foreach($district as $districts) { ?>
                    <?php if ($regions["idfaritra"]==$districts["idregion"]) { ?>
                    <li class="districtli"><?=$districts["district"]?></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <script>
            let districtli = document.querySelectorAll(".districtli");
            for (let i = 0; i < districtli.length; i++) {
                for (let j = 0; j < districtli.length; j++) {
                    if (i == j) {} else {
                        if (districtli[i].textContent == districtli[j].textContent) {
                            districtli[j].textContent = "";
                        }
                    }
                }
            }
            for (let ii = 0; ii < districtli.length; ii++) {
                if (districtli[ii].textContent == "") {
                    districtli[ii].style = `display:none;`
                }
            }
            </script>
        </div>
    </div>
</section>
<script>
let dataapi = async () => {

    try {
        let listFokotany = await fetch(`js/madagascar-map-master/liste_fokontany_par_district.json`)
        let data = await listFokotany.json()
        console.log(data);
        // for (let i = 0; i < data.Region.length; i++) {
        //     console.log(data.Region[i]);
        // }
        return data;


    } catch (error) {
        console.log(`olana ${error}`);
    }

}

dataapi();
</script>
<script src="js/carousel3d.js"></script>
<script src="js/sectionp.js"></script>
<?php
   include_once 'ressourse/layouts/page/footer.php';
?>