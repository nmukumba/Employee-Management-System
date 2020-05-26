<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $employees = DB::table('employees')
            ->where('is_deleted', 0)
            ->get();
        // $employees = DB::select("SELECT employees.*, companies.name AS company, roles.name AS role, departments.name AS department 
        //                         FROM employees
        //                         INNER JOIN contracts on employees.id = contracts.id
        //                         INNER JOIN companies on contracts.company_id = companies.id
        //                         INNER JOIN roles on contracts.role_id = roles.id
        //                         INNER JOIN departments on contracts.department_id = departments.id
        //                         WHERE employees.is_deleted = 0 AND contracts.status = 'Active'
        //                         LIMIT 1");

        return view('employees.index', compact('employees'));
    }

    public function exEmployees(){

        $employees = DB::table('employees')
            ->where('employees.is_deleted', 1)
            ->get();

        return view('employees.ex_employees', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function createExEmployee()
    {
        return view('employees.create_ex_employee');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'marital_status' => 'required',
            'national_id' => 'required',
            'leave_balance' => '',
            'image' => '',
            'nationality' => 'required',
            'is_allowed_to_drive' => '',
        ]);

        $today = strtotime(date("Y-m-d"));
        $dob = strtotime(request('dob'));
        $difference = $today - $dob;
        $age = floor($difference / 31556926);

        if ($age < 17) {
            return redirect()->back()->with("error","Employee is under age.");
        } else {

            if (request('image')) {
               $folderPath = "storage/profiles/";
      
                $image_parts = explode(";base64,", request('image'));
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
              
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.jpg';
              
                $imagePath = $folderPath . $fileName;
                file_put_contents($imagePath, $image_base64);
                //$imagePath = request('image')->store('profiles', 'public');
                //$image = Image::make("storage/{$imagePath}")->fit(1200, 1200);
                //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
                //$image->save();

                $array = [
                            'leave_balance' => request('leave_balance') ? request('leave_balance') : 0,
                            'image' => $imagePath,
                            'status'=> 'Active',
                            'dob'=>Carbon::createFromFormat('d-m-Y', $data['dob']),
                            "created_at"=> Carbon::now()
                        ];
            } else {
                $array = [
                            'leave_balance' => request('leave_balance') ? request('leave_balance') : 0,
                            'status'=> 'Active',
                            'dob'=>Carbon::createFromFormat('d-m-Y', $data['dob']),
                            "created_at"=> Carbon::now()
                        ];
            }
            
            $employee = DB::table('employees')->insert(array_merge($data, $array));

            $id = DB::getPdo()->lastInsertId();

            DB::table('contact_details')
            	->insert([
            		'employee_id' => $id,
            		"created_at"=> Carbon::now()
            	]);
    		
            return redirect('/employee/' . $id . '/view?id='.$id);

        }
    }

    public function storeExEmployee(){
        $data = request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'marital_status' => 'required',
            'national_id' => 'required',
            'image' => '',
            'nationality' => 'required',
            'status' => 'required',
            'is_allowed_to_drive' => '',
        ]);
        
        $employee = DB::table('employees')
                    ->insert(
                        array_merge(
                            $data,
                            [
                                'is_deleted'=> 1,
                                'dob'=>Carbon::createFromFormat('d-m-Y', $data['dob']),
                                "created_at"=> Carbon::now()
                            ]
                        )
                    );

        $id = DB::getPdo()->lastInsertId();

        DB::table('contact_details')
            ->insert([
                'employee_id' => $id,
                "created_at"=> Carbon::now()
            ]);
        
        return redirect('/employee/' . $id . '/view?id='.$id);
    }

    public function view($id){
        $employee = DB::table('employees')->find($id);
        $contact_details = DB::table('contact_details')->where('employee_id', '=', $id)->get();

        //dd($contact_details);
        
        $qualifications = DB::table('qualifications')
            ->join('qualification_types', 'qualifications.qualification_type_id', '=', 'qualification_types.id')
            ->select('qualifications.*', 'qualification_types.name as qualification_name')
            ->where('employee_id', $id)
            ->get();
            //dd($qualifications);
        $documents = DB::table('documents')
        	->join('document_types', 'documents.document_type_id', '=', 'document_types.id')
            ->select('documents.*', 'document_types.name')
        	->where('employee_id', $id)
        	->get();
       	
        $contracts = DB::table('contracts')
            ->join('companies', 'contracts.company_id', '=', 'companies.id')
            ->join('branches', 'contracts.branch_id', '=', 'branches.id')
            ->join('departments', 'contracts.department_id', '=', 'departments.id')
            ->join('roles', 'contracts.role_id', '=', 'roles.id')
            ->select('contracts.*', 'companies.name as company', 'branches.name as branch', 'departments.name as department', 'roles.name as role')
            ->where('employee_id', $id)
            ->get();
        //dd($contracts);
        $tools = DB::table('work_tools')->where('employee_id', $id)->get();
        $warnings = DB::table('warnings')->where('employee_id', $id)->get();

        $leave_history = DB::table('leave_history')
         ->select('leave_history.*', 'leave_types.name')
        ->join('leave_types', 'leave_history.leave_type_id', '=', 'leave_types.id')
        ->where('employee_id', $id)->get();

        $data = DB::table('contracts')
            ->join('roles', 'contracts.role_id', '=', 'roles.id')
            ->select('contracts.*', 'roles.name as role')
            ->where([
                ['employee_id', '=', $id],
                ['status', '=', 'Active'],
            ])
            ->limit(1)
            ->get();
        //dd($data);
        $position = isset($data[0]) ? $data[0]->role : '' ;
        //dd($position);
    	return view('employees.view', compact('employee', 'contact_details', 'qualifications', 'documents', 'contracts', 'tools', 'warnings', 'position', 'leave_history'));
    }

    public function edit($employee) {
    	$employee = DB::table('employees')->find($employee);
    	//dd($employee);
    	$gender = array('Male'=>'Male', 'Female'=>'Female');
    	$status = array(
    		'Married'=>'Married', 
    		'Single'=>'Single',
    		'Divorced'=>'Divorced',
    		'Widowed'=>'Widowed',
    	);
    
    	return view('employees.edit', compact('employee', 'gender', 'status'));
    }

    public function update($id){

        $data = request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'marital_status' => 'required',
            'national_id' => 'required',
            'image' => '',
            'nationality' => 'required',
            'is_allowed_to_drive' => '',
        ]);

        // if (request('is_allowed_to_drive')) {
        // 	$array = array(
        // 		'is_allowed_to_drive' => 1,
        // 		'updated_at' => Carbon::now()
        // 	);
        // } else {
        // 	$array = array(
        // 		'is_allowed_to_drive' => 0,
        // 		'updated_at' => Carbon::now()
        // 	);
        // }
        if (request('image')) {
            $imagePath = request('image')->store('profiles', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $array = [
                        'is_allowed_to_drive' => request('is_allowed_to_drive') ? 1 : 0,
                        'image' => $imagePath,
                        'dob'=>Carbon::createFromFormat('Y-m-d', $data['dob']),
                        "updated_at"=> Carbon::now()
                    ];
        } else {
            $array = [
                        'is_allowed_to_drive' => request('is_allowed_to_drive') ? 1 : 0,
                        'dob'=>Carbon::createFromFormat('Y-m-d', $data['dob']),
                        "updated_at"=> Carbon::now()
                    ];
        }
        //dd(array_merge($data, $array));
        DB::table('employees')
            ->where('id', $id)
            ->update(array_merge($data, $array));

        return redirect('/employee/' . $id . '/view?id='.$id);
    }

}
