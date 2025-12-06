<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-Type: application/json");

$host = $_SERVER['MYSQLHOST']    ?? null;
$user = $_SERVER['MYSQLUSER']    ?? null;
$pass = $_SERVER['MYSQLPASSWORD']?? null;
$db   = $_SERVER['MYSQLDATABASE']?? null;
$port = $_SERVER['MYSQLPORT']    ?? 3306;

if (!$host) {
    http_response_code(500);
    echo json_encode([
        "error" => "ENV MYSQL TIDAK TERDETEKSI",
        "server_keys" => array_keys($_SERVER)
    ]);
    exit;
}

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        "error" => "DB CONNECT ERROR",
        "msg" => $conn->connect_error
    ]);
    exit;
}
