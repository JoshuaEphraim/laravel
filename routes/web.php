<?php

Route::get('/', ['as' => 'site', 'uses' => 'SiteController@main']);
Route::post('site/ajax_sites_comments', 'SiteController@sites_comments');
Route::post('site/ajax_main_traffic', 'SiteController@main_traffic');
Route::get('directory/{country?}/{rate?}/{page?}',['as' => 'directory', 'uses' => 'DirectoryController@main']);
Route::post('directory/ajax_directory_selector','DirectoryController@directory_selector');
Route::post('directory/ajax_directory_domains','DirectoryController@directory_domains');
Route::get('/featured', ['as' => 'featured', 'uses' => 'FeaturedController@main']);
Route::post('/featured/ajax_directory_domains', 'FeaturedController@directory_domains');

Route::get('/blog', ['as' => 'blog', 'uses' => 'BlogController@main']);
Route::get('/about', ['as' => 'about', 'uses' => 'AboutController@main']);
Route::get('/{domain}', 'DomainController@main');





