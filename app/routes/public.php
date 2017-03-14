<?php
/**
 * Created by PhpStorm.
 * User: 김종갑
 * Date: 2017-02-17
 * Time: 오전 9:57
 */

//public route
$app->group('/', function(){

    $this->get('', function($request, $response){
        return $this->view->render($response, '/api.php');
    });

    $this->get('/upload/{filename}', function($request, $response, $args){
        $filePath = '/uploads/' . date('Y') . '/' . date('m') . '/' . $args['filename'];
        return $this->view->render($response, '/notice/view_page.php', ['image_path'=>$filePath]);
    });

});