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
    // $api->group(['middleware' => 'foo'], function ($api) {
    //     // Endpoints registered here will have the "foo" middleware applied.
    // });
    $api->post('users', 'App\Http\Controllers\Api\UserController@hello');
    // $api->get('test', function () {
    //     return 'It is ok';
    // });
});

// Route::get('/users', function () {
//     return 1111;
// });
