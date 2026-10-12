<?php
use App\Core\Asset;

$asset = static fn (?string $path): string => '/' . Asset::url($path);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= htmlspecialchars($profile['full_name']) ?> - Portfolio</title>
  <meta content="<?= htmlspecialchars($profile['headline']) ?>" name="description">
  <meta content="portfolio, resume, php, mvc, <?= htmlspecialchars($profile['full_name']) ?>" name="keywords">

  <link href="<?= $asset('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?= $asset('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">

  <link href="<?= $asset('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= $asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= $asset('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= $asset('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= $asset('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
  <link href="<?= $asset('assets/css/main.css') ?>" rel="stylesheet">

</head>

<body class="index-page">

  <?php require __DIR__ . '/partials/sidebar.php'; ?>

  <main class="main">
    <?php require __DIR__ . '/partials/hero.php'; ?>
    <?php require __DIR__ . '/partials/about.php'; ?>
    <?php require __DIR__ . '/partials/stats.php'; ?>
    <?php require __DIR__ . '/partials/skills.php'; ?>
    <?php require __DIR__ . '/partials/resume.php'; ?>
    <?php if ($portfolioItems): ?>
      <?php require __DIR__ . '/partials/portfolio.php'; ?>
    <?php endif; ?>
    <?php require __DIR__ . '/partials/services.php'; ?>
    <?php require __DIR__ . '/partials/contact.php'; ?>
  </main>

  <?php require __DIR__ . '/partials/footer.php'; ?>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="<?= $asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/php-email-form/validate.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/aos/aos.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/typed.js/typed.umd.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/waypoints/noframework.waypoints.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
  <script src="<?= $asset('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
  <script src="<?= $asset('assets/js/main.js') ?>"></script>

</body>

</html>
