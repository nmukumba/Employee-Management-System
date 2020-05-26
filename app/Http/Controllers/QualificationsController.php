<?php

namespace App\Http\Controllers;

use App\QualificationType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class QualificationsController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function create($id){
        $types = QualificationType::all();
        return view('qualifications.create', compact('types', 'id'));
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'employee_id' => 'required',
            'qualification_type_id' => 'required',
            'institution' => 'required',
            'year_attained' => 'required',
            'document' => 'required|mimes:pdf,jpeg,png|max:5000',
        ]);

        $documentPath = request('document')->store('certificates', 'public');

        //dd($data);
        DB::table('qualifications')
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
        $qualification = DB::table('qualifications')->find($id);
        $types = QualificationType::pluck('name', 'id');
        return view('qualifications.edit', compact('qualification', 'types'));
    }

    public function update($id){
        $data = request()->validate([
            'name' => 'required',
            'qualification_type_id' => 'required',
            'institution' => 'required',
            'year_attained' => 'required',
            'document' => 'nullable|mimes:pdf|max:5000',
        ]);

        if (request('document')) {
            
            $currentDocument = Document::where('id',$id)->pluck('document');

            if(Storage::delete('public/' . $currentDocument[0])){
                $documentPath = request('document')->store('qualifications', 'public');
                $documentArray = ['document' => $documentPath, 'updated_at' => Carbon::now()];
            }
            
        } else {
            $documentArray = ['updated_at' => Carbon::now()];
        }

        DB::table('qualifications')
            ->where('id', $id)
            ->update(array_merge($data, $documentArray));

        return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));
    }
}
