<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class ContactDetailsController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($employee) {
        $details = DB::table('contact_details')->find($employee);

        return json_encode($details);
    }

     public function edit($id) {
    	$data = DB::table('contact_details')->where('employee_id', $id)->get();
    	$contact_details = $data[0];
    	//dd($contact_details);
    	
    	return view('contact_details.edit', compact('contact_details'));
    }

    public function update($id){

        $data = request()->validate([
            'phone' => ['nullable','string'],
            'phone_2' => ['nullable','string'],
            'personal_email' => ['nullable','string', 'email'],
            'work_email' => ['nullable','string', 'email'],
            'postal_address' => ['nullable','string'],
            'physical_address' => ['nullable','string'],
            'next_of_kin' => ['nullable','string'],
            'next_of_kin_relationship' => ['nullable','string'],
            'next_of_kin_phone' => ['nullable','string'],
            'next_of_kin_email' => ['nullable','string', 'email'],
            'next_of_kin_address' => ['nullable','string'],
        ]);

        //dd($data);

        
        $array = array(
        	'updated_at' => Carbon::now()
        );
        //dd(array_merge($data, $array));
        DB::table('contact_details')
            ->where('employee_id', $id)
            ->update(array_merge($data, $array));

        return redirect('/employee/' . $id . '/view?id='.$id);
    }

}
