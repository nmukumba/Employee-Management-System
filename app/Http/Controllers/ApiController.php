<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class ApiController extends Controller
{
    public function companies(){

        $companies = DB::table('companies')
        ->select('companies.*')
        ->where('is_deleted', '=', 0)
        ->get();
		
		return response()->json($companies, 200);
    }

    public function allEmployees(){

        $employees = DB::select("SELECT employees.id, employees.name, employees.gender, employees.status, companies.name as company_name, companies.id as company_id, branches.name as branch_name, branches.id as branch_id, departments.name as department_name, departments.id as department_id, roles.name as role, roles.id as role_id
			FROM employees
			INNER JOIN (SELECT DISTINCT contracts.employee_id, contracts.company_id, contracts.department_id, contracts.branch_id, contracts.role_id FROM contracts ) as c ON employees.id = c.employee_id
			INNER JOIN companies on c.company_id = companies.id
			INNER JOIN departments on c.department_id = departments.id
			INNER JOIN branches on c.branch_id = branches.id
			INNER JOIN roles on c.role_id = roles.id");
										
		return response()->json($employees, 200);
    }

    public function allActiveEmployees(){

        $employees = DB::table('employees')
        	->join('contracts', 'employees.id', '=', 'contracts.employee_id')
        	->join('companies', 'contracts.company_id', '=', 'companies.id')
            ->join('branches', 'contracts.branch_id', '=', 'branches.id')
            ->join('departments', 'contracts.department_id', '=', 'departments.id')
            ->join('roles', 'contracts.role_id', '=', 'roles.id')
            ->select('employees.id', 'employees.name', 'employees.gender', 'employees.status', 'companies.name as company_name', 'companies.id as company_id', 'branches.name as branch_name', 'branches.id as branch_id', 'departments.name as department_name', 'departments.id as department_id', 'roles.name as role', 'roles.id as role_id')
            ->where([
                ['employees.status', '=', 'Active']
            ])
            ->get();;
		
		return response()->json($employees, 200);
    }

    public function getEmployee($id){

        $employees = DB::table('employees')
        	->join('contracts', 'employees.id', '=', 'contracts.employee_id')
        	->join('companies', 'contracts.company_id', '=', 'companies.id')
            ->join('branches', 'contracts.branch_id', '=', 'branches.id')
            ->join('departments', 'contracts.department_id', '=', 'departments.id')
            ->join('roles', 'contracts.role_id', '=', 'roles.id')
            ->select('employees.id', 'employees.name', 'employees.gender', 'employees.status', 'companies.name as company_name', 'companies.id as company_id', 'branches.name as branch_name', 'branches.id as branch_id', 'departments.name as department_name', 'departments.id as department_id', 'roles.name as role', 'roles.id as role_id')
            ->where([
                ['employees.id', '=', $id],
            ])
            ->get();;
		
		return response()->json($employees, 200);
    }
}
