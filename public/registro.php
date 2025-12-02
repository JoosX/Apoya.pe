<?php
header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

$conn = new mysqli("localhost", "root", "", "apoya_db");

if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$dni = $data['dni'] ?? '';
$telefono = $data['telefono'] ?? null;
$email    = $data['email'] ?? null;

$stmt = $conn->prepare("INSERT INTO usuarios (username, password, dni, telefono, email) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $username, $passHash, $dni, $telefono, $email);
$stmt = $conn->prepare("INSERT INTO usuarios (username, password, dni) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $dni);

if($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Usuario registrado"]);
} else {
    echo json_encode(["success" => false, "message" => "Error al registrar"]);
}

$stmt->close();
$conn->close();
?>
