<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $roles = DB::table('roles')
        ->select('roles.*')
        ->where('is_deleted', '=', 0)
        ->get();

        return view('roles.index', compact('roles'));
    }

    public function create(){
        return view('roles.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required'
        ]);

        DB::table('roles')->insert(array_merge($data, ["created_at"=> Carbon::now()]));

        return redirect('/roles');
    }

    public function edit($role){
    	$role = DB::table('roles')->find($role);

    	return view('roles.edit', compact('role'));
    }

    public function update($role)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('roles')
            ->where('id', $role)
            ->update(['name' => $data['name'], 'updated_at' => Carbon::now()]);

        return redirect("/roles");
    }

    public function delete($id)
    {
        DB::table('roles')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/roles");
    }
}
