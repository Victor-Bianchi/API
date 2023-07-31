<?php 

    namespace App;

    class MySQL
    {
        public static function connect()
        {
            $pdo = new \PDO('mysql:host='.\HOST.';dbname='.\DATABASE.';', \USERNAME, \PASSWORD);
            return $pdo;
        }

        public static function execQuery($query, $showData = false)
        {
            switch ($showData) {
                case false:
                    $sql = self::connect()->prepare($query);
                    return $sql->execute();
                    break;
                case true:
                    $sql = self::connect()->prepare($query);
                    $sql->execute();
                    $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
                    echo "<pre>";
                    var_dump($data);
                    return;
                    break;
                default:
                    die('ERRO: Parâmetro inválido: '.$showData);
            }
        }

        public static function execQueryQuickly($query)
        {
            return self::connect()->exec($query);
        }
    }
?>