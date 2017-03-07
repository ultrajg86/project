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

    private $arrayJson;

    public function validate($request, array $rules){
        $json = $request->getBody()->getContents();
        if($json){
            $this->arrayJson = json_decode($json, true);
            return $this->jsonValidate($this->arrayJson, $rules);
        }else{
            return $this->requestValidate($request, $rules);
        }
    }

    private function requestValidate($request, array $rules){
        foreach($rules as $field => $rule){
            try{
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            }catch(NestedValidationException $e){
                $this->errors[$field] = $e->getMessage();
            }
        }
        return $this;
    }


    public function jsonValidate($arrayData, array $rules){

        foreach($rules as $field => $rule){
            try{
                $rule->setName(ucfirst($field))->assert($arrayData[$field]);
            }catch(NestedValidationException $e){
                $this->errors[$field] = $e->getMessage();
            }
        }
        return $this;
    }

    public function failed(){
        return !empty($this->errors);
    }

    public function getJsonData(){
        return $this->arrayJson;
    }

}