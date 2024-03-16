<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['usersRecord'] = User::usersRecord();
        $data['header_title'] = 'Admin List';
        return view('admin.admin.list', $data);
    }//

    public function add()
    {
        $data['header_title'] = 'Add Admin';
        return view('admin.admin.add', $data);
    }//

    public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'status' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return redirect()->route('admin.list')->with('success', 'Admin Added Successfully');
    }//

    public function edit($id){
        $data['userRecord'] = User::find($id);
        $data['header_title'] = 'Edit Admin';
        return view('admin.admin.edit', $data);
    }//

    public function update($id, Request $request){
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
            'status' => 'required',
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return redirect()->route('admin.list')->with('success', 'Admin Updated Successfully');
    }//

    public function delete($id){
        $user = User::find($id);
        $user->is_deleted = 1;
        $user->save();
        return redirect()->route('admin.list')->with('success', 'Admin Deleted Successfully');
    }
}
