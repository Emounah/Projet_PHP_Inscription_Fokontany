<?php
      $searchtabdiscom = true;
      include_once 'controller/database.php';
      include_once 'controller/fonction_du_site.php';
      $db = bdd();
      $user = affichageUsers();
      $populationnav = true;
      include_once '../../ressourse/layoutsAdmin/header.php';

?>
<!-- partial -->
<div class="main-panel" id="tablesektera">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listes des populations</h4>
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
                                            Photo
                                        </th>
                                        <th>
                                            Nom
                                        </th>
                                        <th>
                                            Prénom
                                        </th>
                                        <th>
                                            Age
                                        </th>
                                        <th>
                                            CIN
                                        </th>
                                        <th>
                                            Fokotany
                                        </th>
                                        <th>
                                            Commune
                                        </th>
                                        <th>
                                            District
                                        </th>
                                        <th>
                                            Region
                                        </th>
                                        <th>
                                            Details
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach($user as $users) { ?>
                                    <tr class="trusers">
                                        <td><?=$users["idusers"]?></td>
                                        <td>
                                            <img src="../../Public/img/image_users/<?=$users["sary"]?>" width="40"
                                                height="40" alt="">
                                        </td>
                                        <td><?=$users["nom"]?></td>
                                        <td><?=$users["prenom"]?></td>
                                        <td class="tdDdnAge"></td>
                                        <td><?=$users["cin"]?></td>
                                        <td><?=$users["nomFokontanys"]?></td>
                                        <td><?=$users["nomKaomininas"]?></td>
                                        <td><?=$users["nomDistrikas"]?></td>
                                        <td><?=$users["nomFaritras"]?></td>
                                        <td>
                                        <a href="detailuser.php?idusers=<?=$users["idusers"]?>"><button
                                                class="btn btn-primary btn-icon"><i
                                                    class="fab fa-readme"></i></button></a>
                                        </td>
                                    </tr>
                                    <input type="hidden" value="<?=$users["ddn"]?>" name="" id="inputAge">
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

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
                        tdDdnAg[i].textContent = sumDate + " Taona";
                    }
                    </script>
                    <script>
                    let Actbtn = document.querySelectorAll('.Actbtnfkt')
                    for (let i = 0; i < Actbtn.length; i++) {
                        setTimeout('load_table()');

                        function load_table() {
                            Actbtn[i].addEventListener('click', () => {
                                $('#tablesektera').load('../controller/fonction_du_site.php');
                            })
                        }
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- content-wrapper ends -->
<script src="../../js/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#tadiavina").on("keyup", function() {
        let value = $(this).val().toUpperCase();
        $(".trusers").each(function() {
            $(this).toggle($(this).text().toUpperCase().indexOf(value) >= 0);
        });
    });
});
</script>
<?php
    include_once '../../ressourse/layoutFokontany/footer.php';
?>