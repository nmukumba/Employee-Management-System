<?php

namespace App\Http\Controllers\Api;

use App\Candidate;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth; 
use DB;
use Validator;

class CandidatesApiController extends BaseController
{
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
			return $this->sendResponse($data, 'Login successfull.');
		} else {
			return $this->sendError('Incorrect login credentials.');
		}
	}
	
	public function register(Request $request) {

		$validator = Validator::make($request->all(), [ 
			'name' => 'required', 
			'email' => ['required', 'string', 'email', 'max:255', 'unique:candidates'], 
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
			'dob'=> date('Y-m-d H:i:s', strtotime($request['dob'])),
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
