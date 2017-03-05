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


        //var_dump($request->getBody());



        var_dump($args);

        try{

            $validation = $this->validator->validate($request, [
                'user_idx'  =>  v::notEmpty()->intType(),
                'lat'       =>  v::notEmpty()->floatType(),
                'long'      =>  v::notEmpty()->floatType(),
                'wait'      =>  v::notEmpty()->intType(),
            ]);

            if($validation->failed()){
                throw new \Exception(serialize($validation->errors));
            }

            $data = array(

            );

            $data = $this->geoRepo->create($data);
            return json_encode($data);

        }catch(\Exception $e){
            //$result = array('msg'=>$e->getMessage());
            return json_encode(unserialize($e->getMessage()));
        }


    }

}