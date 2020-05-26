<?php

namespace App\Http\Controllers;

use App\JobCategory;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use Validator;

class JobCategoriesController extends BaseController
{
    public function index() {

        $data = DB::table('job_categories')
            ->select('job_categories.*')
            ->get();

        return $this->sendResponse($data, 'Records retrived successfully.'); 
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $data = DB::table('clients')->insert(array_merge($request->all(), ["created_at"=> Carbon::now()]));

        if ($data) {
    		return $this->sendResponse(null, 'Record created successfully.');
    	} else {
    		return $this->sendError('An error occurred', []);
    	}
    }

    public function show($id) {

        $client = DB::table('job_categories')
            ->select('job_categories.*')
            ->where('job_categories.id', '=', $id)
            ->get();

        if (is_null($client)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse($client[0], 'Record retrieved successfully.');
    }

    public function update(Request $request, $id) {

    	$input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $data = DB::table('clients')
            ->where('id', $id)
            ->update(array_merge($input, ['updated_at' => Carbon::now()]));

        if ($data = 1) {
    		return $this->sendResponse(null, 'Record updated successfully.');
    	} else {
    		return $this->sendError('An error occurred', []);
    	}
    }
    
    public function delete($id) {
    	$data = DB::table('job_categories')->where('id', '=', $id)->delete();

    	if ($data = 1) {
    		return $this->sendResponse(null, 'Record deleted permanently.');
    	} else {
    		return $this->sendError('An error occurred', []);
    	}
    }
}
