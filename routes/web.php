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
Route::post('site/ajax_sites_comments', 'SiteController@sites_comments');
Route::post('site/ajax_main_traffic', 'SiteController@main_traffic');
Route::get('directory/{country?}/{rate?}/{page?}','DirectoryController@main');
Route::post('directory/ajax_directory_selector','DirectoryController@directory_selector');
Route::post('directory/ajax_directory_domains','DirectoryController@directory_domains');
Route::get('/featured', 'FeaturedController@main');
Route::get('/blog', 'BlogController@main');
Route::get('/about', 'AboutController@main');



