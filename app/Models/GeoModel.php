<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeoModel extends Model {

    public $timestamps = false;
    protected $table = 'geo_position';
    protected $fillable = [
        'idx',
        'user_idx',
        'map_type',
        'latitude',
        'longitude',
        'wait_time',
        'reg_date',
    ];

    public function getGeoList($userIdx){
        return $this->where('user_idx', $userIdx)->get();
    }

    public function isCreate($data = array()){
        $data['map_type'] = '1';
        $data['wait_time'] = time();
        $data['reg_date'] = $this->getConnection()->raw("NOW()");
        return $this->create($data);
    }

}