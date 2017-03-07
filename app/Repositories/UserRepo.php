<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-05
 * Time: 오후 4:32
 */

namespace App\Repositories;

use App\Models\UserModel;

class UserRepo{

    private $user;

    public function __construct(){
        $this->user = new UserModel();
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.
    }

    public function create(array $data = array()){
        $result = false;
        try{
            $result = $this->user->isCreate($data);
        }catch(QueryException $e){
            var_dump($e->getMessage());
            $result = false;
        }finally{

        }
        return $result;
    }

}