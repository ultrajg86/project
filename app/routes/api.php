<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-17
 * Time: 오전 9:58
 */

//api route
$app->get('/api', 'HomeController:index');
$app->get('/api/geo', 'GeoController:create');

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