<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PERLEO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="./img/perle/perle.png" rel="icon">
  <link href="./img//perle/perle.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="./vendor/aos/aos.css" rel="stylesheet">
  <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="./vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="./css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Dewi
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('layouts.header')

  {{ $slot }}

  @include('layouts.footer')

  <!-- Vendor JS Files -->
  <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="./js/main.js"></script>

</body>

</html>