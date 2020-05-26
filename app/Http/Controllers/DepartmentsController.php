<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $departments = DB::table('departments')
        ->select('departments.*')
        ->where('is_deleted', '=', 0)
        ->get();

        return view('departments.index', compact('departments'));
    }

    public function create(){
        return view('departments.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required'
        ]);

        DB::table('departments')->insert(array_merge($data, ["created_at"=> Carbon::now()]));

        return redirect('/departments');
    }

    public function edit($department){
    	$department = DB::table('departments')->find($department);

    	return view('departments.edit', compact('department'));
    }

    public function update($department)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('departments')
            ->where('id', $department)
            ->update(['name' => $data['name'], 'updated_at' => Carbon::now()]);

        return redirect("/departments");
    }

    public function delete($id)
    {
        DB::table('departments')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/departments");
    }

}
