<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-05
 * Time: 오후 4:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model {

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

    public function getFetch($userId){
        return $this->where('user_id', $userId)->first();
    }

}