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
use Respect\Validation\Validator as v;

class GeoController{

    private $container;
    private $logger;
    private $view;
    private $validator;

    private $geoRepo;

    public function __construct($container){
        $this->container = $container;
        $this->logger = $this->container->get('logger');
        $this->view = $this->container->get('view');
        $this->validator = $this->container->get('validator');

        $this->geoRepo = new GeoRepo();
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.
    }

    public function create(Request $request, Response $response, $args){

        $validation = $this->validator->validate($request, [
            //'email' => v::noWhitespace()->notEmpty(),
            'user_Id' => v::noWhitespace()->notEmpty()->alpha(),
            'user_pwd' => v::noWhitespace()->notEmpty(),
        ]);

        if($validation->failed()){
            return $response->withRedirect('/');
        }

        $data = array(
            'user_id' => '33333',
            'user_pwd' => '1111',
            'user_name' => '123123123',
            'token' => '',
            'level' => '1'
        );
        $data = $this->geoRepo->create($data);
        //var_dump($data);
        return json_encode($data);
    }

}