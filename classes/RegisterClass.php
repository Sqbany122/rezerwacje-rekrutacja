<?php 

class Register {
    public $userEmail;
    public $userPassword;
    public $userPasswordRepeat;

    public function __construct($db, $email, $password, $repeat_password, $role) {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            print_r("Niepoprawny adres email!!");
            die;
        } else if ($password != $repeat_password) {
            print_r("Źle powtórzone hasło!!!");
            die;
        }

        $db->insert("
            INSERT INTO users (email, password, role)
            VALUES ('".$email."', '".md5($password)."', ".$role.")
        ");

        header('Location: /rezerwacja/includes/login.php');
    }
}