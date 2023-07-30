<?php 

    namespace App;

    class MySQL
    {
        public static function connect()
        {
            $pdo = new \PDO('mysql:host='.\HOST.';dbname='.\DATABASE.';', \USERNAME, \PASSWORD);
            return $pdo;
        }
    }
?>