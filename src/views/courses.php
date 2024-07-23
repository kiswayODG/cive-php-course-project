<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>course</title>


    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/resources/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/styles/font-awesome.min.css">
    <link rel="stylesheet" href="/resources/styles/owl-carousel.css">

    <link rel="stylesheet" href="/resources/styles/normalize.css">
    <link rel="stylesheet" href="/resources/styles/style.css">
    <link rel="stylesheet" href="/resources/styles/responsive.css">

    <?php include_once( 'src/layouts/style_dependancies.php') ?>

</head>

<body>

    <?php include_once('src/layouts/header.php') ?>

    <section class="blog section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Courses teaching during the journey.</h2>
                        <img src="/resources/images/section-title-bg.png" alt="#">
                        <p>Embark on an educational journey with my courses, where each module unfolds a nuanced understanding of the intricacies encountered during my time in China. Delve into insightful lessons that explore cultural nuances, linguistic expressions, and practical experiences, offering a comprehensive learning experience from this enriching venture.</p>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <?php if (isset($sspucourses) && !empty($sspucourses)) : ?>
                    <?php foreach ($sspucourses as $course) : ?>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single course -->
                            <div class="single-news">
                                <div class="news-head">
                                    <img src="/resources/images/courses/sspu.jpeg" alt="#">
                                </div>
                                <div class="news-body">
                                    <div class="news-content">
                                        <h2><a href="<?php echo '/course-details/'.$course->getId() ?>"><?php echo $course->getCourseName(); ?></a></h2>
                                        <p> <a href="<?php echo '/course-details/'.$course->getId() ?>">Know more</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No courses available provide by SSPU.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <div class="clients overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="owl-carousel clients-slider">
                        <?php
                        $images = [
                            "/resources/images/courses/sspu.jpeg",
                            "/resources/images/courses/a.jpeg",
                            "/resources/images/courses/sspu.jpeg",
                            "/resources/images/courses/a.jpeg",
                            "/resources/images/courses/sspu.jpeg",
                            "/resources/images/courses/a.jpeg",
                            "/resources/images/courses/sspu.jpeg",
                            "/resources/images/courses/a.jpeg",
                        ];

                        foreach ($images as $image) : ?>
                            <div class="single-clients">
                                <img src="<?php echo $image; ?>" alt="#">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="blog section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Huawei Training Courses.</h2>
                        <img src="/resources/images/section-title-bg.png" alt="#">
                    </div>
                </div>
            </div>

            <div class="row">
                <?php if (isset($huaweiCourses) && !empty($huaweiCourses)) : ?>
                    <?php foreach ($huaweiCourses as $course) : ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single course -->
                            <div class="single-news">
                                <div class="news-head">
                                    <img src="/resources/images/courses/a.jpeg" alt="#">
                                </div>
                                <div class="news-body">
                                    <div class="news-content">
                                        <h2><a href="<?php echo '/course-details/'.$course->getId() ?>"><?php echo $course->getCourseName(); ?></a></h2>
                                        <p> <a href="<?php echo '/course-details/'.$course->getId() ?>">Know more</a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No courses available provide by Huawei.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    

    <?php include_once( 'src/layouts/footer.php') ?>

    <script src="/resources/js/jquery.min.js"></script>
    <script src="/resources/js/jquery-migrate-3.0.0.js"></script>
    <script src="/resources/js/easing.js"></script>
    <script src="/resources/js/slicknav.min.js"></script>
    <script src="/resources/js/jquery.scrollUp.min.js"></script>
    <script src="/resources/js/niceselect.js"></script>
    <script src="/resources/js/owl-carousel.js"></script>
    <script src="/resources/js/jquery.counterup.min.js"></script>
    <script src="/resources/js/steller.js"></script>
    <script src="/resources/js/wow.min.js"></script>
    <script src="/resources/js/jquery.magnific-popup.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="/resources/js/main.js"></script>
</body>

</html>