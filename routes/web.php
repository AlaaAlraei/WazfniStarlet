<?php

Route::redirect('/home', '/admin');
Auth::routes(['register' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/promote', 'PromoteController@index')->name('promote');
Route::get('/term', 'TermController@index')->name('term');
Route::get('/my-profile', 'ProfileController@MyProfile')->name('MyProfile');
Route::get('/BusinessProfile', 'ProfileController@BusinessProfile')->name('BusinessProfile');
Route::post('/Register', 'ProfileController@Register')->name('Register');
Route::get('/company-profile/{company}', 'ProfileController@CompanyProfile')->name('CompanyProfile');
Route::get('/profile/{user}', 'ProfileController@profile')->name('profile');
Route::post('/client-login', 'ClientLoginController@index')->name('clientLogin');
Route::get('search', 'HomeController@search')->name('search');
Route::get('GetAllJobs', 'JobController@GetAllJobs')->name('GetAllJobs');
Route::get('GetByCategoriesJobs/{category}', 'JobController@GetByCategoriesJobs')->name('GetByCategoriesJobs');
Route::get('SearchByCountry', 'JobController@SearchByCountry')->name('SearchByCountry');
Route::get('GetAllJobsByCountry', 'JobController@GetAllJobsByCountry')->name('GetAllJobsByCountry');
Route::get('GetByCategoriesJobsByCountry/{category}', 'JobController@GetByCategoriesJobsByCountry')->name('GetByCategoriesJobsByCountry');
Route::get('SearchByTyping', 'JobController@SearchByTyping')->name('SearchByTyping');
Route::get('GetAllJobsByTyping', 'JobController@GetAllJobsByTyping')->name('GetAllJobsByTyping');
Route::get('GetByCategoriesJobsByTyping/{category}', 'JobController@GetByCategoriesJobsByTyping')->name('GetByCategoriesJobsByTyping');
Route::post('jobs/media', 'JobController@storeMedia')->name('jobs.storeMedia');
Route::resource('jobs', 'JobController');
Route::get('category/{category}', 'CategoryController@show')->name('categories.show');
Route::get('location/{location}', 'LocationController@show')->name('locations.show');

Route::put('/profile/UpdateGeneralEmployeeProfile', 'ProfileController@UpdateGeneralEmployeeProfile')->name('profile.UpdateGeneralEmployeeProfile');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoriesController@storeMedia')->name('categories.storeMedia');
    Route::resource('categories', 'CategoriesController');

    // Locations
    Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
    Route::resource('locations', 'LocationsController');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
    Route::resource('companies', 'CompaniesController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::post('jobs/media', 'JobsController@storeMedia')->name('jobs.storeMedia');
    Route::resource('jobs', 'JobsController');

    // Advertisings
    Route::delete('advertisings/destroy', 'AdvertisingController@massDestroy')->name('advertisings.massDestroy');
    Route::post('advertisings/media', 'AdvertisingController@storeMedia')->name('advertisings.storeMedia');
    Route::resource('advertisings', 'AdvertisingController');

    // Country
    Route::delete('countries/destroy', 'CountryController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountryController');

    // Types
    Route::delete('types/destroy', 'TypeController@massDestroy')->name('types.massDestroy');
    Route::resource('types', 'TypeController');

    // Subscriptions
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionController');

    // SubscriptionTypes
    Route::delete('subscription_types/destroy', 'SubscriptionTypeController@massDestroy')->name('subscription_types.massDestroy');
    Route::resource('subscription_types', 'SubscriptionTypeController');

    // Features
    Route::delete('features/destroy', 'FeatureController@massDestroy')->name('features.massDestroy');
    Route::resource('features', 'FeatureController');

});
