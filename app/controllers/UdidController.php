<?php

namespace Mercdev\UDID\Controller;

use Mobile_Detect\Mobile_Detect;
use Silex\Application;
use Spyc\Spyc;
use Symfony\Component\HttpFoundation\Request;

class UdidController{
    public function indexAction(Request $request, Application $app){
        $menuRoutes = Spyc::YAMLLoad(ROUTES_YAML_PATH);

        $mobileDetector = new Mobile_Detect();

        if ($mobileDetector->isiOS()){
            return $app['twig']->render('udid/index.html.twig', array(
                'mobileConfigPath' => IOS_MOBILE_CONFIG_PATH,
                'menuRoutes' => $menuRoutes
            ));
        } else {
            return $app['twig']->render('udid/indexDesktop.html.twig', array(
                'menuRoutes' => $menuRoutes
            ));
        }
    }

    public function fetchAction(Request $request, Application $app){
        $menuRoutes = Spyc::YAMLLoad(ROUTES_YAML_PATH);
        $udid = ($request->get('udid')) ? $request->get('udid') : 'unknown';

        return $app['twig']->render('udid/fetch.html.twig', array(
            'udid' => $udid,
            'menuRoutes' => $menuRoutes
        ));
    }
}