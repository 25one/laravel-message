<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::name('apimessages')->middleware('auth:api')->resource('apimessages', 'Back\ApiController'); 

Route::name('activation')->middleware('auth:api')->get('activation', //!!!get + auth:api + callback-function
function (App\Models\User $model_user) {
        $user = $model_user->find(\Auth::guard('api')->user()->id);
        $user->active = 1;
        $user->save();
        return redirect(route('login'));
}
);

//Route::name('apimessages')->resource('apimessages', 'Back\ApiController'); 

