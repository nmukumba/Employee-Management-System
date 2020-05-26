<?php

namespace App\Http\Controllers\Api;

use App\Candidate;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth; 
use DB;
use Validator;


class VacanciesApiController extends BaseController
{
    public function index(){

		$data = DB::table('vacancies')
		->join('companies', 'vacancies.company_id', '=', 'companies.id')
		->join('departments', 'vacancies.department_id', '=', 'departments.id')
		->select('vacancies.*', 'companies.name as company_name', 'departments.name as department_name')
		->get();

		return $this->sendResponse($data, 'Login successfull.');
	}
}
