<?php
// Iniciar sesión
session_start();

// Incluir archivo de configuración para conectar la base de datos
require 'includes/conexion.php';
$db = conectarDB();

// Arreglo para almacenar errores
$errores = [];

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar el email y la contraseña ingresada por el usuario
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validar campos
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['error' => "El Email es obligatorio o no es válido"]);
        exit; // Terminar la ejecución
    }
    if (!$password) {
        echo json_encode(['error' => "La Contraseña es obligatoria"]);
        exit; // Terminar la ejecución
    }

    // Si no hay errores, proceder a verificar el login
    if (empty($errores)) {
        // Buscar el usuario por email en la base de datos
        $query = "SELECT id, email, username, password, role, profile_image FROM users WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows) {
            $usuario = $resultado->fetch_assoc();

            // Verificar si la contraseña ingresada coincide con la almacenada en la base de datos
            if (password_verify($password, $usuario['password'])) {
                // Autenticación exitosa, iniciar sesión
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['usuario_nombre'] = $usuario['username'];
                $_SESSION['usuario_rol'] = $usuario['role']; // Guardar el rol
                $_SESSION['usuario_imagen'] = $usuario['profile_image']; // Guardar la imagen de perfil
                $_SESSION['login'] = true;

                // Devolver éxito
                echo json_encode(['success' => true]);
                exit; // Terminar la ejecución
            } else {
                echo json_encode(['error' => "La contraseña es incorrecta"]);
                exit; // Terminar la ejecución
            }
        } else {
            echo json_encode(['error' => "El usuario no existe"]);
            exit; // Terminar la ejecución
        }
    }
}

// Incluye el Header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<!-- Section Breadcrumbs -->
<section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/bg-breadcrumbs-1-1920x726.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
        <div class="container">
            <h3 class="breadcrumbs-custom-title">Login</h3>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/index.php">Inicio</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
    </div>
</section>

<!-- Section Login/register -->
<section class="section section-variant-1 bg-gray-100">
    <div class="container">
        <div class="row row-50 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card-login-register" id="card-l-r">
                    <div class="card-top-panel">
                        <div class="card-top-panel-left">
                            <h5 class="card-title card-title-login">Login</h5>
                        </div>
                    </div>
                    <!-- Formulario de Login -->
                    <div class="card-form card-form-login">
                        <form id="loginForm" class="rd-form" method="POST">
                            <div class="form-wrap form-group">
                                <label class="form-label rd-input-label" for="email">Email</label>
                                <input class="form-input form-control" id="email" type="email" name="email" required>
                            </div>
                            <div class="form-wrap form-group">
                                <label class="form-label rd-input-label" for="password">Password</label>
                                <input class="form-input form-control" id="password" type="password" name="password" required>
                            </div>
                            <input class="button button-lg button-primary button-block" type="submit" value="Ingresar">
                        </form>
                        <!-- Lugar para mostrar las alertas -->
                        <div id="alerta"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php incluirTemplate('footer'); ?>
