<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="/resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/resources/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/resources/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/resources/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/resources/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="/resources/styles/gallery.css" rel="stylesheet">

  <?php  include_once('src/layouts/style_dependancies.php') ?>

</head>

<body>

  <?php include_once('src/layouts/header.php') ?>

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Gallery</h2>
          <p>Explore my gallery of memories in China, a visual odyssey where each image unveils the essence of my journey, capturing the vibrant beauty, cultural diversity, and unforgettable moments of this enriching experience.</p>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">SSPU</li>
              <li data-filter=".filter-card">UBN</li>
              <li data-filter=".filter-web">HUAWEI</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title=" I O SSPU"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Huawei Training Center"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="SSPU Meeting"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="SSPU-UNB"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Huawei Training Center"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="SSPU visiting"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="SSPU-UNB-HUAWEI"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="SSPU-UNB-HUAWEI"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="/resources/images/gallery/gallery-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="/resources/images/gallery/gallery-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Huawei meeting"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include_once('src/layouts/footer.php') ?>

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