<?php
    require_once("../config.php");

    class WalllCalendarData extends Config{
        public function fetchall(){
            $sql = "SELECT * FROM wall_calendar";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        }
    }