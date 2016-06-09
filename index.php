<?php
    require_once __DIR__ . '/loader/loader.php';

    function controller($shortName) {
        list($shortClass, $shortMethod) = explode('/', $shortName, 2);

        return sprintf('Mercdev\UDID\Controller\%sController::%sAction', ucfirst($shortClass), $shortMethod);
    }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/app/views',
    ));

    $app->register(new Silex\Provider\UrlGeneratorServiceProvider());

    $app->get('/', controller('udid/index'))->bind('home');

    $app->get('/fetch/{udid}', controller('udid/fetch'))->bind('fetch');

    $app->error(function (Exception $e, $code) {
        return new Symfony\Component\HttpFoundation\Response('We are sorry, but something went terribly wrong.');
    });

    $app->run();
?>