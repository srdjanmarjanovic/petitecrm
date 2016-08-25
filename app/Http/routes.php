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

Route::group(['prefix' => 'contacts'], function () {
    Route::get('import', ['as' => 'contacts.import.form', 'uses' => 'ContactController@showImportForm']);
    Route::post('import', ['as' => 'contacts.import.do_import', 'uses' => 'ContactController@doImport']);
});

Route::resource('contacts', 'ContactController', [
    'names' => [
        'create' => 'contact.create',
        'show' => 'contact.single',
        'index' => 'contacts.all',
        'update' => 'contact.update',
        'edit' => 'contact.edit',
        'store' => 'contact.save',
        'destroy' => 'contact.delete',
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

Route::group(['prefix' => 'contacts', 'middleware' => 'auth'], function () {
    Route::get('company/none', ['as' => 'no_company_contacts', 'uses' => 'ContactsFilterController@filterWithoutCompany']);
    Route::get('company/{id}', ['as' => 'company_contacts', 'uses' => 'ContactsFilterController@filterByCompany']);
    Route::get('tag/none', ['as' => 'no_tag_contacts', 'uses' => 'ContactsFilterController@filterWithoutTags']);
    Route::get('tag/{id}', ['as' => 'tag_contacts', 'uses' => 'ContactsFilterController@filterByTag']);
});

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

Route::resource('tags', 'TagController', [
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

