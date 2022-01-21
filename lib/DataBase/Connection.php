<?php

namespace lib\Database;

    abstract class Connection
    {   
        private static $conn;

        /**
         * Metodo responsável por se conectar com a base de dados
         *
         * @return PDO $conn
         */
        public static function getConn()
        {
            if (!self::$conn) {
                self::$conn = new \PDO('mysql: host=localhost; dbname=sistema_login', 'root','');
            }

            return self::$conn;
        }
    }
?>