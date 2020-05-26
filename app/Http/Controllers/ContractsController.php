<?php

namespace App\Http\Controllers;

use App\Company;
use App\Branch;
use App\Department;
use App\Role;
use App\Employee;
use Javascript;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContractsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $data = DB::table('contracts')
            ->join('companies', 'contracts.company_id', '=', 'companies.id')
            ->join('branches', 'contracts.branch_id', '=', 'branches.id')
            ->join('departments', 'contracts.department_id', '=', 'departments.id')
            ->join('roles', 'contracts.role_id', '=', 'roles.id')
            ->select('contracts.*', 'companies.name as company', 'branches.name as branch', 'departments.name as department', 'roles.name as role')
            ->where('contracts.id', $id)
            ->get();

            $contract = $data[0];

        return view('contracts.index', compact('contract'));
    }

    public function create($id){
    	$companies = Company::all();
    	$departments = Department::all();
    	$roles = Role::all();
        $status = [
            'Active' => 'Active',
            'Terminated' => 'Terminated',
            'Resigned' => 'Resigned',
            'Ended' => 'Ended',
        ];

        return view(
        	'contracts.create', 
        	compact(
        		'id',
        		'companies',  
        		'departments', 
        		'roles',
                'status'
        	)
        );
    }

    public function getBranchesByCompanyId($id){
        $branches = DB::table('branches')->where('company_id',$id)->pluck("name","id")->all();
        $data = view('contracts.branches',compact('branches'))->render();
        return response()->json(['options'=>$data]);
    }

    public function store(){
    	$data = request()->validate([
	    	'employee_id' => 'required',
	    	'contract_type' => 'required',
            'status' => 'required',
	    	'start_date' => 'required',
	    	'end_date' => '',
	    	'job_description' => 'required',
	    	'document' => 'required',
	    	'company_id' => 'required',
	    	'branch_id' => 'required',
	    	'department_id' => 'required',
	    	'role_id' => 'required',
	    ]);
        
        if (request('status') == 'Active') {
             $employee = Employee::find(request('employee_id'));

            if ($employee->is_deleted == 1) {
                  $update = DB::table('employees')
                    ->where([
                        ['id', '=', $employee->id],
                    ])
                    ->update(['is_deleted' => 0, 'status' => 'Active', 'updated_at' => Carbon::now()]);
              }  
        }

        $documentPath = request('document')->store('contracts', 'public');

        DB::table('contracts')
            ->insert(
                array_merge(
                    $data,
                    [
                        'start_date'=>Carbon::createFromFormat('d-m-Y', $data['start_date']),
                        'end_date'=> request('end_date') ? Carbon::createFromFormat('d-m-Y', $data['end_date']) : null,
                        'status' => 'Active',
                        'document' => $documentPath,
                        "created_at" => Carbon::now()
                    ]
                )
            );

        return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }

    public function edit($id){

        $companies = Company::pluck('name', 'id');
        $branches = Branch::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');
        $types = [
            'Probotion' => 'Probation',
            'Full Time' => 'Full Time',
            'Fixed Term Contract' => 'Fixed Term Contract',
        ];

        $status = [
            'Active' => 'Active',
            'Terminated' => 'Terminated',
            'Resigned' => 'Resigned',
            'Ended' => 'Ended',
        ];

        $data = DB::table('contracts')
            ->join('companies', 'contracts.company_id', '=', 'companies.id')
            ->join('branches', 'contracts.branch_id', '=', 'branches.id')
            ->join('departments', 'contracts.department_id', '=', 'departments.id')
            ->join('roles', 'contracts.role_id', '=', 'roles.id')
            ->select('contracts.*', 'companies.name as company', 'branches.name as branch', 'departments.name as department', 'roles.name as role')
            ->where('contracts.id', $id)
            ->get();

            $contract = $data[0];
            //dd($contract);

        return view('contracts.edit', compact('contract', 'companies', 'branches', 'departments', 'roles', 'types', 'status'));
    }

    public function update($id){
        $data = request()->validate([
            'contract_type' => 'required',
            'start_date' => 'required',
            'end_date' => '',
            'job_description' => 'required',
            'document' => '',
            'status' => 'required',
            'company_id' => 'required',
            'branch_id' => 'required',
            'department_id' => 'required',
            'role_id' => 'required',
        ]);

        if (request('document')) {
            $currentDocument = Contract::where('id',$id)->pluck('document');

            if(Storage::delete('public/' . $currentDocument[0])){
                $documentPath = request('document')->store('documents', 'public');
                $documentArray = [
                    'start_date'=>Carbon::createFromFormat('Y-m-d', $data['start_date']),
                    'end_date'=> request('end_date') ? Carbon::createFromFormat('Y-m-d', $data['end_date']) : null,
                    'document' => $documentPath, 
                    'updated_at' => Carbon::now()
                ];
            }
            
        } else {
            $documentArray = [
                'start_date'=>Carbon::createFromFormat('Y-m-d', $data['start_date']),
                'end_date'=>request('end_date') ? Carbon::createFromFormat('Y-m-d', $data['end_date']) : null,
                'updated_at' => Carbon::now()
            ];
        }

        //dd(array_merge($data, $documentArray));

        DB::table('contracts')
            ->where('id', $id)
            ->update(array_merge($data, $documentArray));

            if ($data['status'] == 'Terminated' || $data['status'] == 'Resigned') {
                DB::table('employees')
                    ->where('id', request('employee_id'))
                    ->update(['status' => $data['status'], 'updated_at' => Carbon::now()]);
            }

        return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }
}
