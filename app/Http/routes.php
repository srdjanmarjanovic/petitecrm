<?php

/*
|--------------------------------------------------------------------------
| Common application routes.
|--------------------------------------------------------------------------    
*/
Route::get('/', function () {
    return view('welcome');
});
Route::auth();
Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Contacts related routes.
|--------------------------------------------------------------------------    
*/
Route::group(['prefix' => 'contacts'], function () {
    // import
    Route::get('import', ['as' => 'contacts.import.form', 'uses' => 'ContactController@showImportForm']);
    Route::post('import', ['as' => 'contacts.import.do_import', 'uses' => 'ContactController@doImport']);

    // filters
    Route::get('company/none', ['as' => 'no_company_contacts', 'uses' => 'ContactsFilterController@filterWithoutCompany']);
    Route::get('company/{id}', ['as' => 'company_contacts', 'uses' => 'ContactsFilterController@filterByCompany']);
    Route::get('tag/none', ['as' => 'no_tag_contacts', 'uses' => 'ContactsFilterController@filterWithoutTags']);
    Route::get('tag/{id}', ['as' => 'tag_contacts', 'uses' => 'ContactsFilterController@filterByTag']);
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

/*
|--------------------------------------------------------------------------
| Companies related routes.
|--------------------------------------------------------------------------    
*/
Route::group(['prefix' => 'companies'], function () {
    // filters
    Route::get('tag/none', ['as' => 'no_tag_companies', 'uses' => 'CompaniesFilterController@filterWithoutTags']);
    Route::get('tag/{id}', ['as' => 'tag_companies', 'uses' => 'CompaniesFilterController@filterByTag']);

    // @TODO implement industries filter
});

Route::resource('companies', 'CompanyController', [
    'names' => [
        'create' => 'company.create',
        'show' => 'company.single',
        'index' => 'companies.all',
        'update' => 'company.update',
        'edit' => 'company.edit',
        'store' => 'company.save',
        'destroy' => 'company.delete',
    ],
    'middleware' => 'auth'
]);

/*
|--------------------------------------------------------------------------
| Lists related routes.
|--------------------------------------------------------------------------    
*/
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

/*
|--------------------------------------------------------------------------
| Tags related routes.
|--------------------------------------------------------------------------    
*/
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

