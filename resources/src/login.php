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

if (!$username || !$password) {
    echo json_encode([
        "success" => false,
        "message" => "Faltan datos"
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

// Buscar usuario
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {

    // Verificar contraseña
    if (password_verify($password, $row['password'])) {

        unset($row['password']); // Quitar contraseña de la respuesta

        echo json_encode([
            "success" => true,
            "message" => "Inicio de sesión exitoso",
            "user" => $row
        ]);

    } else {

        echo json_encode([
            "success" => false,
            "message" => "Contraseña incorrecta"
        ]);
    }

} else {
    echo json_encode([
        "success" => false,
        "message" => "Usuario no encontrado"
    ]);
}

$stmt->close();
$conn->close();
?>
