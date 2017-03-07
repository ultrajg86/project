<?php

namespace App\Repositories;

use App\Models\GeoModel;
use App\Models\UserModel;
use Illuminate\Database\QueryException;

class GeoRepo{

    private $geo;
    private $user;

    public function __construct(){
        $this->geo = new GeoModel();
        $this->user = new UserModel();
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.
    }

    public function fetch($userIdx){
        return $this->geo->getGeoList($userIdx);
    }

    public function create(array $data = array()){
        $result = false;
        try{

            $tmpResult = $this->user->getFetchIdx($data['user_idx']);
            if(empty($tmpResult)){
                throw new \Exception('');
            }

            $result = $this->geo->isCreate($data);
        }catch(QueryException $e){
            //var_dump($e->getMessage());
            $result = false;
        }catch(Exception $e){
            $result = false;
        }finally{

        }
        return $result;
    }

}