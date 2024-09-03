
<?php
        session_start();
        require_once 'template/controller/database.php';
        require_once 'template/controller/fonction_du_site.php';
        $db = bdd();
        if (isset($_POST["connect"])) {
            $error = connection();
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
<body>
  <section class="sec2-safidy sec2-inscri">
    <div class="titre">
      <h1>SUPER ADMIN</h1>
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
          <label for="" class="form-label">Pseudo :</label>
          <input type="text" name="pseudocin" class="form-control" placeholder="Entrer votre numero cin" required>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="" class="form-label">Mot de passe</label>
          <input type="password" name="mdp" class="form-control" placeholder="Entrer votre mot de passe" required>
        </div>
      </div>
      <button type="submit" name="connect" class="btn btn-success">Valider</button>
    </form>
  </section>
<?php
   include_once '../ressourse/layouts/page/footer.php';
?>