<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\View\View;

class UserTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user_types = DB::table('user_types')
        ->select('user_types.*')
        ->where('is_deleted', '=', 0)
        ->get();

        return view('user_types.index', compact('user_types'));
    }

    public function create(){
        return view('user_types.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required'
        ]);

        DB::table('user_types')->insert(array_merge($data, ["created_at"=> Carbon::now()]));

        return redirect('/user/types');
    }

    public function edit($id){
    	$user_type = DB::table('user_types')->find($id);

    	//dd($user_type);

    	return view('user_types.edit', compact('user_type'));
    }

    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('user_types')
            ->where('id', $id)
            ->update(['name' => $data['name'], 'updated_at' => Carbon::now()]);

        return redirect("/user/types");
    }

    public function delete($id)
    {
        DB::table('user_types')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/user/types");
    }

}
