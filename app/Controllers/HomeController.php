<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-04
 * Time: 오전 10:54
 */

namespace App\Controllers;

class HomeController{

    private $container;
    private $logger;
    private $view;

    public function __construct($container){
        $this->container = $container;
        $this->logger = $this->container->get('logger');
        $this->view = $this->container->get('view');
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.
    }

    public function __invoke($request, $response, $args){
        // TODO: Implement __invoke() method.
        echo 'aaaaaaaaaaaaaa';
    }

    public function index($request, $response, $args){
        echo 'b';
    }

    public function test($request, $response, $args){
        $this->logger->info('aaaaaaaaaaaaaa');
        var_dump($args);
    }

}