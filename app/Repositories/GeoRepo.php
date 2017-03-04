<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-04
 * Time: 오후 6:56
 */

namespace App\Repositories;

use App\Models\GeoModel;
use Illuminate\Database\Capsule\Manager as DB;

class GeoRepo{

    private $geo;

    public function __construct(){
        $this->geo = new GeoModel();
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.
    }

    public function create(array $data = array()){
        $result = $this->geo->isCreate(
            [
                'user_id'=>'tester' . rand(1, 100),
                'user_pwd'=> '1111',
                'user_name'=>'관리자1',
                'token'=>'',
                'level'=>'1',
                'reg_date'=>date('Y-m-d H:i:s')
            ]
        );
        return $this->geo->getFind();
    }

}