<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('contacts', 'ContactController', [
    'names' => [
        'create' => 'contact.create',
        'show' => 'contact.single',
        'index' => 'contacts.all',
        'update' => 'contact.update',
        'edit' => 'contact.edit',
        'store' => 'contact.save',
    ],
    'middleware' => 'auth'
]);

Route::resource('companies', 'CompanyController', [
    'names' => [
        'create' => 'company.create',
        'show' => 'company.single',
        'index' => 'companies.all',
        'update' => 'company.update',
        'edit' => 'company.edit',
        'store' => 'company.save',
    ],
    'middleware' => 'auth'
]);

Route::resource('lists', 'ListController', [
    'names' => [
        'create' => 'list.create',
        'show' => 'list.single',
        'index' => 'lists.all',
        'update' => 'list.update',
        'edit' => 'list.edit',
        'store' => 'list.save',
    ],
    'middleware' => 'auth'
]);

Route::resource('tags', 'TagsController', [
    'names' => [
        'create' => 'tag.create',
        'show' => 'tag.single',
        'index' => 'tags.all',
        'update' => 'tag.update',
        'edit' => 'tag.edit',
        'store' => 'tag.save',
    ],
    'middleware' => 'auth'
]);
