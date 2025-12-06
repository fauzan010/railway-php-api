<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/users') {
    require 'users.php';
} else {
    echo json_encode(["message" => "API Ready"]);
}
