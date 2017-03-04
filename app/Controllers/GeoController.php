<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-04
 * Time: 오후 6:35
 */

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Repositories\GeoRepo;

class GeoController{

    private $container;
    private $logger;
    private $view;

    private $geoRepo;

    public function __construct($container){
        $this->container = $container;
        $this->logger = $this->container->get('logger');
        $this->view = $this->container->get('view');

        $this->geoRepo = new GeoRepo();
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.
    }

    public function create(Request $request, Response $response, $args){
        $data = $this->geoRepo->create(array());
        var_dump($data);
        return json_encode(array('true'=>'a'));
    }

}