</main>
    
    <footer class="section footer-classic bg-gray-900">
      <div class="container">
        <div class="row row-30">
          <div class="col-md-6 col-lg-4">
            <h5 class="footer-classic-title">La Bandita</h5>
            <p class="footer-classic-text">Sistema de predicciones de fútbol donde puedes demostrar tus conocimientos y competir con amigos.</p>
            <ul class="list-inline list-inline-sm">
              <li><a class="icon icon-xs icon-circle icon-gray-4 fa-brands fa-x-twitter" href="#"></a></li>
              <li><a class="icon icon-xs icon-circle icon-gray-4 fa fa-tiktok" href="#"></a></li>
              <li><a class="icon icon-xs icon-circle icon-gray-4 fa fa-instagram" href="#"></a></li>
            </ul>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <h5 class="footer-classic-title">Enlaces Rápidos</h5>
            <ul class="footer-classic-list">
              <li><a href="/index.php">Inicio</a></li>
              <li><a href="/predicciones.php">Predicciones</a></li>
              <li><a href="/posiciones.php">Posiciones</a></li>
              <li><a href="/nosotros.php">Quiénes Somos</a></li>
              <li><a href="/terminos.php">Términos y Condiciones</a></li>
            </ul>
          </div>
          
          <div class="col-md-12 col-lg-4">
            <h5 class="footer-classic-title">Contacto</h5>
            <address class="footer-classic-text">
              <dl class="list-terms-inline">
                <dt>Email:</dt>
                <dd><a href="mailto:contacto@labandita.cl">contacto@labandita.cl</a></dd>
              </dl>
              <dl class="list-terms-inline">
                <dt>Teléfono:</dt>
                <dd><a href="tel:+56912345678">+56 9 1234 5678</a></dd>
              </dl>
            </address>
          </div>
        </div>
        
        <div class="row row-15 align-items-center justify-content-between">
          <div class="col-auto">
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>La Bandita</span><span>. Todos los derechos reservados.</span></p>
          </div>
          <div class="col-auto">
            <ul class="list-inline list-inline-sm">
              <li><a href="/politica-privacidad.php">Política de Privacidad</a></li>
              <li><a href="/terminos.php">Términos de Uso</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  
  <!-- Scripts -->
  <script src="/js/core.min.js"></script>
  <script src="/js/script.js"></script>
  
  <!-- Mostrar mensajes con SweetAlert -->
  <?php if (isset($_SESSION['swal_mensaje'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: '<?= $_SESSION['swal_mensaje']['tipo'] ?>',
        title: '<?= $_SESSION['swal_mensaje']['titulo'] ?>',
        text: '<?= addslashes($_SESSION['swal_mensaje']['texto']) ?>',
        confirmButtonText: 'Entendido'
      });
    });
  </script>
  <?php unset($_SESSION['swal_mensaje']); endif; ?>
</body>
</html>