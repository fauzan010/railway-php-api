<?php
require 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $res = $conn->query("SELECT * FROM users");
    echo json_encode($res->fetch_all(MYSQLI_ASSOC));
}

if ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?,?)");
    $stmt->bind_param("ss", $data['name'], $data['email']);
    $stmt->execute();
    echo json_encode(["status" => "created"]);
}

if ($method === 'PUT') {
    parse_str($_SERVER['QUERY_STRING'], $q);
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $data['name'], $data['email'], $q['id']);
    $stmt->execute();
    echo json_encode(["status" => "updated"]);
}

if ($method === 'DELETE') {
    parse_str($_SERVER['QUERY_STRING'], $q);
    $conn->query("DELETE FROM users WHERE id=".$q['id']);
    echo json_encode(["status" => "deleted"]);
}
