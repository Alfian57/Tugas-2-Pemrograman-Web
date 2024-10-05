<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::setInstance();
        }

        return self::$instance;
    }

    private static function setInstance(): void
    {
        $servername = "0.0.0.0";
        $username = "root";
        $password = "root";
        $dbname = "tugas_2_5230411121";

        try {
            self::$instance = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die;
        }
    }
}
