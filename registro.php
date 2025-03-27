<?php
require __DIR__ . 'config.php';
require __DIR__ . '/includes/funciones.php';

// Verificar si el usuario ya está logueado
if (isset($_SESSION['id'])) {
    redirigir('dashboard.php');
}

// Inicializar variables
$email = $username = $equipo_id = '';
$errors = [];

// Obtener lista de equipos
try {
    $pdo = conectarDB();
    $equipos = $pdo->query("SELECT id, nombre FROM equipos ORDER BY nombre")->fetchAll();
} catch (PDOException $e) {
    $errors[] = "Error al cargar equipos: " . $e->getMessage();
    $equipos = [];
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizar($_POST['email']);
    $username = sanitizar($_POST['username']);
    $equipo_id = (int)$_POST['equipo'];

    // Validaciones
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El email no es válido";
    }

    if (empty($username)) {
        $errors[] = "El nombre de usuario es requerido";
    }

    if (empty($_POST['password']) || strlen($_POST['password']) < 8) {
        $errors[] = "La contraseña debe tener al menos 8 caracteres";
    } elseif ($_POST['password'] !== $_POST['password2']) {
        $errors[] = "Las contraseñas no coinciden";
    }

    if (!verificar_recaptcha($_POST['g-recaptcha-response'])) {
        $errors[] = "Por favor verifica que no eres un robot";
    }

    // Registrar usuario si no hay errores
    if (empty($errors)) {
        try {
            $token = generar_token();
            $password_hash = hash_password($_POST['password']);
            
            $sql = "INSERT INTO usuarios (email, nombre, password, equipo_id, token_confirmacion) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $username, $password_hash, $equipo_id, $token]);

            // Subir imagen si se proporcionó
            if (!empty($_FILES['profile_image']['name'])) {
                $imagen_path = subir_imagen($_FILES['profile_image']);
                if ($imagen_path) {
                    $pdo->prepare("UPDATE usuarios SET avatar = ? WHERE email = ?")
                        ->execute([$imagen_path, $email]);
                }
            }

            // Enviar email de confirmación (implementar después)
            // enviar_email_confirmacion($email, $token);

            redirigir('login.php', 'Registro exitoso. Por favor inicia sesión.');

        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                $errors[] = "El email ya está registrado";
            } else {
                $errors[] = "Error al registrar el usuario: " . $e->getMessage();
            }
        }
    }
}

// Mostrar el formulario
incluirTemplate('header');
?>

<section class="section section-variant-1 bg-gray-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Registro de Usuario</h3>
                    </div>
                    
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <p class="mb-1"><?= $error ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <!-- Campos del formulario -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?= htmlspecialchars($email) ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" 
                                       value="<?= htmlspecialchars($username) ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="equipo" class="form-label">Equipo Favorito</label>
                                <select class="form-select" id="equipo" name="equipo" required>
                                    <option value="">Selecciona tu equipo</option>
                                    <?php foreach ($equipos as $equipo): ?>
                                    <option value="<?= $equipo['id'] ?>" 
                                        <?= $equipo['id'] == $equipo_id ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($equipo['nombre']) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="profile_image" class="form-label">Imagen de Perfil (opcional)</label>
                                <input class="form-control" type="file" id="profile_image" name="profile_image" accept="image/*">
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password2" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password2" name="password2" required>
                            </div>
                            
                            <div class="mb-3">
                                <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                        </form>
                    </div>
                    
                    <div class="card-footer text-center">
                        ¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
incluirTemplate('footer');
?>