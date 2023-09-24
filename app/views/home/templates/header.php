<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PMB - UNIYAP</title>
  <link rel="icon" href="img/logo.ico">
  <link rel="stylesheet" href="<?= BASEURL ?>/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
   <!-- Link CSS Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" />

  <!-- Link JavaScript Font Awesome (jika diperlukan) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-***" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= BASEURL ?>/dist/css/style.css">
  <style>
    <?php if ($_SERVER['REQUEST_URI'] == "/public/"): ?>
      .navbar-nav .nav-item:first-child .nav-link {
        color: yellow;
      }
    <?php elseif ($_SERVER['REQUEST_URI'] == "/public/home/prodi"): ?>
      .navbar-nav .nav-item:nth-child(2) .nav-link {
        color: yellow;
      }
    <?php endif ?>
  </style>
</head>
<body>
    <?php require_once('navbar.php') ?>