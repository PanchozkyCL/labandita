<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
$es_admin = ($_SESSION['rol'] ?? '') === 'admin';
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
<head>
  <title>LaBanditadelaChilean - Sistema de Predicciones</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
  
  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Kanit:300,400,500,500i,600,900%7CRoboto:400,900">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.6.0/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/fonts.css">
  <link rel="stylesheet" href="/css/style.css">
  
  <!-- SweetAlert -->
  <link rel="stylesheet" href="/js/sweetalert2.min.css">
  <script src="/js/sweetalert2.min.js"></script>
  
  <!-- reCAPTCHA -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
  <div class="preloader">
    <div class="preloader-body">
      <div class="preloader-item"></div>
    </div>
  </div>
  
  <div class="page">
    <header class="section page-header rd-navbar-dark">
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed"
          data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
          data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
          data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="166px" data-xl-stick-up-offset="166px"
          data-xxl-stick-up-offset="166px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          
          <div class="rd-navbar-panel">
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-main"><span></span></button>
            
            <div class="rd-navbar-panel-inner container">
              <div class="rd-navbar-collapse rd-navbar-panel-item rd-navbar-panel-item-left">
                <div class="owl-carousel-navbar owl-carousel-inline-outer">
                  <div class="owl-inline-nav">
                    <button class="owl-arrow owl-arrow-prev"></button>
                    <button class="owl-arrow owl-arrow-next"></button>
                  </div>
                  <div class="owl-carousel-inline-wrap">
                    <div class="owl-carousel owl-carousel-inline" data-items="1" data-dots="false" data-nav="true"
                      data-autoplay="true" data-autoplay-speed="3200" data-stage-padding="0" data-loop="true"
                      data-margin="10" data-mouse-drag="false" data-touch-drag="false"
                      data-nav-custom=".owl-carousel-navbar">
                      <article class="post-inline">
                        <p class="post-inline-title">Bienvenido al Sistema de Predicciones</p>
                      </article>
                      <article class="post-inline">
                        <p class="post-inline-title">Pronostica los partidos y gana premios</p>
                      </article>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="rd-navbar-panel-item rd-navbar-panel-item-right">
                <ul class="list-inline list-inline-bordered">
                  <?php if (!$auth): ?>
                    <li>
                      <a class="link link-icon link-icon-left link-classic" href="/login.php">
                        <span class="icon fl-bigmug-line-login12"></span>
                        <span class="link-icon-text">Login</span>
                      </a>
                    </li>
                    <li>
                      <a class="link link-icon link-icon-left link-classic" href="/registro.php">
                        <span class="icon fl-bigmug-line-user144"></span>
                        <span class="link-icon-text">Registro</span>
                      </a>
                    </li>
                  <?php else: ?>
                    <li>
                      <a class="link link-icon link-icon-left link-classic" href="/cerrar-sesion.php">
                        <span class="icon fl-bigmug-line-logout12"></span>
                        <span class="link-icon-text">Cerrar Sesión</span>
                      </a>
                    </li>
                    <?php if ($es_admin): ?>
                    <li>
                      <a class="link link-icon link-icon-left link-classic" href="/admin/index.php">
                        <span class="icon fl-bigmug-line-settings21"></span>
                        <span class="link-icon-text">Panel Admin</span>
                      </a>
                    </li>
                    <?php endif; ?>
                  <?php endif; ?>
                </ul>
              </div>
              
              <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1"
                data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            </div>
          </div>
          
          <div class="rd-navbar-main">
            <div class="rd-navbar-main-top">
              <div class="rd-navbar-main-container container">
                <div class="rd-navbar-brand">
                  <a class="brand" href="/index.php">
                    <img class="brand-logo" src="/images/logo-bandita-95x126.png" alt="La Bandita" width="95" height="126">
                  </a>
                </div>
                
                <ul class="rd-navbar-list">
                  <li class="rd-navbar-list-item">
                    <a class="rd-navbar-list-link" href="#">
                      <img src="/images/partners-1-inverse-75x42.png" alt="" width="75" height="42">
                    </a>
                  </li>
                  <!-- Más elementos de lista según sea necesario -->
                </ul>
                
                <div class="rd-navbar-search">
                  <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                  <form class="rd-search" action="/buscar.php" method="GET">
                    <div class="form-wrap">
                      <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" 
                             type="text" name="q" placeholder="Buscar..." autocomplete="off">
                    </div>
                    <button class="rd-search-form-submit fl-budicons-launch-search81" type="submit"></button>
                  </form>
                </div>
              </div>
            </div>
            
            <div class="rd-navbar-main-bottom rd-navbar-darker">
              <div class="rd-navbar-main-container container">
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
                    <a class="rd-nav-link" href="/index.php">Inicio</a>
                  </li>
                  <li class="rd-nav-item <?= basename($_SERVER['PHP_SELF']) == 'posiciones.php' ? 'active' : '' ?>">
                    <a class="rd-nav-link" href="/posiciones.php">Tablas de Posiciones</a>
                  </li>
                  <li class="rd-nav-item <?= basename($_SERVER['PHP_SELF']) == 'predicciones.php' ? 'active' : '' ?>">
                    <a class="rd-nav-link" href="/predicciones.php">Predicciones</a>
                  </li>
                  <li class="rd-nav-item <?= basename($_SERVER['PHP_SELF']) == 'nosotros.php' ? 'active' : '' ?>">
                    <a class="rd-nav-link" href="/nosotros.php">Quiénes Somos</a>
                  </li>
                  <?php if ($auth): ?>
                  <li class="rd-nav-item <?= basename($_SERVER['PHP_SELF']) == 'perfil.php' ? 'active' : '' ?>">
                    <a class="rd-nav-link" href="/perfil.php">Mi Perfil</a>
                  </li>
                  <?php endif; ?>
                </ul>
                
                <div class="rd-navbar-main-element">
                  <ul class="list-inline list-inline-sm">
                    <li><a class="icon icon-xs icon-light fa-brands fa-x-twitter" href="#"></a></li>
                    <li><a class="icon icon-xs icon-light fa fa-tiktok" href="#"></a></li>
                    <li><a class="icon icon-xs icon-light fa fa-instagram" href="#"></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    
    <!-- Contenedor principal -->
    <main class="page-content">
      <!-- Mostrar mensajes de sesión -->
      <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-<?= $_SESSION['mensaje']['tipo'] ?> alert-dismissible fade show text-center" role="alert">
          <?= $_SESSION['mensaje']['texto'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['mensaje']); ?>
      <?php endif; ?>