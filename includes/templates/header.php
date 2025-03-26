<?php
if (!isset($_SESSION)) {
  session_start();
}
$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="es">

<head>
  <!-- Site Title-->
  <title>LaBanditadelaChilean</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Kanit:300,400,500,500i,600,900%7CRoboto:400,900">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.6.0/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/fonts.css">
  <link rel="stylesheet" href="/css/style.css">

  <!-- Incluir SweetAlert -->
  <link rel="stylesheet" href="/js/sweetalert2.min.css">
  <script src="/js/sweetalert2.min.js"></script>
</head>

<body>
  <div class="preloader">
    <div class="preloader-body">
      <div class="preloader-item"></div>
    </div>
  </div>
  <!-- Page-->
  <!-- Banner -->
  <div class="page">
    <!-- <a class="d-none d-xl-block" href="https://www.templatemonster.com/website-templates/allstar-multi-sports-website-template-63853.html" target="blank"><img class="d-block w-100" src="/images/banner-free-01.jpg" alt=""></a> -->
    <!-- Page Header-->
    <header class="section page-header rd-navbar-dark">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed"
          data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
          data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
          data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="166px" data-xl-stick-up-offset="166px"
          data-xxl-stick-up-offset="166px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-panel">
            <!-- RD Navbar Toggle-->
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-main"><span></span></button>
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel-inner container">
              <div class="rd-navbar-collapse rd-navbar-panel-item rd-navbar-panel-item-left">
                <!-- Owl Carousel-->
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
                      <!-- Post Inline-->
                      <article class="post-inline">
                        <time class="post-inline-time" datetime="2020">April 15, 2020</time>
                        <p class="post-inline-title">Sportland vs Dream Team</p>
                      </article>
                      <!-- Post Inline-->
                      <article class="post-inline">
                        <time class="post-inline-time" datetime="2020">April 15, 2020</time>
                        <p class="post-inline-title">Sportland vs Real Madrid</p>
                      </article>
                      <!-- Post Inline-->
                      <article class="post-inline">
                        <time class="post-inline-time" datetime="2020">April 15, 2020</time>
                        <p class="post-inline-title">Sportland vs Barcelona</p>
                      </article>
                    </div>
                  </div>
                </div>
              </div>
              <div class="rd-navbar-panel-item rd-navbar-panel-item-right">
                <ul class="list-inline list-inline-bordered">

                  <li><a class="link link-icon link-icon-left link-classic" href="/login.php"><span
                        class="icon fl-bigmug-line-login12"></span><span class="link-icon-text">Login</span></a>
                  </li>
                  <li>
                    <?php if ($auth): ?>
                      <a class="link link-icon link-icon-left link-classic" href="/cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if ($auth): ?>
                      <a class="link link-icon link-icon-left link-classic" href="/admin/index.php">Panel de Control</a>
                    <?php endif; ?>
                  </li>
                </ul>
              </div>
              <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1"
                data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            </div>
          </div>
          <div class="rd-navbar-main">
            <div class="rd-navbar-main-top">
              <div class="rd-navbar-main-container container">
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand" href="/index.php"><img class="brand-logo "
                      src="/images/logo-bandita-95x126.png" alt="" width="95" height="126" /></a>
                </div>
                <!-- RD Navbar List-->
                <ul class="rd-navbar-list">
                  <li class="rd-navbar-list-item"><a class="rd-navbar-list-link" href="#"><img
                        src="/images/partners-1-inverse-75x42.png" alt="" width="75" height="42" /></a></li>
                  <li class="rd-navbar-list-item"><a class="rd-navbar-list-link" href="#"><img
                        src="/images/partners-2-inverse-88x45.png" alt="" width="88" height="45" /></a></li>
                  <li class="rd-navbar-list-item"><a class="rd-navbar-list-link" href="#"><img
                        src="/images/partners-3-inverse-79x52.png" alt="" width="79" height="52" /></a></li>
                </ul>
                <!-- RD Navbar Search-->
                <div class="rd-navbar-search">
                  <button class="rd-navbar-search-toggle"
                    data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                  <form class="rd-search" action="#" data-search-live="rd-search-results-live" method="GET">
                    <div class="form-wrap">
                      <label class="form-label" for="rd-navbar-search-form-input">Enter your search request
                        here...</label>
                      <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text"
                        name="s" autocomplete="off">
                      <div class="rd-search-results-live" id="rd-search-results-live"></div>
                    </div>
                    <button class="rd-search-form-submit fl-budicons-launch-search81" type="submit"></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="rd-navbar-main-bottom rd-navbar-darker">
              <div class="rd-navbar-main-container container">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="/index.php">Inicio</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link"
                      href="https://livedemo00.template-help.com/wt_63853_v4/soccer/index.html">Tablas de Posiciones</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link"
                      href="https://livedemo00.template-help.com/wt_63853_v4/soccer/index.html">Predicciones</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link"
                      href="https://livedemo00.template-help.com/wt_63853_v4/soccer/index.html">Quienes Somos</a>
                  </li>
                  
                </ul>
                <div class="rd-navbar-main-element">
                  <ul class="list-inline list-inline-sm">
                    <li><a class="icon icon-xs icon-light fa-brands fa-x-twitter" href="#"></a></li>
                    <li><a class="icon icon-xs icon-light fa fa-tiktok" href="#"></a></li>
                    <li><a class="icon icon-xs icon-light fa fa-instagram" href="#"></a></li>
                    <li><a class="icon icon-xs icon-light fa fa-kickstarter-k" href="#"></a>
                    <li><a class="icon icon-xs icon-light fa-brands fa-discord" href="#"></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>

    </header>