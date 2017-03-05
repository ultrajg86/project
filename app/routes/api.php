<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-17
 * Time: 오전 9:58
 */

//api route
$app->group('/api', function(){

    $this->get('', function($request, $response){
        return $this->view->render($response, '/index.php');
    });

    $this->group('/users', function(){

        $this->get('/test', function($request, $response){
            return $this->view->render($response, '/index.php');
        });

        $this->post('', 'UsersController:create');

    });

    $this->group('/geo', function(){

        $this->get('', function($request, $response){
            var_dump($request->getBody());
        });

        $this->post('', 'GeoController:create');

        $this->post('/test', function($request, $response){
            var_dump($request->getBody());
        });

    });

});


/*
$app->group('/api', function(){

    $this->get('', 'HomeController:index');

    $this->get('/test', function ($request, $response){
        $data = array('name' => 'Rob', 'age' => 40);
        $newResponse = $response->withJson($data, 200);
        return $newResponse;
    });

});
*/