<?php 
    require_once("_partials/head.php");
    require_once("../classes/RegisterClass.php");
?>

    <div class="main w-100 h-100">
        <div class="container h-100">
            <div class="row align-items-center h-100 w-50 m-auto">
                <div class="col">
                    <form class="d-flex flex-column justify-content-center align-items-center" method="post">
                        <h1>Rejestracja</h1>
                        <input type="text" class="w-50 p-2" name="email" placeholder="Email" />
                        <input type="password" class="w-50 mt-2 p-2" name="password" placeholder="Hasło" />
                        <input type="password" class="w-50 mt-2 p-2" name="repeat_password" placeholder="Powtórz hasło" />
                        <select class="w-50 p-2 mt-2" name="role">
                            <option disabled selected value>Wybierz typ konta</option>
                            <option value="1">Administrator</option>
                            <option value="2">Użytkownik</option>
                        </select>
                        <div class="d-flex w-50 my-2">
                        <input class="btn w-50 border border-dark" type="submit" name="submitLoginForm" value="Zarejestruj" />
                            <a href="/rezerwacja/includes/login.php" class="btn w-50 border border-dark">Zaloguj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php 

if (isset($_POST['submitLoginForm'])) {
    $register = new Register($db, $_POST["email"], $_POST["password"], $_POST["repeat_password"], $_POST["role"]);
}
require_once("_partials/footer.php"); 
?>