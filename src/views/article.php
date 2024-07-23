<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Article</title>


    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/resources/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/styles/font-awesome.min.css">
    <link rel="stylesheet" href="/resources/styles/owl-carousel.css">

    <link rel="stylesheet" href="/resources/styles/normalize.css">
    <link rel="stylesheet" href="/resources/styles/style.css">
    <link href="/resources/styles/gallery.css" rel="stylesheet">
    <link rel="stylesheet" href="/resources/styles/responsive.css">

    <?php
    function limitWords($string, $word_limit, $ellipsis = '.....')
    {
        $words = explode(" ", $string);
        $limitedWords = array_splice($words, 0, $word_limit);
        $limitedText = implode(" ", $limitedWords);

        if (count($words) > $word_limit) {
            $limitedText .= $ellipsis;
        }

        return $limitedText;
    }
    ?>
    <?php include_once('src/layouts/style_dependancies.php') ?>

</head>

<body>

    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/src/layouts/header.php') ?>

    <section class="blog section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2> Articles.</h2>
                        <p>Stay Informed with us ! Dive into a collection of articles chronicling my journey in China, each piece weaving a narrative that unveils the vibrant landscapes, cultural diversity, and unforgettable moments encountered during this enriching experience.</p>
                    </div>
                </div>
            </div>

            <?php
            $articleCount = 0;
            foreach ($articles as $news) {
                if ($articleCount % 3 === 0) {
                    echo '<div class="row">';
                }
            ?>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-news">
                        <div class="news-head">
                            <img src="<?php echo 'resources/storage/' . $news->getIllustration(); ?>" alt="#">
                        </div>
                        <div class="news-body">
                            <div class="news-content">
                                <div class="date"><?php echo $news->getPubDate(); ?></div>
                                <h2><a href=<?php echo "/article-details/".$news->getId()?>> <?php echo $news->getTitle(); ?></a></h2>
                                <p class="text"><?php echo limitWords($news->getContent(), 20); ?></p>
                            </div>
                        </div>
                    </div>

                </div>

            <?php
                if ($articleCount % 3 === 2 || $articleCount === count($articles) - 1) {
                    echo '</div>';
                }

                $articleCount++;
            }
            ?>

        </div>
    </section>

    <?php include_once('src/layouts/footer.php') ?>

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