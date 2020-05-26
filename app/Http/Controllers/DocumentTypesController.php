<?php

namespace App\Http\Controllers;

use App\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class DocumentTypesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $documentTypes = DB::table('document_types')
        ->select('document_types.*')
        ->where('is_deleted', '=', 0)
        ->get();

        return view('document_types.index', compact('documentTypes'));
    }

    public function create(){
        return view('document_types.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required'
        ]);

        DB::table('document_types')->insert(array_merge($data, ["created_at"=> Carbon::now()]));

        return redirect('/document/types');
    }

    public function edit($documentType){
    	$documentType = DB::table('document_types')->find($documentType);

    	return view('document_types.edit', compact('documentType'));
    }

    public function update($documentType)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        DB::table('document_types')
            ->where('id', $documentType)
            ->update(['name' => $data['name'], 'updated_at' => Carbon::now()]);

        return redirect("/document/types");
    }

    public function delete($id)
    {
        DB::table('document_types')
            ->where('id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => Carbon::now()]);
        return redirect("/document/types");
    }
}
