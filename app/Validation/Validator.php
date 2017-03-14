<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-05
 * Time: 오전 11:52
 */

namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator{

    public function validate($request, array $rules){
        foreach($rules as $field => $rule){
            try{
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            }catch(NestedValidationException $e){
                $this->errors[$field] = $e->getMessage();
            }
        }
        return $this;
    }

    public function failed(){
        return !empty($this->errors);
    }

}