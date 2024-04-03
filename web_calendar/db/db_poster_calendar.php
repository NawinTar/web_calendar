<?php
    require_once("../config.php");

    class PosterCalendarData extends Config{
        public function fetchall(){
            $sql = "SELECT * FROM poster_calendar";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        }
    }