<?php
header("Content-Type: application/json");

echo json_encode([
  "message" => "API Railway jalan",
  "method" => $_SERVER['REQUEST_METHOD']
]);
