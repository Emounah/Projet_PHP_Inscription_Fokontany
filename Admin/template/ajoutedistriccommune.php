<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    $commune = sqlCommuneRegion();
    $district = get("boriborintany");
    if (isset($_POST["btncommunedistric"])) {
        $errordistcom = insertionCommuneDistric();
    }
    $districcommunenav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaires des District et Commune</h4>
                        <?php if (isset($errordistcom)) { ?>
                        <?php  foreach($errordistcom as $errordistcoms): ?>
                        <p class="card-description">
                            <?=$errordistcoms?>
                        </p>
                        <?php
                         endforeach;
                   }?>
                        <form class="forms-sample" method="post">
                            <!-- <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Photo</button>
                          </span>
                        </div>
                      </div> -->
                            <div class="form-group">
                                <label for="">Région : </label>
                                <input type="text" name="nameregion" class="form-control" id="regioncomm" placeholder="Région" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Commune : </label>
                                <input type="hidden" class="form-control" name="idcommunedist" id="idcommune"
                                    placeholder="Id Commune" readonly>
                            </div>
                            <div class="select-box1">
                                <div class="select-option1">
                                    <input type="text" placeholder="Selectionner Commune" id="soValue1" readonly>
                                </div>
                                <div class="content1">
                                    <div class="search1">
                                        <input type="search" name="" id="optionSearch1" placeholder="Search">
                                    </div>
                                    <ul class="options1">
                                        <?php foreach ($commune as $communes) { ?>
                                        <li id="<?=$communes["idkaominina"]?>" class="<?=$communes["region"]?>"><?=$communes["nomkaominina"]?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="communearrondissement">District : </label>
                                <input type="hidden" name="iddiscommune" class="form-control" id="iddistric" placeholder="Id District" readonly>
                            </div>
                            <div class="form-group select-box">
                                <div class="select-option">
                                    <input type="text" name="namedistric" placeholder="Selectionner District" id="soValue" readonly>
                                </div>
                                <div class="content">
                                    <div class="search">
                                        <input type="search" name="" id="optionSearch" placeholder="Search">
                                    </div>
                                    <ul class="options">
                                        <?php foreach ($district as $districts) { ?>
                                        <li class="<?=$districts["idboribory"]?>"><?=$districts["distrika"]?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                            <button type="submit" name="btncommunedistric" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>