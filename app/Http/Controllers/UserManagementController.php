<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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

    public function userStore(User $user,Request $request){

        //dd($request->image);
        
         
         
        $file = $request->file('image');
        $originalName = $file->getClientOriginalName();
        $userEmail = Auth::user()->email;
        $cleanedString = str_replace(".", "", $userEmail); //replace . to null 
        $newName = $cleanedString.$originalName;
        
        //dd($newName);
         
         if($request->hasFile('image')){ //checks if there is a file uploaded
            
            $path = $request->file('image')->storeAs('images',$newName, 'public'); // file to images folder in public disk
            
            
            

            dd($path);

            
         }
    }





    public function showEditUser(){
        return inertia('AdminDashboard/AdminPages/UserManagement/UserEdit');
    }


    public function userDelete(User $user){

        $user->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
