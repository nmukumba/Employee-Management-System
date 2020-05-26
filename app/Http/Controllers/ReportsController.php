<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	 $companies = Company::all();
        return view('reports.index', compact('companies'));
    }

    public function report(Request $request){
    	$where = '';
        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

        if ($request->home) {
            $gender = DB::select("SELECT employees.gender AS label, count( employees.gender) value
                                FROM employees
                                WHERE employees.status = 'Active'
                                GROUP BY employees.gender ORDER BY value DESC");
        } else {
            $gender = DB::select("SELECT employees.gender AS label, count( employees.gender) value
                                FROM employees
                                INNER JOIN contracts ON employees.id = contracts.employee_id
                                WHERE employees.status = 'Active'
                                AND contracts.status = 'Active'" . $where . 
                                " GROUP BY employees.gender ORDER BY value DESC");
        }

    	$roles = DB::select("SELECT roles.name, count( contracts.id ) count
							FROM roles
							INNER JOIN contracts ON roles.id = contracts.role_id
							WHERE contracts.status = 'Active'" . $where . "
							GROUP BY roles.name
							ORDER BY count ASC");

    	$age = DB::select("SELECT floor(DATEDIFF(SYSDATE(),dob)/365) AS age, count( employees.id) count
							FROM employees
							INNER JOIN contracts ON employees.id = contracts.employee_id
							WHERE employees.status = 'Active'" .$where . "
							GROUP BY age 
							ORDER BY age ASC");

    	$contract_types = DB::select("SELECT contract_type AS label, COUNT(contract_type) AS value
									FROM contracts
									WHERE status = 'Active'" . $where . "
									GROUP BY contract_type
									ORDER BY value DESC");

        $departments = DB::select("SELECT departments.id, departments.name, count( contracts.id ) count
                                    FROM departments
                                    INNER JOIN contracts ON departments.id = contracts.department_id
                                    WHERE contracts.status = 'Active'" . $where . "
                                    GROUP BY contracts.department_id
                                    ORDER BY count ASC");

        $branches = DB::select("SELECT branches.id, branches.name, count( contracts.id ) count
                                    FROM branches
                                    INNER JOIN contracts ON branches.id = contracts.branch_id
                                    WHERE contracts.status = 'Active'" . $where . "
                                    GROUP BY contracts.branch_id
                                    ORDER BY count ASC");

        $ex_employees = DB::select("SELECT COUNT(id) AS count FROM employees WHERE is_deleted = 1");

    	$data = array(
    		'roles' => $roles,
    		'gender' => $gender,
    		'age' => $age,
    		'contracts' => $contract_types,
            'departments' => $departments,
            'branches' => $branches,
            'ex_employees' => $ex_employees
    	);

        return json_encode($data);
    }
}
