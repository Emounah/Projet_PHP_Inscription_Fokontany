<?php
          $index=true;
         include '../../ressourse/layoutFokontany/header.php';
         if (isset($_SESSION["cin"])) {
          if ($_SESSION["statut"]!="Filoham-pokontany") {
             header("location:../index.php");
          }
         }
         $userAkohonana = affichageAnkohonana('idfokontany',intval($_SESSION["idFokontanys"]));
         $effectifH = effectifHomme('idfokontany',intval($_SESSION["idFokontanys"]));
         $effectifF = effectifFemme('idfokontany',intval($_SESSION["idFokontanys"]));

      ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">ANTOTANISA</h3>
                        <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
                    </div>
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
                                    <h6 class="font-weight-normal">Madagasikara</h6>
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
                                <p class="mb-4">Isan'olona amin'ny fokontany</p>
                                <p class="fs-30 mb-2"><?=count($userAkohonana)?></p>
                                <!-- <p>10.00% (30 days)</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Isan'ny lahy</p>
                                <p class="fs-30 mb-2"><?=count($effectifH)?></p>
                                <!-- <p>22.00% (30 days)</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Isan'ny vavy</p>
                                <p class="fs-30 mb-2"><?=count($effectifF)?></p>
                                <!-- <p>2.00% (30 days)</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <?php foreach($userAkohonana as $userAkohonanas) { ?>
                                <input type="hidden" value="<?=$userAkohonanas["DdntUsers"]?>" name="" id="inputAge">
                                <p class="tdDdnAge" style="display:none;"></p>
                                <?php }?>
                                <p class="mb-4">Isan'ny olona 18 taona mihotra</p>
                                <p class="fs-30 mb-2 nbH"></p>
                                <!-- <p>0.22% (30 days)</p> -->
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-6 mt-4 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Isan'ny olona latsakin'ny 18 taona</p>
                                <p class="fs-30 mb-2 nbinf"></p>
                                <!-- <p>2.00% (30 days)</p> -->
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
    document.querySelector('.nbinf').textContent = sommeH17;
    </script>
    <?php
    include '../../ressourse/layoutFokontany/footer.php';
?>