<?php

namespace App\Http\Controllers\Api;
use App\http\Controllers\Controller;
use Request;
class UserController extends Controller
{
    public function __construct(){}
    public function hello()
    {
        $field = [
            'name'        => null,
            'sex'      => null,
            'age'  => null,
        ];
        dump($this->getParamAll($field));
        return $this->response->array([1,2,3]);
    }

}