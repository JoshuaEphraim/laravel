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

Route::get('/', 'SiteController@main');
Route::get('/directory', 'DirectoryController@main');
Route::get('/featured', 'FeaturedController@main');
Route::get('/blog', 'BlogController@main');
Route::get('/about', 'AboutController@main');
Route::post('/ajax_sites_comments', 'SiteController@sites_comments');
Route::post('/ajax_main_traffic', 'SiteController@main_traffic');
Route::post('/featured/ajax_directory_domains', 'FeaturedController@directory_domains');


