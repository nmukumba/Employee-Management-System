<?php

namespace App\Http\Controllers;

use App\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LeaveTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $leave_types = DB::table('leave_types')
        ->select('leave_types.*')
        ->where('is_deleted', '=', 0)
        ->get();

        return view('leave_types.index', compact('leave_types'));
    }

    public function create(){
        return view('leave_types.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required'
        ]);

        DB::table('leave_types')->insert(array_merge($data, ["created_at"=> Carbon::now()]));

        return redirect('/leave/types');
    }

    public function edit($id){
    	$leave_type = DB::table('leave_types')->find($id);

    	return view('leave_types.edit', compact('leave_type'));
    }

    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('leave_types')
            ->where('id', $id)
            ->update(['name' => $data['name'], 'updated_at' => Carbon::now()]);

        return redirect("/leave/types");
    }

    public function delete($id)
    {
        DB::table('leave_types')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/leave/types");
    }
}
