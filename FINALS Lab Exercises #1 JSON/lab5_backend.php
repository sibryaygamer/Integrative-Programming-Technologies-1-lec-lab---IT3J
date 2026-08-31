<?php
header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['name']) && !empty($data['name'])) {
    $response = [
        "status" => "success",
        "message" => "Welcome, " . htmlspecialchars($data['name']) . "!"
    ];
} else {
    $response = [
        "status" => "error",
        "message" => "Name not provided."
    ];
}

echo json_encode($response);
?>
