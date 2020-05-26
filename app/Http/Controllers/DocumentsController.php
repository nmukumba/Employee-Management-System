<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id){
    	$types = DocumentType::all();
    	return view('documents.create', compact('types','id'));
    }

    public function store(){
        
    	$data = request()->validate([
            'employee_id' => 'required',
            'document_type_id' => 'required',
            'document' => 'required|mimes:pdf,jpeg,png|max:5000',
        ]);

        $documentPath = request('document')->store('documents', 'public');

        //dd($data);
        DB::table('documents')
            ->insert(
                array_merge(
                    $data,
                    [
                        'document' => $documentPath,
                        "created_at" => Carbon::now()
                    ]
                )
            );

        return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }

    public function edit($id) {
        $document = DB::table('documents')->find($id);
        $types = DocumentType::pluck('name', 'id');
        return view('documents.edit', compact('document', 'types'));
    }

    public function update($id){
        $data = request()->validate([
            'document_type_id' => 'required',
            'document' => 'nullable|mimes:pdf|max:5000',
        ]);

        if (request('document')) {
            $currentDocument = Document::where('id',$id)->pluck('document');

            if(Storage::delete('public/' . $currentDocument[0])){
                $documentPath = request('document')->store('documents', 'public');
                $documentArray = ['document' => $documentPath, 'updated_at' => Carbon::now()];
            }
            
        } else {
            $documentArray = ['updated_at' => Carbon::now()];
        }

        DB::table('documents')
            ->where('id', $id)
            ->update(array_merge($data, $documentArray));

        return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }
}
