<?php 
require_once("../config/config.php");
require_once("../classes/ReservationsClass.php");

$json = file_get_contents('php://input');
$object = json_decode($json);

if (isset($object->getByData) && $object->getByData === true) {
    $reservations = new Reservations($db);
    echo $reservations->getReservationsByDateInCalendar($object->data);
} elseif (isset($object->deleteReservation) && $object->deleteReservation === true) {
    $reservations = new Reservations($db);
    $reservations->deleteReservation($object->id);
}
