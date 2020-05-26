<?php

namespace App\Http\Controllers;

use WorkTool;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WorkToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id){
    	return view('work_tools.create', compact('id'));
    }

    public function store(){
    	$data = request()->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'model' => 'required',
            'date_issued' => 'required',
            'condition' => 'required',
            'serial_number' => ''
        ]);

        DB::table('work_tools')
        			->insert(
        			    array_merge(
        			        $data,
                            [
                                'date_issued'=>Carbon::createFromFormat('d-m-Y', $data['date_issued']),
                                'status'=>'In Possesion',
                                "created_at"=> Carbon::now()
                            ]
                        )
                    );

		return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }

    public function edit($id){
    	$tool = DB::table('work_tools')->find($id);
    	//dd($employee);
    	$conditions = array(
    		'New'=>'New', 
    		'Preused'=>'Preused'
    	);

    	$status = array(
    		'In Possesion' => 'In Possesion',
    		'Returned' => 'Returned',
            'Stollen' => 'Stollen',
    	);
    
    	return view('work_tools.edit', compact('tool', 'conditions', 'status'));
    }

    public function update($id){

    	$data = request()->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'model' => 'required',
            'condition' => 'required',
            'serial_number' => '',
            'date_issued' => 'required',
            'date_returned' => '',
            'status' => 'required',
        ]);

        $array = array(
                'date_issued'=>Carbon::createFromFormat('Y-m-d', $data['date_issued']),
                'date_returned'=> !empty($data['date_returned']) ? Carbon::createFromFormat('d-m-Y', $data['date_returned']) : null,
        		'updated_at' => Carbon::now()
        	);

    	 DB::table('work_tools')
            ->where('id', $id)
            ->update(array_merge($data, $array));

        return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }
}
