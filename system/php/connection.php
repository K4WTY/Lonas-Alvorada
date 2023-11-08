<?php
    define("MYSQL_USER", "");
    define("MYSQL_PASSWORD", "");
    define("MYSQL_HOST", "");
    define("DB_NAME", "");
    try {
        $pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
    } catch (PDOException) {
        echo "Erro.";
    }
?>