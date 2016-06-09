<?php
    define('IOS_MOBILE_CONFIG_PATH', 'http://udid.mercdev.com/config/ios.mobileconfig');
    define('ROUTES_YAML_PATH', __DIR__.'/../config/routes.yaml');

    require_once __DIR__.'/../lib/vendor/silex/vendor/autoload.php';

    $directories = array(
        __DIR__ . '/../app/controllers/',
        __DIR__ . '/../lib/vendor/spyc/',
        __DIR__ . '/../lib/vendor/mobileDetect/'
    );

    foreach ($directories as $directory) {
        foreach(glob($directory . "*.php") as $file) {
            require_once $file;
        }
    }
?>