<?php

namespace App\Http\Controllers;

use Request;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * 需要trait helpers来通过dingo访问控制器
     */
    use Helpers;
    use HasApiTokens, Notifiable;

    public function getParamAll($field)
    {
        $paramAll = Request::all();
        return array_merge($field, array_intersect_key($paramAll, $field));
    }
}
