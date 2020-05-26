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



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/graph', 'HomeController@graph');

Route::get('/companies', 'CompaniesController@index');
Route::get('/company/create', 'CompaniesController@create');
Route::get('/company/{company}/edit', 'CompaniesController@edit');
Route::patch('/company/{company}', 'CompaniesController@update')->name('companies.update');
Route::post('/company/delete/{id}', 'CompaniesController@delete');
Route::post('/company', 'CompaniesController@store');

Route::get('/branches', 'BranchesController@index');
Route::get('/branch/create', 'BranchesController@create');
Route::get('/branch/{branch}/edit', 'BranchesController@edit');
Route::patch('/branch/{branch}', 'BranchesController@update')->name('branches.update');
Route::post('/branch/delete/{id}', 'BranchesController@delete');
Route::post('/branch', 'BranchesController@store');

Route::get('/departments', 'DepartmentsController@index');
Route::get('/department/create', 'DepartmentsController@create');
Route::get('/department/{department}/edit', 'DepartmentsController@edit');
Route::patch('/department/{department}', 'DepartmentsController@update')->name('departments.update');
Route::post('/department/delete/{id}', 'DepartmentsController@delete');
Route::post('/department', 'DepartmentsController@store');

Route::get('/roles', 'RolesController@index');
Route::get('/role/create', 'RolesController@create');
Route::get('/role/{role}/edit', 'RolesController@edit');
Route::patch('/role/{role}', 'RolesController@update')->name('roles.update');
Route::post('/role/delete/{id}', 'RolesController@delete');
Route::post('/role', 'RolesController@store');

Route::get('/document/types', 'DocumentTypesController@index');
Route::get('/document/types/create', 'DocumentTypesController@create');
Route::get('/document/types/{documentType}/edit', 'DocumentTypesController@edit');
Route::patch('/document/types/{documentType}', 'DocumentTypesController@update')->name('document_types.update');
Route::post('/document/type/delete/{id}', 'DocumentTypesController@delete');
Route::post('/document/types', 'DocumentTypesController@store');

Route::get('/qualification/types', 'QualificationTypesController@index');
Route::get('/qualification/types/create', 'QualificationTypesController@create');
Route::get('/qualification/types/{documentType}/edit', 'QualificationTypesController@edit');
Route::patch('/qualification/types/{documentType}', 'QualificationTypesController@update')
		->name('qualification_types.update');
Route::post('/qualification/type/delete/{id}', 'QualificationTypesController@delete');
Route::post('/qualification/types', 'QualificationTypesController@store');

Route::get('/employees', 'EmployeesController@index');
Route::get('/ex/employees', 'EmployeesController@exEmployees');
Route::get('/ex/employee/create', 'EmployeesController@createExEmployee');
Route::get('/employee/create', 'EmployeesController@create');
Route::get('/employee/{employee}/view/{link?}', 'EmployeesController@view');
Route::get('/employee/{employee}/edit', 'EmployeesController@edit');
Route::patch('/employee/{employee}', 'EmployeesController@update')->name('employees.update');
Route::post('/ex/employee', 'EmployeesController@storeExEmployee');
Route::post('/employee', 'EmployeesController@store');

Route::get('/contact_details/{{employee}}', 'ContactDetailsController@index')->name('employees.contact_details');
Route::get('/contact_details/{employee}/edit', 'ContactDetailsController@edit');
Route::patch('/contact_details/{employee}', 'ContactDetailsController@update')->name('contact_details.update');

Route::get('/qualifications/create/{id}', 'QualificationsController@create');
Route::get('/qualification/{id}/edit', 'QualificationsController@edit');
Route::patch('/qualifications/{id}', 'QualificationsController@update')->name('qualifications.update');
Route::post('/qualifications', 'QualificationsController@store');

Route::get('/documents/create/{id}', 'DocumentsController@create');
Route::get('/document/{id}/edit', 'DocumentsController@edit');
Route::patch('/documents/{id}', 'DocumentsController@update')->name('documents.update');
Route::post('/documents', 'DocumentsController@store');

