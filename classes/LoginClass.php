<?php 

class Login {
    public $userEmail;
    public $userID;
    public $db;

    public function __construct($db) {
        $this->db = $db;
    } 

    public function login($email, $password) {
        $check_user = $this->db->query("
            SELECT *
            FROM users
            WHERE email = '".$email."'
            AND password = '".md5($password)."'
        ");

        if ($check_user) {
            $_SESSION['user_id'] = $check_user["id"];
            $_SESSION['user_role'] = $check_user['role'];
        } else {
            print_r("Nie ma takiego użytkownika w bazie!!!");
            die;
        }
    }
}