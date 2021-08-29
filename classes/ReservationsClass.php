<?php

class Reservations{
    public $date;
    public $reservedDates = array();
    public $output = array();
    public $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getReservationsByDateInCalendar($date){
        $this->date = $date;
        $dates = $this->db->get("
            SELECT a.*, b.email
            FROM reservations a
            LEFT JOIN users b ON b.id = a.user_id
            WHERE start_date LIKE '".$this->date."%'
        ");

        $this->reservedDates = $dates;

        echo json_encode($this->reservedDates);
    }

    public function setReservation($start_date, $end_date, $user) {
        $this->validateReservation($start_date, $end_date, $user);
        $this->db->insert("
            INSERT INTO reservations (user_id, start_date, end_date)
            VALUES (".$user.", '".$start_date."', '".$end_date."')
        ");

        $message = "Twoja data rezerwacji: Od: ".$start_date." Do: ".$end_date."";
        $message = wordwrap($message, 70, "\r\n");
        mail('oskar.lewandowski122@gmail.com', 'My Subject', $message);
    }

    private function validateReservation($start_date, $end_date, $user) {

        $checkStartDateHour = strtotime($start_date);
        $checkEndDateHour = strtotime($end_date);

        if (date('H', $checkStartDateHour) < "8" || date('H', $checkEndDateHour) > "16") {
            var_dump("o nienie");
            die;
        }

        $validate = $this->db->query("
            SELECT *
            FROM reservations
            WHERE '".$start_date."' BETWEEN start_date AND end_date
            OR '".$end_date."' BETWEEN start_date AND end_date
        ");

        if ($validate) {
            print_r("W tym czasie sala jest już zarezerwowana!!!!");
            die;
        }
    }

    public function getAllReservations() {
        $all_reservations = $this->db->get("
            SELECT a.*, b.email
            FROM reservations a
            LEFT JOIN users b on b.id = a.user_id
        ");

        $reservations = '';

        foreach ($all_reservations as $key => $reservation) {
            $lp = $key + 1;
            $reservations .= '
                <tr class="singleReservation text-center" data-id="'.$reservation['id'].'">
                    <td class="align-middle">'.$lp.'</td>
                    <td class="align-middle">'.$reservation['start_date'].'</td>
                    <td class="align-middle">'.$reservation['end_date'].'</td>
                    <td class="align-middle">'.$reservation['email'].'</td>
                    <td class="align-middle"><button class="deleteReservation btn btn-danger">Usuń</button></td>
                </tr>
            ';
        }

        echo $reservations;
    }

    public function deleteReservation($id) {
        $this->db->insert("
            DELETE 
            FROM reservations
            WHERE id = ".$id."
        ");
    }
}

?>