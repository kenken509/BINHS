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
        //dd($request);
        $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
            'firstName'     => 'required',
            'middleName'    => 'required',
            'lastName'      => 'required',
            'gender'        => 'required',
            'civilStatus'   => 'required',
            'email'         => 'required|email|unique:users', //unique:user means email field should be unique in the users table
            'phoneNumber'   => 'required|min:11|max:11',
            'birthDate'     => 'required|date|before:'.now()->subYears(18)->toDateString(),
            'image'         => 'mimes:jpg,png,jpeg|max:10',
            'region'        => 'required',
            'province'      => 'required',
            'city'          => 'required',
            'barangay'      => 'required',
            'role'          => 'required',
            'subject'       => 'required',

        ],[
            'birthDate.before'          =>'Must be at least 17 years old',
            'gender.required'           => 'Gender is required',
            'civilStatus.required'      => 'Status is required',
            'region.required'           => 'Region is required',
            'province.required'         => 'Province is required',
            'city.required'             => 'City is required',
            'barangay.required'         => 'Baranggay is required',
            'role'                      => 'Role is required',
            'subject'                   => 'Subject is required',
            'image'                     => 'Image file type must be in jpg,png,jpeg format. Maximum size: 3mb'
        ]));











        // $file = $request->file('image')[0];
        // $currentUser = Auth::user()->id;
        // $user2 = User::findOrFail($currentUser);
        // $defaultImage = 'images/default.png';
        
        
         
         //if($request->hasFile('image')){ //checks if there is a file uploaded
            //create new name
           // dd('image exist');
            // $originalName = $file->getClientOriginalName();
            // $userEmail = Auth::user()->email;
            //$cleanedString = str_replace(".", "", $userEmail); //replace . to null 
            //$newName = $cleanedString.$originalName;
            
            //$path = $file->storeAs('images',$newName, 'public'); // file to images folder in public disk
            
            //$user2->image = $path;
            //$user2->save();
            

            

            //return redirect()->back()->with('success', 'Image uploaded');
            
        // }else{
        

            
        //     $user2->image = $defaultImage;
        //     $user2->save();

        //     return redirect()->back()->with('success', 'Image uploaded');
        //  }
    }





    public function showEditUser(){
        return inertia('AdminDashboard/AdminPages/UserManagement/UserEdit');
    }


    public function userDelete(User $user){

        $user->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
