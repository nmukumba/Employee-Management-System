<?php

namespace App\Http\Controllers;

use App\Vacancy;
use App\Company;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class VacanciesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){

		$vacancies = DB::table('vacancies')
		->join('companies', 'vacancies.company_id', '=', 'companies.id')
		->join('departments', 'vacancies.department_id', '=', 'departments.id')
		->select('vacancies.*', 'companies.name as company_name', 'departments.name as department_name')
		->get();

		return view('vacancies.index', compact('vacancies'));
	}

	public function create(){
		$companies = Company::all();
		$departments = Department::all();
		$statuses = [
			'Available' => 'Available',
			'Interviews Inprogress' => 'Interviews Inprogress',
			'Closed' => 'Closed',
		];

		return view('vacancies.create', compact('companies', 'departments', 'statuses'));
	}

	public function store(){
		$data = request()->validate([
			'title' => 'required|string',
			'department_id' => 'required|numeric',
			'company_id' => 'required|numeric',
			'description' => 'required|string',
			'status' => 'required|string',
			'closing_date' => 'required',
		]);

		DB::table('vacancies')->insert(array_merge($data, [
			'closing_date'=>Carbon::createFromFormat('d-m-Y', $data['closing_date']),
			"created_at"=> Carbon::now()]));

		return redirect('/vacancies');
	}

	public function view($id){
		
		$vacancy = DB::table('vacancies')
		->join('companies', 'vacancies.company_id', '=', 'companies.id')
		->join('departments', 'vacancies.department_id', '=', 'departments.id')
		->select('vacancies.*', 'companies.name as company_name', 'departments.name as department_name')
		->where('vacancies.id', $id)
		->get();

		$applicants = DB::table('candidates_applications')
					->join('candidates', 'candidates_applications.candidate_id', '=', 'candidates.id')
					->select('candidates_applications.*', 'candidates.name', 'candidates.gender', 'candidates.email', 'candidates.phone')
					->where('candidates_applications.vacancy_id', $id)
					->get();

		$selected = DB::table('candidates_applications')
					->join('candidates', 'candidates_applications.candidate_id', '=', 'candidates.id')
					->select('candidates_applications.*', 'candidates.name', 'candidates.gender', 'candidates.email', 'candidates.phone')
					->where('candidates_applications.vacancy_id', $id)
					->get();

		//dd($vacancy[0]);

		return view('vacancies.view', compact('vacancy', 'applicants', 'selected'));
	}

	public function edit($id){
		$companies = Company::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');
		$statuses = [
			'Available' => 'Available',
			'Interviews Inprogress' => 'Interviews Inprogress',
			'Closed' => 'Closed',
		];

		$vacancy = DB::table('vacancies')
		->join('companies', 'vacancies.company_id', '=', 'companies.id')
		->join('departments', 'vacancies.department_id', '=', 'departments.id')
		->select('vacancies.*', 'companies.name as company_name', 'departments.name as department_name')
		->where('vacancies.id', $id)
		->get();

		//dd($vacancy[0]);

		return view('vacancies.edit', compact('vacancy', 'companies', 'departments', 'statuses'));
	}

	public function update($id)
	{
		$data = request()->validate([
			'title' => 'required|string',
			'department_id' => 'required|numeric',
			'company_id' => 'required|numeric',
			'description' => 'required|string',
			'status' => 'required|string',
			'closing_date' => 'required',
		]);

		//dd($data['closing_date']);

		DB::table('vacancies')
		->where('id', $id)
		->update(array_merge($data, [
			"updated_at"=> Carbon::now()]));

		return redirect("/vacancies");
	}

	public function delete($id)
	{
		DB::table('companies')
		->where('id', $id)
		->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
		return redirect("/companies");
	}
}
