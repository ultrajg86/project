<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-04
 * Time: 오후 6:35
 */

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
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

    public function lists(Request $request, Response $response, $args){
            $data = $this->geoRepo->fetch($args['idx']);
            return $response->withJson($data);
    }

    public function create(Request $request, Response $response, $args){

        try{

            $validation = $this->validator->validate($request, [
                'user_idx'  =>  v::notEmpty(),
                'lat'       =>  v::notEmpty(),
                'long'      =>  v::notEmpty(),
                //'wait'      =>  v::notEmpty(),
            ]);

            if($validation->failed()){
                throw new \Exception(serialize($validation->errors));
            }

            $validation_data = $this->validator->getJsonData();

            foreach($validation_data as $key=>$value){
                $this->logger->addInfo('[' . __METHOD__ . ']' . $key . '=' . $value);
            }

            $data = array(
                'user_idx'  =>  $validation_data['user_idx'],
                'latitude'  =>     $validation_data['lat'],
                'longitude'  =>     $validation_data['long'],
            );

            $data = $this->geoRepo->create($data);
            return json_encode($data);

        }catch(\Exception $e){
            //$result = array('msg'=>$e->getMessage());
            //return json_encode(unserialize($e->getMessage()));
            return json_encode(false);
        }


    }

}