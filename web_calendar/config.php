<?php
    class Config {
        private const DBHOST = "localhost";
        private const DBUSER = "root";
        private const DBPASS = "";
        private const DBNAME = "web_calendar";
        // Data source name = dsn
        private $dsn = "mysql:host=" . self::DBHOST . ";dbname=" . self::DBNAME . ";charset=utf8";
        protected $conn = null;
        public function __construct()
        {
            try {
                $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            }catch (PDOException $e) {
                die("Connection failed : " . $e->getMessage());
            }
        }
        public function test_input($data) {
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            $data = trim($data);
            return $data;
        }
        public function message($content, $status) {
            return json_encode(['message' => $content, 'error' => $status]);
        }
    }

