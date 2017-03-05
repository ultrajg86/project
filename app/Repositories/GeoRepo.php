<?php

namespace App\Repositories;

use App\Models\GeoModel;
use Illuminate\Database\QueryException;

class GeoRepo{

    private $geo;

    public function __construct(){
        $this->geo = new GeoModel();
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.
    }

    public function create(array $data = array()){
        $result = false;
        try{
            $result = $this->geo->isCreate($data);
            if($result){

            }
        }catch(QueryException $e){
            var_dump($e->getMessage());
            $result = false;
        }finally{

        }
        return $result;
    }

}