<?php

namespace App\Http\Controllers;

use App\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WarningsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $warning = DB::table('warnings')->find($id);
        //dd($employee);
    
        return view('warnings.index', compact('warning'));
    }

    public function create($id){
    	return view('warnings.create', compact('id'));
    }

    public function store(){
    	$data = request()->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'description' => '',
            'document' => 'nullable|mimes:pdf|max:5000'
        ]);

        if (request('document')) {
        	$documentPath = request('warnings')->store('documents', 'public');
        	$array = [
        		"document"=> $documentPath,
        		"created_at"=> Carbon::now()
        	];
        } else {
        	$array = ["created_at"=> Carbon::now()];
        }

        DB::table('warnings')
	        ->insert(
	        	array_merge($data, $array)
	        );

		return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }

    public function edit($id){
    	$warning = DB::table('warnings')->find($id);
    	//dd($employee);
    
    	return view('warnings.edit', compact('warning'));
    }

    public function update($id){

    	$data = request()->validate([
            'name' => 'required',
            'description' => '',
            'document' => 'nullable|mimes:pdf|max:5000'
        ]);

    	if (request('document')) {
        	$documentPath = request('warnings')->store('documents', 'public');
        	$array = [
        		"document"=> $documentPath,
        		"updated_at"=> Carbon::now()
        	];
        } else {
        	$array = ["updated_at"=> Carbon::now()];
        }

    	DB::table('warnings')
            ->where('id', $id)
            ->update(array_merge($data, $array));

        return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }
}
