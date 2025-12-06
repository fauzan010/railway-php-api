<?php
header("Content-Type: application/json");

$conn = new mysqli(
    $_ENV['MYSQLHOST'],
    $_ENV['MYSQLUSER'],
    $_ENV['MYSQLPASSWORD'],
    $_ENV['MYSQLDATABASE'],
    $_ENV['MYSQLPORT']
);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "DB gagal konek"]);
    exit;
}
