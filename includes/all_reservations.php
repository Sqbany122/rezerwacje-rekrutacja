<?php 
    require_once("_partials/head.php"); 
    require_once("../classes/ReservationsClass.php");
    $reservations = new Reservations($db);
?> 
<div class="main w-100 h-100">
    <?php require_once("_partials/navbar.php"); ?>
    <div class="container d-flex p-3" style="margin-top: 100px;">
        <div class="w-100">
            <table id="reservedDates" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                    <th scope="col">Lp.</th>
                    <th scope="col">Od</th>
                    <th scope="col">Do</th>
                    <th scope="col">Użytkownik</th>
                    <th scope="col">Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $reservations->getAllReservations();
                    ?>
                </tbody>
            </table>   
        </div> 
    </div>
</div>
<?php require_once("_partials/footer.php"); ?>