<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('companies', 'ApiController@companies')->middleware('cors');
Route::get('employees', 'ApiController@allEmployees')->middleware('cors');
Route::get('employees/active', 'ApiController@allActiveEmployees')->middleware('cors');
Route::get('employee/{id}', 'ApiController@getEmployee')->middleware('cors');

Route::post('candidate/register', 'Api\CandidatesApiController@register')->middleware('cors');
Route::post('candidate/login', 'Api\CandidatesApiController@login')->middleware('cors');

Route::get('job/categories', 'JobCategoriesController@index');
Route::get('job/categories/{id}', 'JobCategoriesController@show');
Route::post('job/categories', 'JobCategoriesController@store');
Route::put('job/categories/{id}', 'JobCategoriesController@update');
Route::delete('job/categories/{id}', 'JobCategoriesController@delete');

Route::get('vacancies', 'Api\VacanciesApiController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});
