<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function edit($id){
        $user = DB::table('users')->find($id);
        $types = UserType::pluck('name', 'id');
    	return view('users.edit', compact('user', 'types'));
    }

    public function update($id){
        $data = request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'user_type_id' => 'required',
        ]);

        DB::table('users')
            ->where('id', $id)
            ->update(array_merge($data, ["updated_at"=> Carbon::now()]));

        return redirect()->back()->with("success","User updated successfully !");
    }

    public function profile(){
        return view('users.profile');
    }

    public function showChangePasswordForm(){
        return view('users.change_password');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }

    public function resetPassword(){
        $data = request()->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::table('users')
        ->where('id', request('id'))
            ->update(['password' => $data['password'], 'updated_at' => Carbon::now()]);

        return redirect()->back()->with("success","Password reset successfully !");
    }
}
