<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $companies = DB::table('companies')
        ->select('companies.*')
        ->where('is_deleted', '=', 0)
        ->get();

        return view('companies.index', compact('companies'));
    }

    public function create(){
        return view('companies.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required'
        ]);

        DB::table('companies')->insert(array_merge($data, ["created_at"=> Carbon::now()]));

        return redirect('/companies');
    }

    public function edit($company){
    	$company = DB::table('companies')->find($company);

    	return view('companies.edit', compact('company'));
    }

    public function update($company)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('companies')
            ->where('id', $company)
            ->update(['name' => $data['name'], 'updated_at' => Carbon::now()]);

        return redirect("/companies");
    }

    public function delete($id)
    {
        DB::table('companies')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/companies");
    }
}
