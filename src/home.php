<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <?php include_once('src/layouts/style_dependancies.php') ?>
</head>

<body>
    <?php include_once('src/layouts/header.php') ?>

    <?php include_once('src/layouts/slider.php') ?>



    <section class="portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Recent news</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel portfolio-slider">

                    <?php
                    foreach ($recent_news as $news) {
                        echo '<div class="single-pf">';
                        echo '<h4>' . $news->getTitle() . '</h4>';
                        echo '<img height:"200px" src="resources/storage/' . $news->getIllustration() . '" alt="#">';
                        echo '<p>' . limitWords($news->getContent(), 50) . '...</p>';
                        echo '<a href="portfolio-details.html" class="btn">View Details</a>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
function limitWords($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
?>

    <?php include_once('src/layouts/footer.php') ?>
</body>
<?php include_once('src/layouts/js_scripts_dependancies.php') ?>

</html>