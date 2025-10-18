<?php
include('db_config.php');
$mensajeExito = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string(trim($_POST['nombre']));
    $correo = $conn->real_escape_string(trim($_POST['correo']));
    $mensaje = $conn->real_escape_string(trim($_POST['mensaje']));

    if ($nombre === "" || $correo === "" || $mensaje === "") {
        $error = "Por favor complete todos los campos.";
    } else {
        $sql = "INSERT INTO contactos (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";
        if ($conn->query($sql) === TRUE) {
            $mensajeExito = "Mensaje enviado correctamente.";
        } else {
            $error = "Error al guardar: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario de Contacto U La Salle</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="form-container">
    <h1>Formulario de contacto - U La Salle</h1>

    <?php if ($mensajeExito): ?>
      <p class="mensaje-exito"><?= $mensajeExito ?></p>
    <?php elseif ($error): ?>
      <p class="mensaje-error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
      <label>Nombre:</label>
      <input type="text" name="nombre" required>

      <label>Correo:</label>
      <input type="email" name="correo" required>

      <label>Mensaje:</label>
      <textarea name="mensaje" rows="5" required></textarea>

      <button type="submit">Enviar</button>
    </form>

    <a href="ver_messages.php" class="btn-secundario">Ver mensajes recibidos</a><br>
    <a href="index.html" class="btn-volver">Volver al inicio</a>
  </main>
</body>
</html>
