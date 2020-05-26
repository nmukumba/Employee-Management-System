<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Morris;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $current_employees = DB::table('employees')->where('status', 'Active')->count();
        $ex_employees = DB::table('employees')->where('is_deleted', 1)->count();
        $companies = DB::table('companies')->where('is_deleted', 0)->count();
        $users = DB::table('users')->count();
        $data = DB::select("SELECT companies.id, companies.name, count( contracts.id ) count
                            FROM companies
                            INNER JOIN contracts ON companies.id = contracts.id
                            WHERE contracts.status = 'Active'
                            GROUP BY contracts.id
                            ORDER BY count DESC");
        //dd($data);

        return view('home', compact('current_employees', 'ex_employees', 'companies', 'users', 'data'));
    }

    public function graph(){

        $data = DB::select("SELECT companies.id, companies.name, count( contracts.id ) employee_count
                            FROM companies
                            INNER JOIN contracts ON companies.id = contracts.company_id
                            WHERE contracts.status = 'Active'
                            GROUP BY contracts.company_id
                            ORDER BY employee_count DESC");

        return json_encode($data);
    }

}
