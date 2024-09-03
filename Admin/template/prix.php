<?php
    include_once 'controller/database.php';
    include_once 'controller/fonction_du_site.php';
    $db = bdd();
    // if(isset($_GET['idfokontany'])){
    //   $id=$_GET['idfokontany'];
    //   deleteentity("fokontany",$id,"idfokontany");
    //   $image = $_GET["image"];
    //   unlink("../../Public/img/image_fokonatny/".$image);
    //   header("Location:listefokontany.php");
    // }
    $payment = get("payment");
    $prixnav = true;
    include_once '../../ressourse/layoutsAdmin/header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Prix à payer</h4>
                        <!-- <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p> -->
                        <div class="table-responsive pt-3">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Frais d'inscription
                                        </th>
                                        <th>
                                            Participation par an
                                        </th>
                                        <th>
                                            Penalté
                                        </th>
                                      
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($payment as $payments) { ?>
                                    <tr class="trfokontany">
                                        <td>
                                            <?=$payments["idpayment"]?> 
                                        </td>
                                        <td>
                                            <?=$payments["saranyf"]?> Ariary
                                        </td>
                                        <td>
                                            <?=$payments["adidy"]?> Ariary
                                        </td>
                                        <td>
                                            <?=$payments["sazy"]?> Ariary
                                        </td>
                                        <td>
                                            <a
                                                href="modification_prix.php?idpayment=<?=$payments["idpayment"]?>"><button
                                                    class="btn btn-success btn-icon"><i
                                                        class="ti-pencil"></i></button></a>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php
    include_once '../../ressourse/layoutsAdmin/footer.php';
?>