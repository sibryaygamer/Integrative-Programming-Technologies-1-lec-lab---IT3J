<?php
$jsonInput = file_get_contents('php://input');

$data = json_decode($jsonInput, true);

if ($data) {
    echo "Username: " . htmlspecialchars($data['username']) . "<br>";
    echo "Password: " . htmlspecialchars($data['password']);
} else {
    echo "No valid JSON data received.";
}
?>
