<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    $Fokontany = affichageFokontany();
    // if(isset($_GET['idfokontany'])){
    //   $id=$_GET['idfokontany'];
    //   deleteentity("fokontany",$id,"idfokontany");
    //   header("Location:listefokontany.php");
    // }
   $fisoratananav = true;
   include_once 'ressourse/layouts/page/header.php';
?>
    <section class="sec2-safidy">
        <div class="titre">
            <h1>Safidio izay <span>FOKONTANY</span> misy anao</h1>
            <span>Fantaro tsara ny <span class="colore">Faritra</span>, <span class="colore">Kaominina</span>, <span class="colore">Boriborintany</span> ary ny <span class="colore">Fokontany</span> izay misy anao mba tsy ho diso </span>
        </div>
        <form class="recherche" action="" method="post">
            <input type="search" name="" id="tadiavina" placeholder="Fitadiavana">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
        <div class="sec2-block">
            <div class="containers">
                <?php foreach($Fokontany as $Fokontanys) { ?>
                <div class="cards searchrap">
                    <div class="face face1">
                        <div class="content">
                            <img src="Public/img/image_fokonatny/<?=$Fokontanys["saryfokontany"]?>">
                            <h3><?=$Fokontanys["nomfokontany"]?></h3>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <p><span>Faritra : <?=$Fokontanys["nomregion"]?> <br></span>
                                <span>Distrika : <?=$Fokontanys["nomdistrict"]?> <br></span>
                                <span>Kaominina : <?=$Fokontanys["nomcommune"]?> </span>
                            </p>
                                <a href="inscription.php?idfokontany=<?=$Fokontanys["idfokontany"]?>">Hisoratr'anarana</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </section>
    <script src="js/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
                $("#tadiavina").on("keyup", function() {
                    let value = $(this).val().toUpperCase();
                    $(".searchrap").each(function() {
                        $(this).toggle($(this).text().toUpperCase().indexOf(value) >= 0);
                    });
                });
            });
    </script>

<?php
   include_once 'ressourse/layouts/page/footer.php';
?>