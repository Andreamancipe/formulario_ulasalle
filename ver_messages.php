<?php
include('db_config.php');
$result = $conn->query("SELECT * FROM contactos ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mensajes recibidos - U La Salle</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="ver-container">
    <h1>Mensajes recibidos</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Mensaje</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nombre']) ?></td>
        <td><?= htmlspecialchars($row['correo']) ?></td>
        <td><?= htmlspecialchars($row['mensaje']) ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
    <a href="contacto.php" class="btn-volver">Volver al formulario</a>
  </main>
</body>
</html>
