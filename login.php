<?php
session_start();

// Incluir archivo de conexión
include_once '../../controlador/conexion.php';

// Función para limpiar datos de entrada
function limpiarDatos($dato) {
    global $conexion;
    return mysqli_real_escape_string($conexion, trim(htmlspecialchars($dato)));
}

// Función para registrar intento de sesión
function registrarSesion($usuario_id, $ip) {
    global $conexion;
    $stmt = $conexion->prepare("INSERT INTO sesiones (usuario_id, ip) VALUES (?, ?)");
    $stmt->bind_param("is", $usuario_id, $ip);
    $stmt->execute();
    $stmt->close();
}

// Función para actualizar último acceso
function actualizarUltimoAcceso($usuario_id) {
    global $conexion;
    $stmt = $conexion->prepare("UPDATE usuarios SET ultimo_acceso = NOW() WHERE id = ?");
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->close();
}

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario_id'])) {
    // Redirigir según el tipo de usuario
    if ($_SESSION['tipo_usuario'] == 'admin') {
        header("Location: ../../controlador/admin/dashboard.php");
    } else {
        header("Location: ../../controlador/inicio.php");
    }
    exit();
}

$error = '';
$success = '';

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que todos los campos requeridos estén presentes
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Por favor, completa todos los campos obligatorios.";
    } elseif (!isset($_POST['terms_conditions'])) {
        $error = "Debes aceptar los términos y condiciones para continuar.";
    } else {
        // Limpiar y obtener datos del formulario
        $email = limpiarDatos($_POST['email']);
        $password = $_POST['password'];
        
        // Validar formato de email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Por favor, ingresa un correo electrónico válido.";
        } else {
            // Preparar consulta para verificar usuario
            $stmt = $conexion->prepare("SELECT id, nombre, email, password, tipo_usuario, estado FROM usuarios WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            if ($resultado->num_rows == 1) {
                $usuario = $resultado->fetch_assoc();
                
                // Verificar si la cuenta está activa
                if ($usuario['estado'] != 'activo') {
                    $error = "Tu cuenta se encuentra inactiva. Contacta al administrador.";
                } else {
                    // Verificar contraseña
                    if (
    password_verify($password, $usuario['password']) ||
    ($usuario['tipo_usuario'] == 'admin' && $password === $usuario['password'])
) {
    // Login exitoso - crear sesión
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
    $_SESSION['login_time'] = time();

    // Registrar sesión en la base de datos
    $ip_usuario = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
    registrarSesion($usuario['id'], $ip_usuario);

    // Actualizar último acceso
    actualizarUltimoAcceso($usuario['id']);

    // Regenerar ID de sesión por seguridad
    session_regenerate_id(true);

    // Redirigir según el tipo de usuario
    if ($usuario['tipo_usuario'] == 'admin') {
        header("Location: ../../controlador/administracion/administracion.php");
    } else {
        header("Location: ../../controlador/inicio.php");
    }
    exit();
} else {
    $error = "Credenciales incorrectas. Por favor, verifica tu email y contraseña.";
}
                }
            } else {
                $error = "Credenciales incorrectas. Por favor, verifica tu email y contraseña.";
            }
            
            $stmt->close();
        }
    }
}

// Cerrar conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../vista/multimedia/imagenes/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../vista/css/login.css">
    <title>joystrick_genius - Acceso Seguro</title>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="../../vista/multimedia/imagenes/logo.png" alt="joystrick_genius Logo">
        </div>
        <h2 style="text-align: center; margin-bottom: 20px; color: var(--accent-color);">Acceso Seguro</h2>
        
        <form method="POST" action="login.php" autocomplete="off" id="loginForm">
            <?php if (!empty($error)): ?>
                <div class="error-message">
                    <i class="error-icon">⚠️</i>
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($success)): ?>
                <div class="success-message">
                    <i class="success-icon">✅</i>
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>
            
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" 
                    id="email" 
                    name="email" 
                    required 
                    placeholder="usuario@ejemplo.com"
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                    maxlength="100">
            </div>
            
            <div class="input-group">
                <label for="password">Contraseña</label>
                <div class="password-container">
                    <input type="password" 
                        id="password" 
                        name="password" 
                        required 
                        placeholder="Ingresa tu contraseña"
                        minlength="6">
                    <button type="button" 
                            class="toggle-password" 
                            onclick="togglePassword()">👁️</button>
                </div>
            </div>
            
            <div class="terms-conditions">
                <input type="checkbox" 
                    id="terms_conditions" 
                    name="terms_conditions" 
                    required>
                <label for="terms_conditions">
                    Acepto los 
                    <a href="../../controlador/Terminos_y_Condiciones.php" target="_blank">
                        Términos y Condiciones
                    </a>
                </label>
            </div>
            
            <button type="submit" class="btn-login" id="submitBtn">Ingresar</button>
            
            <div class="links">
                <a href="olvidar_contraseña.php">¿Olvidaste tu contraseña?</a>
                <a href="registro.php">¿No tienes cuenta? Regístrate</a>
            </div>
            
            <div class="back-button">
                <a href="../../controlador/inicio.php" class="btn-back">← Regresar</a>
            </div>
        </form>
    </div>

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.querySelector('.toggle-password');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.textContent = '🔒';
        } else {
            passwordInput.type = 'password';
            toggleButton.textContent = '👁️';
        }
    }

    // Validación del formulario en tiempo real
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const termsAccepted = document.getElementById('terms_conditions').checked;
        const submitBtn = document.getElementById('submitBtn');
        
        // Validaciones básicas
        if (!email || !password) {
            e.preventDefault();
            alert('Por favor, completa todos los campos obligatorios.');
            return;
        }
        
        if (!termsAccepted) {
            e.preventDefault();
            alert('Debes aceptar los términos y condiciones para continuar.');
            return;
        }
        
        // Validar formato de email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            alert('Por favor, ingresa un correo electrónico válido.');
            return;
        }
        
        // Mostrar indicador de carga
        submitBtn.textContent = 'Iniciando sesión...';
        submitBtn.disabled = true;
        document.querySelector('.login-container').classList.add('loading');
    });

    // Limpiar mensajes de error/éxito después de un tiempo
    setTimeout(function() {
        const errorMsg = document.querySelector('.error-message');
        const successMsg = document.querySelector('.success-message');
        
        if (errorMsg) {
            errorMsg.style.transition = 'opacity 0.5s';
            errorMsg.style.opacity = '0';
            setTimeout(() => errorMsg.remove(), 500);
        }
        
        if (successMsg) {
            successMsg.style.transition = 'opacity 0.5s';
            successMsg.style.opacity = '0';
            setTimeout(() => successMsg.remove(), 500);
        }
    }, 5000);
    
    // Prevenir envío múltiple del formulario
    let formSubmitted = false;
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        if (formSubmitted) {
            e.preventDefault();
            return;
        }
        formSubmitted = true;
    });
    </script>
</body>
</html>