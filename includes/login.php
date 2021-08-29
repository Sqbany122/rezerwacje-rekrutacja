<?php 
    require_once("_partials/head.php");
    if (isset($_SESSION['user_id'])) {
        header('Location: /rezerwacja/includes/index.php');
    }
    require_once("../classes/LoginClass.php");
?>

    <div class="main w-100 h-100">
        <div class="container h-100">
            <div class="row align-items-center h-100 w-50 m-auto">
                <div class="col">
                    <form class="d-flex flex-column justify-content-center align-items-center" method="post">
                        <h1>Logowanie</h1>
                        <input type="text" class="w-50 p-2" name="email" placeholder="Email" />
                        <input type="password" class="w-50 mt-2 p-2" name="password" placeholder="Password" />
                        <div class="d-flex w-50 my-2">
                            <input class="btn w-50 border border-dark" type="submit" name="submitLoginForm" value="Zaloguj" />
                            <a href="/rezerwacja/includes/register.php" class="btn w-50 border border-dark">Zarejestruj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php 

if (isset($_POST['submitLoginForm'])) {
    $login = new Login($db);
    $login->login($_POST["email"], $_POST["password"]);
    ?>
        <script type="text/javascript">
            window.location = "/rezerwacja/includes/index.php";
        </script>
    <?php
}
require_once("_partials/footer.php"); 
?>