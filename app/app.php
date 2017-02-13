<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/TitleCaseGenerator.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'));

        $app->get('view-title-case', function() use ($app) {
            $my_TitleCaseGenerator = new TitleCaseGenerator;
            $title_cased_phrase = $my_TitleCaseGenerator->makeTitleCase($_GET['phrase']);
            return $app['twig']->render('title_cased.html.twig', array('result' => $title_cased_phrase));
        });
 ?>
