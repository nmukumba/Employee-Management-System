<?php

namespace App\Http\Controllers;

use App\Employee;
use App\LeaveHistory;
use App\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LeaveHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id){
        //$types = LeaveType::where('is_deleted', 0);
        $types = DB::table('leave_types')
        ->select('leave_types.*')
        ->where('is_deleted', '=', 0)
        ->get();
        //dd($leave_types);
        return view('leave_history.create', compact('id', 'types'));
    }

    public function store(){
    	$data = request()->validate([
          'employee_id' => 'required',
          'leave_type_id' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'number_of_days' => 'required',
          'document' => 'nullable|mimes:pdf,jpeg,png|max:5000',
      ]);

       $result = Employee::where('id', request('employee_id'))->pluck('leave_balance');
       $leaveBalance = $result[0];

       if ($leaveBalance > request('number_of_days')) {

        if (request('document')) {
            $documentPath = request('document')->store('leave', 'public');

            $array = [
                'document' => $documentPath,
                'start_date'=>Carbon::createFromFormat('d-m-Y', $data['start_date']),
                'end_date'=>Carbon::createFromFormat('d-m-Y', $data['end_date']),
                "created_at"=> Carbon::now()
            ];
        } else {
            $array = [
                'start_date'=>Carbon::createFromFormat('d-m-Y', $data['start_date']),
                'end_date'=>Carbon::createFromFormat('d-m-Y', $data['end_date']),
                "created_at"=> Carbon::now()
            ];
        }

        DB::table('leave_history')->insert(array_merge($data, $array));

        $currentLeaveBalance = $leaveBalance - request('number_of_days');
        DB::table('employees')
        ->where('id', request('employee_id'))
        ->update(['leave_balance' => $currentLeaveBalance, 'updated_at' => Carbon::now()]);

        return redirect('/employee/' . request('employee_id') . '/view?id='. request('employee_id'));

    } else {
        return redirect()->back()->with("error","Employee does not have enough leave balance");
    }
}
}
