<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Projects
Route::resource('projects', 'ProjectController')->except(['destroy']);

// User Access
Route::get('projects/{project}/user_access', 'ProjectController@showUserAccess')
    ->name('projects.user_access.index');
Route::get('projects/{project}/user_access/{user}', 'ProjectController@editUserAccess')
    ->name('projects.user_access.edit');

Route::post('projects/{project}/user_access/{user}', 'ProjectController@updateUserAccess')
    ->name('projects.user_access.update');

// Event types
Route::resource('event_types', 'EventTypeController')->only(['index', 'store', 'create']);

// Events
Route::resource('projects.events', 'EventController')->except(['destroy']);
