<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-04
 * Time: 오후 6:56
 */

namespace App\Repositories;

use App\Models\GeoModel;

class GeoRepo{

    private $geo;

    public function __construct(){
        $this->geo = new GeoModel();
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.
    }

    public function create(array $data = array()){
        return $this->geo->create();
    }

}