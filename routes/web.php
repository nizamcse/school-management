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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/**
 * CLASS
 */

Route::get('classes',[
    'uses'  => 'Master\ClassController@index',
    'as'    => 'classes'
]);

Route::post('class',[
    'uses'  => 'Master\ClassController@store',
    'as'    => 'create-class'
]);

Route::get('delete/class/{id}',[
    'uses'  => 'Master\ClassController@delete',
    'as'    => 'delete-class'
]);

/**
 * Section
 */

Route::get('sections',[
    'uses'  => 'Master\SectionController@index',
    'as'    => 'sections'
]);

Route::post('section',[
    'uses'  => 'Master\SectionController@store',
    'as'    => 'create-section'
]);

Route::get('delete/section/{id}',[
    'uses'  => 'Master\SectionController@delete',
    'as'    => 'delete-section'
]);

/**
 * Designation
 */

Route::get('designations',[
    'uses'  => 'Master\DesignationController@index',
    'as'    => 'designations'
]);

Route::post('designation',[
    'uses'  => 'Master\DesignationController@store',
    'as'    => 'create-designation'
]);

Route::get('delete/designation/{id}',[
    'uses'  => 'Master\DesignationController@delete',
    'as'    => 'delete-designation'
]);

/**
 * Degree
 */

Route::get('degrees',[
    'uses'  => 'Master\DegreeController@index',
    'as'    => 'degrees'
]);

Route::post('degree',[
    'uses'  => 'Master\DegreeController@store',
    'as'    => 'create-degree'
]);

Route::get('delete/degree/{id}',[
    'uses'  => 'Master\DegreeController@delete',
    'as'    => 'delete-degree'
]);


/**
 * Subject
 */

Route::get('subjects',[
    'uses'  => 'Master\SubjectController@index',
    'as'    => 'subjects'
]);

Route::post('subject',[
    'uses'  => 'Master\SubjectController@store',
    'as'    => 'create-subject'
]);

Route::get('delete/subject/{id}',[
    'uses'  => 'Master\SubjectController@delete',
    'as'    => 'delete-subject'
]);

/**
 * Group
 */

Route::get('groups',[
    'uses'  => 'Master\GroupController@index',
    'as'    => 'groups'
]);

Route::post('group',[
    'uses'  => 'Master\GroupController@store',
    'as'    => 'create-group'
]);

Route::get('delete/group/{id}',[
    'uses'  => 'Master\GroupController@delete',
    'as'    => 'delete-group'
]);


/**
 * Examination
 */

Route::get('examinations',[
    'uses'  => 'Master\ExaminationController@index',
    'as'    => 'examinations'
]);

Route::post('examination',[
    'uses'  => 'Master\ExaminationController@store',
    'as'    => 'create-examination'
]);

Route::get('delete/examination/{id}',[
    'uses'  => 'Master\ExaminationController@delete',
    'as'    => 'delete-examination'
]);