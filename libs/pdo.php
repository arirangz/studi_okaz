<?php

try {
    $config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . "/.env");
    $pdo = new PDO("mysql:dbname={$config["db_name"]};host={$config["db_host"]};charset=utf8mb4", $config["db_user"], $config["db_password"]);
} catch (Exception $e) {
    die("Erreur: {$e->getMessage()}");
}
