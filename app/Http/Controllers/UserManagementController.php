<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function showAllUsers(){
        //dd(User::orderByDesc('created_at')->paginate(10));

        return inertia('AdminDashboard/AdminPages/UserManagement/UsersAll',[
            'users' =>User::orderByDesc('created_at')->paginate(10),
        ]);
    }

    public function showAddUser(){
        return inertia('AdminDashboard/AdminPages/UserManagement/UserAdd');
    }

    public function userStore(Request $request){
        dd($request);
    }





    public function showEditUser(){
        return inertia('AdminDashboard/AdminPages/UserManagement/UserEdit');
    }


    public function userDelete(User $user){

        $user->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
