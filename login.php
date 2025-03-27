<?php
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
