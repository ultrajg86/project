<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeoModel extends Model {

    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = [
        'idx',
        'user_id',
        'user_pwd',
        'user_name',
        'token',
        'level',
        'reg_date'
    ];

    public function isCreate($data = array()){
        $data['user_pwd'] = $this->getConnection()->raw("password('" . $data['user_pwd'] . "')");
        $data['reg_date'] = $this->getConnection()->raw("NOW()");
        return $this->create($data);
    }

}