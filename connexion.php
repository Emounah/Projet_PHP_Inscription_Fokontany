<?php
   $connexionnav = true;
   include_once 'ressourse/layouts/page/header.php';
   if (isset($_POST["connect"])) {
    $error =  connectionUsers();
   }
  
?>
  <section class="sec2-safidy sec2-inscri">
    <div class="titre">
      <h1>FIDIRANA AO AMIN'NY FOKONTANY</h1>
      <span>Rehefa misoratra amin'ny fokontany ny mombamomba anao dia aza misalasala mameno ny takela mba hahafahanao manakaiky ny fokontany misy anao</span>
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
          <label for="" class="form-label">Laharana Karapanondronao(CIN) :</label>
          <input type="number" name="cinuser" class="form-control" placeholder="Ampidiro laharana Karapanondro" required>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="" class="form-label">Teny miafina(Mot de passe)</label>
          <input type="password" name="mdpuser" class="form-control" placeholder="Ampidiro Teny miafina tsy diso" required>
        </div>
      </div>
      <button type="submit" name="connect" class="btn btn-success"><i class="far fa-user-circle me-2"></i>Alefa</button>
    </form>
  </section>
<?php
   include_once 'ressourse/layouts/page/footer.php';
?>