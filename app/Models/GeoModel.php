<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-04
 * Time: 오후 6:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeoModel extends Model{

    public $timestamps = false;

    protected $table = 'users';
    protected $fillable = [
        'user_id',
        'user_pwd',
        'user_name',
        'token',
        'level',
        'reg_date'
    ];

    public function isCreate($data){
        $data['user_pwd'] = $this->getConnection()->raw("password('" . $data['user_pwd'] . "')");
        return $this->create($data);
    }

    public function getFind(){
        return $this->where('user_id', 'admin')->first();
    }

}