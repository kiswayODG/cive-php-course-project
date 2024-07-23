<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Course Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="/resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/resources/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/resources/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/resources/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/resources/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="/resources/styles/gallery.css" rel="stylesheet">
   <?php  include_once($_SERVER['DOCUMENT_ROOT'] .'/src/layouts/style_dependancies.php') ?>
 
</head>

<body>

  <?php include_once($_SERVER['DOCUMENT_ROOT'] .'/src/layouts/header.php') ?>

  <main id="main">

    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              

                <div class="swiper-slide">
                  <img src="/resources/images/gallery/gallery-4.jpg" alt="">
                </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Course information</h3>
              <ul>
                <li><strong>Course Name</strong>: <?php echo $course->getCourseName()?></li>
                <li><strong>Provider</strong>: <?php echo $course->getProvider()?></li>
                <li><strong>Introduction</strong>: <?php echo $course->getCourseIntroduction()?></li>
                <li><a href="<?php echo'/resources/storage/'.($course->getDocument()?$course->getDocument()->getDocs():'#')   ?>"<strong>Get course &nbsp;<i class="fas fa-download"></i></strong></a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Course outline</h2>
              <p>
                <?php echo $course->getOutline(); ?>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>
  <

  <?php include_once($_SERVER['DOCUMENT_ROOT'] .'/src/layouts/footer.php') ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="/resources/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/resources/vendor/aos/aos.js"></script>
  <script src="/resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/resources/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/resources/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/resources/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/resources/vendor/php-email-form/validate.js"></script>

  <script src="/resources/js/gallery.js"></script>

</body>

</html>