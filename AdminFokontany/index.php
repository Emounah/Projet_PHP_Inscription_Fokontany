<?php
              session_start();
              require_once 'controller/database.php';
              require_once 'controller/fonction_du_site.php';
              $db = bdd();
              if (isset($_POST["btnconnect"])) {
                  $error = connectionPresidentFkt();
              }
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
    <link rel="stylesheet" href="sass/style.css">
    <link rel="stylesheet" href="../sass/style.css">
    <title>FOKONTANY</title>
</head>
<body class="bg-dark">
<section class="sec2-safidy sec2-inscri">
    <div class="titre">
      <h4 class="text-white mt-4 mb-0">ADMIN FOKONTANY</h4>
    </div>
    <form class="forminscri bg-white mt-4" method="post">
    <?php
           if (isset($error)) {
            foreach($error as $diso):
            ?>
            <p class="text-danger text-center"><?=$diso?></p>
            <?php
            endforeach;
        
           }?>
      <div class="row">
        <div class="col">
          <label for="" class="form-label">Laharana Karapanondronao :</label>
          <input type="number" name="cinfokontany" class="form-control" placeholder="Ampidiro laharana Karapanondro" required>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="" class="form-label">Teny miafina(Mot de passe)</label>
          <input type="password" name="mdpfokontany" class="form-control" placeholder="Ampidiro Teny miafina tsy diso" required>
        </div>
      </div>
      <button type="submit" name="btnconnect" class="btn btn-success">Alefa</button>
    </form>
  </section>
<?php
   include '../ressourse/layouts/page/footer.php';
?>