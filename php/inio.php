<?php
// Iniciar sesión para manejar logins
session_start();

// Si el usuario ha iniciado sesión, puedes guardar su nombre en $_SESSION['usuario']
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joystrick Genius - Inicio</title>
  <link rel="icon" href="../img/logo.jpeg">
  <link rel="stylesheet" href="../css/inicio.css">
</head>
<body>
  <!-- Barra de navegación -->
  <nav class="navbar">
    <div class="logo">
      🎮 Joystrick Genius
      <img src="../img/logo.jpeg" alt="joystrick_genius Logo">
    </div>
    <ul class="nav-links">
      <?php if ($usuario): ?>
        <li><a href="perfil.php">👤 <?php echo htmlspecialchars($usuario); ?></a></li>
        <li><a href="logout.php">Cerrar Sesión</a></li>
      <?php else: ?>
        <li><a href="iniciar_sesion.php">Iniciar Sesión</a></li>
      <?php endif; ?>
      <li><a href="categorias.php">Categorías</a></li>
      <li><a href="juegos.php">Juegos</a></li>
      <li><a href="nosotros.php">Nosotros</a></li>
    </ul>
  </nav>

  <!-- Contenido principal -->
  <header class="hero">
    <h1>Bienvenido a Joystrick Genius</h1>
    <p>Tu portal gamer con las mejores categorías y juegos.</p>

    <?php if ($usuario): ?>
      <p style="margin-top:20px; font-size:18px; color:#ff4444;">
        Hola, <strong><?php echo htmlspecialchars($usuario); ?></strong> 👋 ¡Nos alegra verte de nuevo!
      </p>
    <?php else: ?>
      <p style="margin-top:20px; font-size:18px; color:#ccc;">
        Inicia sesión para disfrutar de todas las funciones.
      </p>
    <?php endif; ?>
  </header>
</body>
</html>
