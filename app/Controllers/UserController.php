<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-05
 * Time: 오후 4:29
 */

namespace App\Controllers;

use App\Repositories\UserRepo;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Repositories\GeoRepo;
use Respect\Validation\Validator as v;

class UsersController{

    private $container;
    private $logger;
    private $view;
    private $validator;

    private $userRepo;

    public function __construct($container){
        $this->container = $container;
        $this->logger = $this->container->get('logger');
        $this->view = $this->container->get('view');
        $this->validator = $this->container->get('validator');

        $this->userRepo = new UserRepo();
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

        $data = $this->userRepo->create($data);
        //var_dump($data);
        return json_encode($data);
    }

}