

//video Resources
/********************* video ***********************************************/
Route::resource('video','\App\Http\Controllers\VideoController');
Route::post('video/{id}/update','\App\Http\Controllers\VideoController@update');
Route::get('video/{id}/delete','\App\Http\Controllers\VideoController@destroy');
Route::get('video/{id}/deleteMsg','\App\Http\Controllers\VideoController@DeleteMsg');
/********************* video ***********************************************/

