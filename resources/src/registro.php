<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Leer JSON recibido
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode([
        "success" => false,
        "message" => "No se recibieron datos"
    ]);
    exit;
}

$username = $data['username'] ?? null;
$password = $data['password'] ?? null;
$dni = $data['dni'] ?? null;

if (!$username || !$password || !$dni) {
    echo json_encode([
        "success" => false,
        "message" => "Faltan datos obligatorios"
    ]);
    exit;
}

// Conexión
$conn = new mysqli("127.0.0.1", "root", "", "apoya_db", 3306);

if ($conn->connect_error) {
    echo json_encode([
        "success" => false,
        "message" => "Error de conexión: " . $conn->connect_error
    ]);
    exit;
}

// Hashear contraseña
$passHash = password_hash($password, PASSWORD_DEFAULT);

// Insertar
$stmt = $conn->prepare("INSERT INTO usuarios (username, password, dni) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $passHash, $dni);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Usuario registrado correctamente"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error al registrar: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>
