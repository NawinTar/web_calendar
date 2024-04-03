<?php
    require_once("../config.php");

    class DesktopCalendarData extends Config{
        public function fetchall(){
            $sql = "SELECT * FROM desktop_calendar";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        }
    }