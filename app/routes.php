<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-14
 * Time: 오전 10:45
 */

require 'Routes/public.php';
require 'Routes/admin.php';
require 'Routes/api.php';

// Render Twig template in route
//$app->get('/hello/{name}', function ($request, $response, $args) {
//    return $this->view->render($response, 'profile.php', [
//        'name' => $args['name']
//    ]);
//})->setName('profile');
