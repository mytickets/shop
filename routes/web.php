<?php

use Illuminate\Http\Request;

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);




// Route::get('user/{name}', function ($name) {
//     //
// })->where('name', '[A-Za-z]+');

// Route::get('user/{id}', function ($id) {
//     //
// })->where('id', '[0-9]+');

// Route::get('user/{id}/{name}', function ($id, $name) {
//     //
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('hello', function () {
    return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
});


/**
 * Роуты аутентификации...
 */
// https://laravel.com/docs/6.x/authentication
 
//отображение формы аутентификации
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// //POST запрос аутентификации на сайте
// Route::post('login', 'Auth\LoginController@login');
// //POST запрос на выход из системы (логаут)
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
 
/**
 * Маршруты регистрации...
 */
 
// //страница с формой Laravel регистрации пользователей
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// //POST запрос регистрации на сайте
// Route::post('register', 'Auth\RegisterController@register');
 
/**
 * URL для сброса пароля...
 */
 
// //POST запрос для отправки email письма пользователю для сброса пароля
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// //ссылка для сброса пароля (можно размещать в письме)
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// //страница с формой для сброса пароля
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// //POST запрос для сброса старого и установки нового пароля
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');


// https://harish81.github.io/infyom-schema-generator/

Route::get('/schema_builder', function () {
    return view('schema_builder');
});

// Route::get('/schema_builder', function () {
    // return view('schema_builder');
// });

Route::get('/chartjs', function () {
    return view('lte.charts.chartjs');
});
Route::get('/flot', function () {
    return view('lte.charts.flot');
});
Route::get('/widgets', function () {
    return view('lte.widgets');
});

Route::get('/face_builder', function () {
    return view('addons.face_builder');
});

Route::get('/phpinfo', function () {
    return view('addons.info.phpinfo');
});

Route::get('/session', function (Request $request) {
    return $request->session()->getId();
});


Route::get('/migrate', function () {
    Artisan::call('migrate');
});



Route::get('/import', function (Request $request) {
    return view('import');
    // Artisan::call('make:view '.$request->all()['viewName'].' --extends='.$request->all()['layoutName'].' --section=content');
    // return redirect('/manager');
});
Route::get('/import_run', function (Request $request) {
    return Artisan::call('import:cat');

    // php artisan make:command ImportCat --command=import:cat
    // php artisan make:command ImportProduct --command=import:product
    // php artisan make:command ImportPrice --command=import:price

    // return view('import');
    // Artisan::call('make:view '.$request->all()['viewName'].' --extends='.$request->all()['layoutName'].' --section=content');
    // return redirect('/manager');
});
Route::get('/schemaView', function (Request $request) {
    Artisan::call('make:view '.$request->all()['viewName'].' --extends=layouts.'.pathinfo($request->all()['viewName'])['filename'].' --section=content');
    return redirect('/generator_builder');
});
Route::get('/scrapView', function (Request $request) {
    Artisan::call('scrap:view '.pathinfo($request->all()['viewName'])['filename'].' --force');
    // return Artisan::call('scrap:view '.pathinfo($request->all()['viewName'])['filename'].' --force');
    return redirect('/generator_builder');
});



// Route::get('/cats', 'CatController@index');

// v1/ redirect
Route::get('/api/v1/{model}', function ($model) {
    return redirect('/api/'.$model);
});

Route::post('/api/v1/{model}', function ($model) {
    return redirect('/api/'.$model);
});



Route::get('/api/v1/{model}/{id}', function ($model, $id) {
    return redirect('/api/'.$model.'/'.$id);
});

Route::post('/api/v1/{model}/{id}', function ($model, $id) {
    return redirect('/api/'.$model.'/'.$id);
});


Route::resource('users', 'UserController');
// Route::get('user/{name?}', function ($name = 'John') {
//     return $name;
// });
// Route::resource('users', 'UserController', ['only' => [
//     'index', 'show'
// ]]);

Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');

Route::resource('menus', 'MenuController');


// Route::get('/cats', 'CatController@index');
// Route::get('/cat/{id}', 'CatController@show');
// Route::get('/cats_left', 'CatController@cats_left');
// Route::get('/cats_left/{id}', 'CatController@cats_left');

// Route::get('/products', 'ProductController@index');
// Route::get('/product/{id}', 'ProductController@show');
// Route::get('/product/{id}/to_cart/{qty}', 'ProductController@to_cart');
// Route::get('/product/{id}/remote_images', 'ProductController@remote_images');
// Route::get('/product/{product}/set_main_image/{img_id}', 'ProductController@set_main_image');
// Route::get('/product/{id}/remote_images/{img_id}/remove_image', 'ProductController@remove_image');

// // http://localhost:8000/product/1000072/remote_images

// // Route::get('/product/{id}/remote_images', 'ProductController@set_main_image');
// // $product, $img_url


// 
Route::get('/manager', 'ManagerController@index');
// Route::get('/manager', function () {
    // return view('manager');
// });

Route::get('/administrator', function () {
    return view('administrator');
});


Route::get('/generator', function () {
    return view('generator');
});


Route::get('/show_session', 'AppBaseController@show_session');
// Route::get('/line_item_remove/{id}', 'LineItemController@remove');
// Route::get('/total_cart/{id}', 'CartController@total_cart');
// 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});





Route::resource('cats', 'CatController');
Route::resource('products', 'ProductController');


Route::resource('posts', 'PostController');

