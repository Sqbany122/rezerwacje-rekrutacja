<?php 
    require_once("_partials/head.php"); 
    if (!isset($_SESSION['user_id'])) {
        header('Location: /rezerwacja/includes/login.php');
    }
    require_once("../classes/ReservationsClass.php");
?> 
<div class="main w-100 h-100">
    <?php require_once("_partials/navbar.php"); ?>
    <div class="container d-flex p-3" style="margin-top: 100px;">
        <div class="w-50">
            <form method="post">
                <h4 class="mt-2">Wybierz datę i godziny rezerwacji:</h4>
                <p>Pamiętaj, że salę można zarezerwować jedynie od godziny 8 do godziny 16.</p>
                <div class="my-4">
                    <label for="date_start">Data początku rezerwacji</label>
                    <input class="p-2" id="date_start" type="datetime-local" name="start_date" />
                    <label for="date_end">Data końca rezerwacji</label>
                    <input class="p-2 mt-4" id="date_end" type="datetime-local" name="end_date" />
                    <input class="w-50 mt-4 d-block" type="submit" name="zarezerwuj" value="Zarezerwuj" />
                </div>
            </form>
        </div>
        <div class="w-50">
            <div class="month">      
            <ul>
                <li>Sierpień 2021</li>
            </ul>
            </div>

            <ul class="weekdays">
            <li>Pn</li>
            <li>Wt</li>
            <li>Śr</li>
            <li>Czw</li>
            <li>Pt</li>
            <li>Sob</li>
            <li>Nd</li>
            </ul>

            <ul class="days">  
                <?php 
                    for ($x = 1; $x <= 31; $x++) {
                        if ($x < 10) {
                            $day = "0".$x;
                        } else {
                            $day = $x;
                        }
                        echo "<li class='singleDay' data-time='2021-08-".$day."'>".$x."</li>";
                    }
                ?>
            </ul>
            <div class="mt-4">
                <table id="reservedDates" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                    <th scope="col">Lp.</th>
                    <th scope="col">Od</th>
                    <th scope="col">Do</th>
                    <th scope="col">Użytkownik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" colspan="4">Wybierz date aby sprawdzić zarezerwowane terminy!</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 

if (isset($_POST['zarezerwuj'])) {
    $reservations = new Reservations($db);
    $reservations->setReservation($_POST['start_date'], $_POST['end_date'], $_SESSION['user_id']);
}

require_once("_partials/footer.php"); ?>