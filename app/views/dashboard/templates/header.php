
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PMB - UNIYAP</title>
  <link rel="icon" href="<?= BASEURL ?>/dist/img/logo.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <!-- Link CSS Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-*" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= BASEURL ?>/dist/css/bootstrap.min.css">
  <!-- Link JavaScript Font Awesome (jika diperlukan) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-*" crossorigin="anonymous"></script>

  <style>

    :root {
      --hijau: #004d40;
      --hijau-secondary: #8acf92;
    }

    body {
      font-family: 'Open Sans', sans-serif;
    }
      .header-image {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      background-color: var(--hijau);
    }

    .header-image img{
      height: 400px;
      width:auto;
    }

    .header-banner {
      flex: 1;
      width: 60%;
      padding-right: 20px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      animation: imgFade 1s forwards ;
      position: relative;
    }

    .header-banner::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      transition: .7s ease-in all;
      cursor: pointer;
    }

    .header-banner:hover::before {
      opacity: .3;
      background-color: var(--hijau);
    

    }

    @keyframes imgFade {
       0% {
        opacity: 0;
        transform: translateX(60%);
       }

       100% {
        opacity: 1;
        transform: translateY(0);
       }
      
    }

    .header-banner img {
      width: 100%;
      height: 100%;
    }

    .header-content {
      flex: 1;
      padding-right: 20px;
      padding-left: 70px;
      color: #fff;
      padding-top: 50px;
    }
    
    .header-content h1 {
      font-size: 45px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    
    .header-content p {
      position: relative;
      font-size: 24px;
    }

    .header-content .fade1::before {
      content: "";
      position: absolute;
      background-color: var(--hijau);
      width: 50%;
      height: 100%;
      animation: fadep 1.5s .5s forwards;

    }

    .header-content .fade2::before {
      content: "";
      position: absolute;
      background-color: var(--hijau);
      width: 100%;
      height: 100%;
      animation: fadep 1s .7s forwards;

    }

    @keyframes fadep {
      0% {
        left: 0;      
      }
      100% {
        left: 100%;
        width: 0;
      }
      
    }


    .navbar {
      background-color: var(--hijau); /* Warna hijau tua */
    }
    
    .navbar-brand {
      display: flex;
      align-items: center;
      font-family: 'Montserrat', sans-serif;
      color: #fff; /* Warna teks putih */
      font-size: 16px;
    }

    .navbar-brand .logo-text {
      display: flex;
      flex-direction: column;
      margin-left: 20px; 
    }
    
    .navbar-brand img {
      max-height: 40px; 
      height: auto;
    }

    .navbar-nav .nav-link {
      color: #fff; /* Warna teks putih */
      animation: linkFade 1.5s forwards;
    }


    @keyframes linkFade {
      0% {
        transform: translateX(100%);
        opacity: 0;
      }

      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    .navbar-nav .nav-link:hover {
      color: yellow;
      /* Warna latar belakang ketika dihover */
    }
    .nav-link {
      position: relative;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 4px;
      background-color: yellow;
      transition: width 0.5s ease;
      visibility: hidden;
    }

    .nav-link:hover::after {
      width: calc(100% + 20px); /* Adjust the value as needed */
      visibility: visible;
    }
    .row{
      margin: 30px 0;
    }
    .login{
      display: flex;
    }
    .container{
      margin-bottom: 70px;
    }
    input[readonly].field{
      background-color:transparent;
      border: 0;
      font-size: 1em;
    }

    .footerbox.col-md-12.text-white {
      padding: 40px 70px;
    }

     @media screen and (max-width: 576px) {

      .footerbox.col-md-12.text-white {
        padding-right: 20px;
        padding-left: 20px;
      }
      
    }

    @media screen and (max-width: 991px)  {

        .header-image {
          align-items: flex-end;
        }
        .header-content {
          padding-top: 100px;
        }

        .header-content p {
          font-size: 20px;
        }

        .header-content h1 {
          font-size: 40px;
        }
    }

    @media screen and (max-width: 756px) {
        .header-banner {
          display: none;
        }
    }

    @media screen and (max-width: 380px ) {
        .header-content {
          padding-right: 20px;
          padding-left: 20px;
        }

        .header-content h1 {
          font-size: 30px;
        }

        .header-content p {
          font-size: 18px;
        }


    }


  </style>
  </head>
  <body>
   <?php require_once('navbar.php') ?>
