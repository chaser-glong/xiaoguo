<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**Dingo use */
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace'=>'App\Http\Controllers\Api'], function ($api) {
        $api->group(['middleware'=>'jwt.auth'],function($api){
        // Endpoints registered here will have the "foo" middleware applied.
        $api->post('users/hello', ['as' => 'age','uses' => 'UserController@hello']);
        $api->any('url',function(){
            return app('Dingo\Api\Routing\UrlGenerator')->version('v1')->route('age');
        });
       
        });

        //该路由获得token
        $api->post('user/login','UserController@authenticate');
        $api->post('user/register','UserController@register');

    });
    
    // $api->get('test', function () {
    //     return 'It is ok';
    // });
});

// Route::get('/users', function () {
//     return 1111;
// });
