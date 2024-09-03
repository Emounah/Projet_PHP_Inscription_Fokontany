<?php
$membreAdminnav = true;
   include_once 'ressourse/layouts/page/header.php';
   if (!isset($_SESSION["nomUser"])) {
    header("Location:connexion.php");
   }
   if (isset($_POST["btnAdmincom"])) {
      $errorFilazana = insertionFilazana();
   }
   $LIMIT = 1;
   $page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;

$filazana = affichageFilazana($page,"idfokontany",intval($_SESSION["idFokontanysUser"]))["filazana"];

$filazanaCount = affichageFilazana($page,"idfokontany",intval($_SESSION["idFokontanysUser"]))["count"];

$filazanaCountTotal = getFilazana("idfokontany",intval($_SESSION["idFokontanysUser"]));
$pagetotal=ceil($filazanaCountTotal/$LIMIT);

// $president = sqlPresidentFkt("idusers",intval($_SESSION["idusersUser"]));
?>
<section class="sec2-safidy sec2-membre">
    <div class="titre">
        <img src="Public/img/image_presidentFkt/<?=$_SESSION["saryUser"]?>" alt="" srcset="">
        <h1><?=$_SESSION["nomUser"]?> <?=$_SESSION["prenomUser"]?></h1>
        <h1>Tongasoa eto amin'ny <span>FOKONTANY</span><?=$_SESSION["nomFokontanysUser"]?></h1>
        <span>Faritra : <span class="colore"><?=$_SESSION["nomFaritrasUser"]?></span>, Kaominina : <span class="colore"><?=$_SESSION["nomKaomininasUser"]?></span>,
            Distrika : <span class="colore"><?=$_SESSION["nomDistrikasUser"]?></span></span>
    </div>
    <div class="publication bg-dark align-items-center text-secondary mb-0 w-100 titre" style="text-align:center;">
    <?php foreach($filazana as $filazanas) { ?>
        <h1 class="publication-titre">Filazana</h1>
        <p class="paragraphe-publication" style="width:60%!important;margin:0 auto;"><?=$filazanas["publication"]?></p>
        <div class="date-publication"><i class="fas fa-calendar"></i> <span><?=$filazanas["datepublication"]?></span></div>
        <?php } ?>
        <div class="next-prev next-prev1">
            <p><a href="membreAdmin.php?page=<?= $page - 1 ?>" class="" style = "<?=($page==1) ? "visibility:hidden":"visibility:visible" ?>"><i class="fas fa-chevron-left"></i></a>
                <span class="text-black"><?=$page?> / <?=$filazanaCountTotal?></span>
                <a href="membreAdmin.php?page=<?= $page + 1 ?>" class="" style = "<?=($page==$pagetotal) ? "visibility:hidden":"visibility:visible" ?>"><i class="fas fa-chevron-right"></i></a>
            </p>
        </div>
        <form class="mt-4" action="" method="post">
            <?php if (isset($errorFilazana)) { ?>
                <?php foreach($errorFilazana as $errorFilazanas) {?>
                    <h4 class="text-danger"><?=$errorFilazanas?></h4>
            <?php }} ?>
            <input type="hidden" value="<?=$_SESSION["idFokontanysUser"]?>" name="idfokontany"/>
            <textarea name="filazana" id="" cols="30" rows="2" required></textarea>
            <button type="submit" class="btn btn-warning mb-4 mt-2 btnAdmincom" name="btnAdmincom">Alefa</button>
        </form>
    </div>
    <div class="sec2-block">
    <div class="btn-sec2">
            <button class="btn btn-success btnapropos btnkarine">Hijery Mombamombako</button>
    </div>
        <div class="sec2-list alert alert-dark">
        <input type="hidden" value="<?=$_SESSION["ddnUser"]?>" name="" id="inputAge">
            <div class="list-apropos">
                <h4 class="nomp">Andraikitra :</h4>
                <h4 class="nompersonne"><?=$_SESSION["statutUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Laharana finday :</h4>
                <h4 class="nompersonne"><?=$_SESSION["findayUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Anarana :</h4>
                <h4 class="nompersonne"><?=$_SESSION["nomUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Fanampin'anarana :</h4>
                <h4 class="nompersonne"><?=$_SESSION["prenomUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Date naterahana :</h4>
                <h4 class="nompersonne"><?=$_SESSION["ddnUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Taona :</h4>
                <h4 class="nompersonne tdDdnAge"></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Toerana naterahana :</h4>
                <h4 class="nompersonne"><?=$_SESSION["ddnlieuxUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Ray niteraka :</h4>
                <h4 class="nompersonne"><?=$_SESSION["rayniterakaUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Reny niteraka :</h4>
                <h4 class="nompersonne"><?=$_SESSION["renyniterakUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Karapanondro laharana faha :</h4>
                <h4 class="nompersonne"><?=$_SESSION["cinUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Natao ny :</h4>
                <h4 class="nompersonne"><?=$_SESSION["cindateUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Tao :</h4>
                <h4 class="nompersonne"><?=$_SESSION["cinlieuxUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Pasipaoro laharana faha :</h4>
                <h4 class="nompersonne"><?=$_SESSION["pasipaoronumUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">natao tao :</h4>
                <h4 class="nompersonne"><?=$_SESSION["pasipaorolieuxUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Faharetany :</h4>
                <h4 class="nompersonne"><?=$_SESSION["pasipaorodelaiUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Asa atao :</h4>
                <h4 class="nompersonne"><?=$_SESSION["asaataoUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Adiresy :</h4>
                <h4 class="nompersonne"><?=$_SESSION["adiresyUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Sexa :</h4>
                <h4 class="nompersonne"><?=$_SESSION["sexeUser"]?></h4>
            </div>
            <div class="list-apropos">
                <h4 class="nomp">Teny miafina :</h4>
                <h4 class="nompersonne"><?=$_SESSION["mdpUser"]?></h4>
            </div>
        </div>
    </div>
</section>
<script>
    let sec2_list = document.querySelector('.sec2-list');
function boutonFormClient() {
    document.querySelector('.btnkarine').addEventListener('click',()=>{
            sec2_list.classList.toggle('form-liste');
    })
}
boutonFormClient();

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
</script>
<?php
   include_once 'ressourse/layouts/page/footer.php';
?>