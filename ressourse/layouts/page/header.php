<?php
        session_start();
        require_once 'controller/database.php';
        require_once 'controller/fonction_du_site.php';
        $db = bdd();
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sass/bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../sass/bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sass/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../sass/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="sass/owl.carousel.min.css">
    <link rel="stylesheet" href="../sass/owl.carousel.min.css">
    <link rel="stylesheet" href="Public/aos/css/aos.css">
    <link rel="stylesheet" href="sass/style.css">
    <link rel="stylesheet" href="../sass/style.css">
    <!-- <link rel="stylesheet" href="Admin/template/css/monstyle.css"> -->
    <title>FOKONTANY</title>
</head>
<body class="bg-dark">
    <nav class="cc-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
        <div class="container-fluid">
         <a class="navbar-brand text-uppercase fw-bolder logo mx-4 py-3" href="#">FOKONTANY</a>
         <button class="navbar-toggler"
         type="button"
         data-bs-toggle="collapse"
         data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupporttedContent"
         aria-expanded="false"
         aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
               <li class="nav-item pe-4">
                   <a class="nav-link <?=isset($indexnav)?"active":""?>" aria-current="page" href="index.php">Tongasoa</a>
               </li>
               <?php if (isset($_SESSION["cinUser"])) { ?>
                <?php if ($_SESSION["statutUser"] == "Mponina") { ?>
                    <li class="nav-item pe-4">
                    <a class="nav-link <?=isset($membrenav)?"active":""?>" href="membre.php">Mpikambana</a>
                    </li>
                    <li class="nav-item pe-4">
                    <a class="nav-link" href="deconnexion.php">Hiala</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item pe-4">
                    <a class="nav-link <?=isset($membreAdminnav)?"active":""?>" href="membreAdmin.php">Filoham-pokontany</a>
                    </li>
                    <li class="nav-item pe-4">
                    <a class="nav-link" href="deconnexion.php">Hiala</a>
                    </li>
              <?php }} else { ?>
               <li class="nav-item pe-4">
                   <a class="nav-link <?=isset($connexionnav)?"active":""?>" href="connexion.php">Fifandraisana</a>
               </li>
           <li class="nav-item pe-4">
               <a class="btn btn-order <?=isset($fisoratananav)?"actives":""?> rounded-0" href="safidy.php" >Fisoratan'anarana</a>
           </li>
           <?php } ?>
            </ul>
         </div>
        </div>
    </nav>