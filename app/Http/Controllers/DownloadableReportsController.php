<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\QualificationType;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;
use Excel;

class DownloadableReportsController extends Controller
{
    public function index()
    {
    	 $companies = Company::all();
    	 $qualification_types = QualificationType::all();
         $departments = Department::all();
    	 //dd($qualificationTypes);
        return view('reports.downloadable', compact('companies', 'qualification_types', 'departments'));
    }

    public function birthdayReport(Request $request){
    	//dd($request);
        $where = '';
        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

        if ($request->month) {
            $where .= " AND MONTH(dob) = " . $request->month;
        }        
    	
    	$birthdays = DB::select("SELECT employees.*, contact_details.*, floor(DATEDIFF(SYSDATE(),dob)/365) AS age
							FROM employees
							INNER JOIN contracts ON employees.id = contracts.employee_id
							INNER JOIN contact_details on employees.id = contact_details.employee_id
							WHERE employees.status = 'Active'" . $where);
    	return json_encode($birthdays);
    }

    public function retirementReport(Request $request) {
    	$where = '';
        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

    	$data = DB::select("SELECT employees.*, contact_details.*, floor(DATEDIFF(SYSDATE(),dob)/365) AS age
							FROM employees
							INNER JOIN contracts ON employees.id = contracts.employee_id
							INNER JOIN contact_details on employees.id = contact_details.employee_id
							WHERE employees.status = 'Active' 
							AND floor(DATEDIFF(SYSDATE(),dob)/365) = 64" . $where);
    	return json_encode($data);
    }

    public function qualificationsReport(Request $request) {
    	$where = '';

        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

    	if ($request->qualification_id != "") {
    		$where .= ' AND qualifications.qualification_type_id = ' . $request->qualification_id;
    	}

    	$data = DB::select("SELECT employees.*, contact_details.*, floor(DATEDIFF(SYSDATE(),dob)/365) AS age, qualification_types.name as qualification_type, roles.name AS role_name
							FROM employees
							INNER JOIN contracts ON employees.id = contracts.employee_id
							INNER JOIN contact_details on employees.id = contact_details.employee_id
							INNER JOIN qualifications on employees.id = qualifications.employee_id
                            INNER JOIN qualification_types on qualifications.qualification_type_id = qualification_types.id
                            INNER JOIN roles on contracts.role_id = roles.id
							WHERE employees.status = 'Active'" . $where);
    	return json_encode($data);
    }

    public function contractsToExpireReport(Request $request) {
    	$where = '';
        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

    	$data = DB::select("SELECT employees.*, contact_details.*, contracts.end_date, DATEDIFF(contracts.end_date, CURDATE()) AS days_to_end, roles.name AS role_name, contracts.contract_type
							FROM employees
							INNER JOIN contracts ON employees.id = contracts.employee_id
                            INNER JOIN roles on contracts.role_id = roles.id
							INNER JOIN contact_details on employees.id = contact_details.employee_id
							WHERE employees.status = 'Active' 
							AND DATEDIFF(contracts.end_date, CURDATE()) <= 30" . $where);
    	return json_encode($data);
    }

     public function contractTypesReport(Request $request) {
    	$where = '';
        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

    	$data = DB::select("SELECT employees.*, contact_details.*, contracts.end_date, DATEDIFF(contracts.end_date, CURDATE()) AS days_to_end, roles.name AS role_name, contracts.contract_type
							FROM employees
							INNER JOIN contracts ON employees.id = contracts.employee_id
                            INNER JOIN roles on contracts.role_id = roles.id
							INNER JOIN contact_details on employees.id = contact_details.employee_id
							WHERE employees.status = 'Active'" . $where);
    	return json_encode($data);
    }

    public function departmentsReports(Request $request){
        $where = '';
        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

        if ($request->department_id) {
            $where .= " AND contracts.department_id = " . $request->department_id;
        }

        $data = DB::select("SELECT employees.*, roles.name AS role_name, departments.name AS department_name
                            FROM employees
                            INNER JOIN contracts ON employees.id = contracts.employee_id
                            INNER JOIN roles on contracts.role_id = roles.id
                            INNER JOIN departments on contracts.department_id = departments.id
                            INNER JOIN contact_details on employees.id = contact_details.employee_id
                            WHERE employees.status = 'Active'" . $where);
        return json_encode($data);
    }

    public function branchesReports(Request $request){
        $where = '';
        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

        if ($request->branch_id) {
            $where .= " AND contracts.branch_id = " . $request->branch_id;
        }

        $data = DB::select("SELECT employees.*, roles.name AS role_name, branches.name AS branch_name
                            FROM employees
                            INNER JOIN contracts ON employees.id = contracts.employee_id
                            INNER JOIN roles on contracts.role_id = roles.id
                            INNER JOIN branches on contracts.branch_id = branches.id
                            WHERE employees.status = 'Active'" . $where);
        return json_encode($data);
    }

    public function getCompanyBranches(Request $request){
        //$branches = DB::table('branches')->where('company_id', $request->company_id)->all();
        $branches = DB::table('branches')
        ->select('branches.*')
        ->where('company_id', '=', $request->company_id)
        ->get();
        return json_encode($branches);
    }

    public function driversLicenseReport(Request $request) {

        $where = '';
        if ($request->company_id) {
            $where .= " AND contracts.company_id = " . $request->company_id;
        }

        $data = DB::select("SELECT employees.*, companies.name as company_name, departments.name as department_name, roles.name as role_name
                            FROM employees
                            INNER JOIN documents ON employees.id = documents.employee_id
                            INNER JOIN contracts ON employees.id = contracts.employee_id
                            INNER JOIN companies ON contracts.company_id = companies.id
                            INNER JOIN departments ON contracts.department_id = departments.id
                            INNER JOIN roles ON contracts.role_id = roles.id
                            WHERE employees.status = 'Active' AND documents.document_type_id = 2
                            AND contracts.status = 'Active'" . $where);

        return json_encode($data);
    }
}
