<?php

namespace App\Http\Controllers;

use App\QualificationType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class QualificationTypesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $qualificationTypes = DB::table('qualification_types')
        ->select('qualification_types.*')
        ->where('is_deleted', '=', 0)
        ->get();

        return view('qualification_types.index', compact('qualificationTypes'));
    }

    public function create(){
        return view('qualification_types.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required'
        ]);

        DB::table('qualification_types')->insert(array_merge($data, ["created_at"=> Carbon::now()]));

        return redirect('/qualification/types');
    }

    public function edit($qualificationType){
    	$qualificationType = DB::table('qualification_types')->find($qualificationType);

    	return view('qualification_types.edit', compact('qualificationType'));
    }

    public function update($qualificationType)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('qualification_types')
            ->where('id', $qualificationType)
            ->update(['name' => $data['name'], 'updated_at' => Carbon::now()]);

        return redirect("/qualification/types");
    }

    public function delete($id)
    {
        DB::table('qualification_types')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/qualification/types");
    }
}
