<?php
header('Content-Type: application/json');

$userProfile = [
    "id" => 1,
    "name" => "Camayang, Bryan B.",
    "email" => "bryancamayang01@gmail.com",
    "status" => "active"
];

echo json_encode($userProfile);
?>
