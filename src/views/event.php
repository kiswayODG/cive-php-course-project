<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Events</title>

    <link rel="stylesheet" href="/resources/vendor/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="/resources/styles/events.css">

    <link href="/resources/styles/gallery.css" rel="stylesheet">

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

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <?php include_once('src/layouts/header.php') ?>

    <section class="blog section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Events</h2>
                        <p>Get ready for a series of emotionally resonant events as I unveil impactful moments from my journey in China. Join me in experiencing the heartfelt stories, cultural highlights, and poignant events that have made this adventure truly unforgettable.
                        </p>
                    </div>
                </div>
            </div>


            <section class="section" id="event">
                <div class="container text-center">
                    <?php foreach ($events as $event) : ?>
                        <div class="event-card">
                            <div class="event-card-header">
                                <img src="<?php echo 'resources/storage/' . $event->getIllustration(); ?>" class="event-card-img">
                            </div>
                            <div class="event-card-body">
                                <h5 class="event-card-title"><?php echo $event->getTitle(); ?></h5>
                                <p class="event-card-caption">
                                    <b><?php echo $event->getPubDate(); ?></b>
                                </p>
                                <p><?php echo limitWords($event->getContent(), 30); ?></p>
                                <a href=<?php echo "/event-details/" . $event->getId() ?> class="event-card-link">Read more <i class="ti-angle-double-right"></i></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div><
            </section>

            
            <?php include_once('src/layouts/footer.php') ?>
            
</body>

</html>