<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class BranchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $branches = DB::table('branches')
                    ->join('companies', 'branches.company_id', '=', 'companies.id')
                    ->select('branches.*', 'companies.name as company_name')
                    ->where('branches.is_deleted', '=', 0)
                    ->get();
        //$branches = Branch::where('is_deleted', 0);
        return view('branches.index', compact('branches'));
    }

    public function getBranchesByCompanyId($id){
        $branches = DB::table('branches')->where('company_id',$id)->pluck("name","id")->all();
        $data = view('branches',compact('branches'))->render();
        return response()->json(['options'=>$data]);
    }

    public function create(){
        $companies = Company::all();
        return view('branches.create', compact('companies'));
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'company_id' => 'required'
        ]);

        DB::table('branches')->insert(array_merge($data, ["created_at"=> Carbon::now()]));

        return redirect('/branches');
    }

    public function edit($branch){
        $companies = Company::pluck('name', 'id');
    	 $branch = DB::table('branches')
                    ->join('companies', 'branches.company_id', '=', 'companies.id')
                    ->select('branches.*', 'companies.name as company_name')
                    ->where('branches.id', '=', $branch)
                    ->limit(1)
                    ->get();
        $selected_id = $branch[0]->company_id;
        //dd($companies);
                    
    	return view('branches.edit', compact('selected_id', 'companies', 'branch'));
    }

    public function update($branch)
    {
        $data = request()->validate([
            'name' => 'required',
            'company_id' => 'required',
        ]);

        DB::table('branches')
            ->where('id', $branch)
            ->update(['name' => $data['name'], 'company_id' => $data['company_id'],'updated_at' => Carbon::now()]);

        return redirect("/branches");
    }

    public function delete($id)
    {
        DB::table('branches')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/branches");
    }
}
