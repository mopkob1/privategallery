<?php
/**
 * Created by PhpStorm.
 * User: Максим В. Янушев
 * Date: 14.07.15
 * Time: 21:08
 */

namespace Controllers;


use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class homepage {
    public function Index(Request $request,Application $app){
        //$reader=\PHPExif\Reader\Reader::factory(\PHPExif\Reader\Reader::TYPE_NATIVE);
        /*$a=$reader->read();
        $exif=\PHPExif\Exif::*/

        return $app['twig']->render('index.html.twig', array());
    }
    public function Admin(Request $request,Application $app){
        return $app['twig']->render('admin.html.twig', array("text"=>"Текст для админ-панели"));
    }
    public function Login(Request $request,Application $app){
        $params=array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        );

        return $app['twig']->render('login.html.twig', $params);
    }
} 