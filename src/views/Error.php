<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once 'src/views/includes/head.php'; ?>
</head>

<body>

  <main>
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        <h2>La página que buscas no existe.</h2>
        <a class="btn" href="<?=$_ENV['HOST']?>home">Ir a inicio</a>
        <img src="<?=$_ENV['HOST']?>assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
        
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include_once 'src/views/includes/footer.php'; ?>

</body>

</html>