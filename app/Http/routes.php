

//video Resources
/********************* video ***********************************************/
Route::resource('video','\App\Http\Controllers\VideoController');
Route::post('video/{id}/update','\App\Http\Controllers\VideoController@update');
Route::get('video/{id}/delete','\App\Http\Controllers\VideoController@destroy');
Route::get('video/{id}/deleteMsg','\App\Http\Controllers\VideoController@DeleteMsg');
/********************* video ***********************************************/


//video_category Resources
/********************* video_category ***********************************************/
Route::resource('video_category','\App\Http\Controllers\Video_categoryController');
Route::post('video_category/{id}/update','\App\Http\Controllers\Video_categoryController@update');
Route::get('video_category/{id}/delete','\App\Http\Controllers\Video_categoryController@destroy');
Route::get('video_category/{id}/deleteMsg','\App\Http\Controllers\Video_categoryController@DeleteMsg');
/********************* video_category ***********************************************/


//video_format Resources
/********************* video_format ***********************************************/
Route::resource('video_format','\App\Http\Controllers\Video_formatController');
Route::post('video_format/{id}/update','\App\Http\Controllers\Video_formatController@update');
Route::get('video_format/{id}/delete','\App\Http\Controllers\Video_formatController@destroy');
Route::get('video_format/{id}/deleteMsg','\App\Http\Controllers\Video_formatController@DeleteMsg');
/********************* video_format ***********************************************/

