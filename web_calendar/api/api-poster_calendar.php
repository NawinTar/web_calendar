<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json");

require_once("../db/db_poster_calendar.php");
$PosterCalendar = new PosterCalendarData();

$api = $_SERVER["REQUEST_METHOD"];
if ($api == "GET"){
    $data = $PosterCalendar->fetchAll();
    echo json_encode($data);
}


