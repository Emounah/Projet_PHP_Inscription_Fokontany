
      <?php
       $index=true;
       include_once '../../ressourse/layoutsAdmin/header.php';
          include_once 'controller/database.php';
          include_once 'controller/fonction_du_site.php';
          $db = bdd();
          $nbRegion = getRegionCount();
          $nbDistric = getDistricCount();
          $nbCommune = getCommuneCount();
          $nbFokontany = affichageFokontany();
          $nbuser = effectifMponina();
          $nbuserL = effectifMponinaL();
          $nbuserF = effectifMponinaV();
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Deshboard</h3>
                  <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
              
                <!-- <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Antananarivo</h4>
                        <h6 class="font-weight-normal">MADAGASCAR</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Nombre de Région</p>
                      <p class="fs-30 mb-2"><?=$nbRegion?></p>
                      <!-- <p>10.00% (30 days)</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Nombre de District</p>
                      <p class="fs-30 mb-2"><?=$nbDistric?></p>
                      <!-- <p>22.00% (30 days)</p> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Nombre de Commune</p>
                      <p class="fs-30 mb-2"><?=$nbCommune?></p>
                      <!-- <p>2.00% (30 days)</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Nombre de Fokontany</p>
                      <p class="fs-30 mb-2"><?=count($nbFokontany)?></p>
                      <!-- <p>0.22% (30 days)</p> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="row  mt-4">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Nombre de population dans Fokontany</p>
                      <p class="fs-30 mb-2"><?=count($nbuser)?></p>
                      <!-- <p>2.00% (30 days)</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Nombre des Hommes</p>
                      <p class="fs-30 mb-2"><?=count($nbuserL)?></p>
                      <!-- <p>0.22% (30 days)</p> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="row  mt-4">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Nombre des Femmes</p>
                      <p class="fs-30 mb-2"><?=count($nbuserF)?></p>
                      <!-- <p>2.00% (30 days)</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <?php foreach($nbuser as $nbusers) {?>
                    <input type="hidden" value="<?=$nbusers["ddn"]?>" name="" id="inputAge">
                    <p class="tdDdnAge" style="display:none;"></p>
                    <?php } ?>
                      <p class="mb-4">Nombre de population +18 ans</p>
                      <p class="fs-30 mb-2 nbH"></p>
                      <!-- <p>0.22% (30 days)</p> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="row  mt-4">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                    <?php foreach($nbuserL as $nbuserLs) {?>
                    <input type="hidden" value="<?=$nbusers["ddn"]?>" name="" id="inputAgeL">
                    <p class="tdDdnAgeL" style="display:none;"></p>
                    <?php } ?>
                      <p class="mb-4">Nombre des Hommes +18 ans</p>
                      <p class="fs-30 mb-2 nbH18"></p>
                      <!-- <p>2.00% (30 days)</p> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                    <p class="tdDdnAge" style="display:none;"></p>
                    <?php foreach($nbuserF as $nbuserFs) {?>
                    <input type="hidden" value="<?=$nbuserFs["ddn"]?>" name="" id="inputAgeF">
                    <p class="tdDdnAgeF" style="display:none;"></p>
                    <?php } ?>
                      <p class="mb-4">Nombre des Femmes +18 ans</p>
                      <p class="fs-30 mb-2 nbF18"></p>
                      <!-- <p>0.22% (30 days)</p> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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
    let somme18 = 0;
    let sommeH17 = 0;
    for (let j = 0; j < tdDdnAg .length; j++) {
      if (parseInt(tdDdnAg[j].textContent) >= 18) {
        somme18 ++;
      }else{
         sommeH17 ++;
      }
    }
    document.querySelector('.nbH').textContent = somme18;
    // document.querySelector('.nbinf').textContent = sommeH17;
    let dmjL, yearL, mL, dayL, newDateL, sumDateL;
    newDateL = (new Date().getFullYear());
    newML = (new Date().getMonth() + 1);
    newDayL = (new Date().getDate());
    let inputAgesL = document.querySelectorAll('#inputAgeL');
    let tdDdnAgL = document.querySelectorAll('.tdDdnAgeL');
    for (let ih = 0; ih < inputAgesL.length; ih++) {
        dmjL = inputAgesL[ih].value.split("-");
        yearL = +dmjL[0];
        mL = +dmjL[1];
        dayL = +dmjL[2];
        if ((mL <= newML && dayL <= newDayL) || (mL < newML && dayL > newDayL)) {
            sumDateL = newDateL - yearL;
        } else {
            sumDateL = newDateL - yearL;
            if (sumDateL === 0) {
                sumDateL = newDateL - yearL;
            } else {
                sumDateL = newDateL - yearL - 1;
            }
        }
        tdDdnAgL[ih].textContent = sumDateL;
    }
    let somme18L = 0;
    let sommeH17L = 0;
    for (let jh = 0; jh < tdDdnAgL.length; jh++) {
      if (parseInt(tdDdnAgL[jh].textContent) >= 18) {
        somme18L ++;
      }else{
         sommeH17L ++;
      }
    }
    document.querySelector('.nbH18').textContent = somme18L;

    // document.querySelector('.nbinf').textContent = sommeH17;
    let dmjF, yearF, mF, dayF, newDateF, sumDateF;
    newDateF = (new Date().getFullYear());
    newMF = (new Date().getMonth() + 1);
    newDayF = (new Date().getDate());
    let inputAgesF = document.querySelectorAll('#inputAgeF');
    let tdDdnAgF = document.querySelectorAll('.tdDdnAgeF');
    for (let iff = 0; iff < inputAgesF.length; iff++) {
        dmjF = inputAgesL[iff].value.split("-");
        yearF = +dmjF[0];
        mF = +dmjF[1];
        dayF = +dmjF[2];
        if ((mF <= newMF && dayF <= newDayF) || (mF < newMF && dayF > newDayF)) {
            sumDateF = newDateF - yearF;
        } else {
            sumDateF = newDateF - yearF;
            if (sumDateF === 0) {
                sumDateF = newDateF - yearF;
            } else {
                sumDateF = newDateF - yearF - 1;
            }
        }
        tdDdnAgF[iff].textContent = sumDateF;
    }
    let somme18F = 0;
    let sommeH17F = 0;
    for (let jf = 0; jf < tdDdnAgF.length; jf++) {
      if (parseInt(tdDdnAgF[jf].textContent) >= 18) {
        somme18F ++;
      }else{
         sommeH17F ++;
      }
    }
    document.querySelector('.nbF18').textContent = somme18F;
    </script>
<?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>
       
 
