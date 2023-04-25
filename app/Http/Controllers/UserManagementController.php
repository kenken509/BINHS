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

    public function userStore(Request $request){

        //authenticate to register new account
        dd(fake()->dateTime());
        dd($request);

        $file = $request->file('image')[0];
        $currentUser = Auth::user()->id;
        $user2 = User::findOrFail($currentUser);
        $default = 'images/default.png';
        
        
         
         if($request->hasFile('image')){ //checks if there is a file uploaded
            //create new name
            
            $originalName = $file->getClientOriginalName();
            $userEmail = Auth::user()->email;
            $cleanedString = str_replace(".", "", $userEmail); //replace . to null 
            $newName = $cleanedString.$originalName;
            
            $path = $file->storeAs('images',$newName, 'public'); // file to images folder in public disk
            
            $user2->image = $path;
            $user2->save();
            

            

            return redirect()->back()->with('success', 'Image uploaded');
            
         }else{
        

            
            $user2->image = $default;
            $user2->save();

            return redirect()->back()->with('success', 'Image uploaded');
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