Route::get('/contract/create/{id}', 'ContractsController@create');
Route::get('/contract/{id}/edit', 'ContractsController@edit');
Route::get('/contract/{id}/view', 'ContractsController@index');
Route::get('/contract/branches/{id}', 'ContractsController@getBranchesByCompanyId');
Route::patch('/contracts/{id}', 'ContractsController@update')->name('contracts.update');
Route::post('/contracts', 'ContractsController@store');

Route::get('/tools/create/{id}', 'WorkToolsController@create');
Route::get('/tools/{id}/edit', 'WorkToolsController@edit');
Route::patch('/tools/{id}', 'WorkToolsController@update')->name('work_tools.update');
Route::post('/tools', 'WorkToolsController@store');

Route::get('/warnings/create/{id}', 'WarningsController@create');
Route::get('/warnings/{id}/edit', 'WarningsController@edit');
Route::get('/warnings/{id}/view', 'WarningsController@index');
Route::patch('/warnings/{id}', 'WarningsController@update')->name('warnings.update');
Route::post('/warnings', 'WarningsController@store');

Route::get('/leave/types', 'LeaveTypesController@index');
Route::get('/leave/types/create', 'LeaveTypesController@create');
Route::get('/leave/types/{id}/edit', 'LeaveTypesController@edit');
Route::patch('/leave/types/{id}', 'LeaveTypesController@update')->name('leave_types.update');
Route::post('/leave/type/delete/{id}', 'LeaveTypesController@delete');
Route::post('/leave/types', 'LeaveTypesController@store');

Route::get('/leave/create/{id}', 'LeaveHistoryController@create');
Route::get('/leave/{id}/edit', 'LeaveHistoryController@edit');
Route::get('/leave/{id}/view', 'LeaveHistoryController@index');
Route::patch('/leave/{id}', 'LeaveHistoryController@update')->name('leave_history.update');
Route::post('/leave', 'LeaveHistoryController@store');

Route::get('/user/types', 'UserTypesController@index');
Route::get('/user/types/create', 'UserTypesController@create');
Route::get('/user/types/{id}/edit', 'UserTypesController@edit');
Route::patch('/user/type/{company}', 'UserTypesController@update')->name('user_types.update');
Route::post('/user/type/delete/{id}', 'UserTypesController@delete');
Route::post('/user/type', 'UserTypesController@store');

Route::get('/users', 'UsersController@index');
Route::get('/users/{id}/edit', 'UsersController@edit');
Route::get('/profile', 'UsersController@profile');
Route::patch('/users/{id}', 'UsersController@update')->name('users.update');
Route::get('/changePassword','UsersController@showChangePasswordForm');
Route::post('/changePassword','UsersController@changePassword')->name('changePassword');
Route::post('/resetPassword','UsersController@resetPassword');

Route::get('/reports', 'ReportsController@index');
Route::post('/reports/data', 'ReportsController@report');
Route::get('/reports/downloadable', 'DownloadableReportsController@index');
Route::post('/reports/downloadable/bithday', 'DownloadableReportsController@birthdayReport');
Route::post('/reports/downloadable/retirement', 'DownloadableReportsController@retirementReport');
Route::post('/reports/downloadable/qualifications', 'DownloadableReportsController@qualificationsReport');
Route::post('/reports/downloadable/contracts', 'DownloadableReportsController@contractsToExpireReport');
Route::post('/reports/downloadable/contracts/types', 'DownloadableReportsController@contractTypesReport');
Route::post('/reports/downloadable/departments', 'DownloadableReportsController@departmentsReports');
Route::post('/reports/downloadable/branches', 'DownloadableReportsController@branchesReports');
Route::post('/reports/downloadable/license', 'DownloadableReportsController@driversLicenseReport');
Route::post('/reports/downloadable/company/branches', 'DownloadableReportsController@getCompanyBranches');

Route::get('/vacancies', 'VacanciesController@index');
Route::get('/vacancy/create', 'VacanciesController@create');
Route::get('/vacancy/{company}/edit', 'VacanciesController@edit');
Route::get('/vacancy/{company}/view', 'VacanciesController@view');
Route::patch('/vacancy/{company}', 'VacanciesController@update')->name('vacancies.update');
Route::post('/vacancy/delete/{id}', 'VacanciesController@delete');
Route::post('/vacancy', 'VacanciesController@store');

Route::get('/candidates', 'CandidatesController@index');
Route::get('/candidate/{id}/view', 'CandidatesController@view');

