<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth; 
use DB;
use Validator;

class CandidatesController extends Controller
{

	public function index(){
		$candidates = DB::select('SELECT candidates.*, floor(DATEDIFF(SYSDATE(),dob)/365) AS age FROM candidates');
        return view('candidates.index', compact('candidates'));
	}

	public function view($id){
		$candidate_data = DB::select('SELECT candidates.*, floor(DATEDIFF(SYSDATE(),dob)/365) AS age FROM candidates WHERE id=' . $id);
		$candidate = $candidate_data[0];

		$qualifications = DB::table('candidate_work_experience')
						->select('candidate_work_experience.*')
						->where('candidate_id', '=', $id)
						->get();

		$experiences = DB::table('candidate_qualifications')
						->select('candidate_qualifications.*')
						->where('candidate_id', '=', $id)
						->get();

		$applications = DB::table('candidates_applications')
						->join('vacancies', 'candidates_applications.vacancy_id', '=', 'vacancies.id')
						->select('candidates_applications.*', 'vacancies.title')
						->where('candidates_applications.candidate_id', '=', $id)
						->get();

		return view('candidates.view', compact('candidate', 'qualifications', 'experiences', 'applications'));
	}
	public function login(Request $request) {

		$validator = Validator::make($request->all(), [  
			'email' => ['required', 'string', 'email', 'max:255'],
			'password' => 'required',
		]);

		if($validator->fails()){
			return $this->sendError('Validation Error.', $validator->errors());       
		}

		if (Auth::guard('candidate')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
			$candidate = Auth::guard('candidate')->user();
			$data = [
				'id'=> $candidate['id'],
				'name'=> $candidate['name'],
				'email'=> $candidate['email'],
			];
			//return $user;
			return $this->sendResponse($data, 'Account created successfully.');
		} else {
			return $this->sendError('Incorrect login credentials.');
		}
	}
	
	public function register(Request $request) {

		$validator = Validator::make($request->all(), [ 
			'name' => 'required', 
			'email' => ['required', 'string', 'email', 'max:255'], 
			'phone' => 'required|numeric', 
			'address' => 'required|string', 
			'city' => 'required|string', 
			'gender' => 'required|string', 
			'dob' => 'required|string', 
			'password' => 'required', 
			'c_password' => 'required|same:password', 
		]);
		
		if($validator->fails()){
			return $this->sendError('Validation Error.', $validator->errors());       
		}

		$hass_pass = bcrypt($request['password']);

		$input = [
			'name'=> $request['name'],
			'email'=> $request['email'],
			'phone'=> $request['phone'],
			'name'=> $request['name'],
			'address'=> $request['address'],
			'city'=> $request['city'],
			'gender'=> $request['gender'],
			'dob'=> Carbon::createFromFormat('d-m-Y', $request['dob']),
			'password'=> $hass_pass,
			'created_at'=> Carbon::now()
		]; 

		$data = DB::table('candidates')->insert($input);

		if ($data) {
			return $this->sendResponse(null, 'Account created successfully.');
		} else {
			return $this->sendError('An error occurred', []);
		}
	}
}
