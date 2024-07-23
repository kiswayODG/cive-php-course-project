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

    <section class="blog section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Stay Informed with Recent Articles.</h2>
                        <p>Explore the latest insights and updates in the world of Luban as we keep you informed with our recent articles, providing valuable information and exciting content</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <?php

                foreach ($recent_news as $news) {
                ?>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-news">
                            <div class="news-head">
                                <!-- Assurez-vous que l'attribut src contient le chemin correct de l'illustration -->
                                <img src="<?php echo 'resources/storage/' . $news->getIllustration(); ?>" alt="#">
                            </div>
                            <div class="news-body">
                                <div class="news-content">
                                    <div class="date"><?php echo $news->getPubDate(); ?></div>
                                    <h2><a href="#"><?php echo $news->getTitle(); ?></a></h2>
                                    <p class="text"><?php echo  limitWords($news->getContent(), 20); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </section>




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
    <?php include_once('src/layouts/footer.php') ?>
</body>
<?php include_once('src/layouts/js_scripts_dependancies.php') ?>

</html>