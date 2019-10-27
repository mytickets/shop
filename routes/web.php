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

Route::get('/', function () {
    return view('welcome');
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


