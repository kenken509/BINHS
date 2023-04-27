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
        
        $date = date_create($request->date);
        $formattedDate = date_format($date,'m/d/Y');
        $request->date = $formattedDate;
        
        
        $defaultPassword = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $request->password = $defaultPassword;
        
        if($request->hasFile('image')){
        
            $request->validate([
                'image.*'       => 'mimes:jpg,png|max:3000',
            ],[
                'image.*'                     => 'this image'
            ]); //Image file type must be in jpg,png,jpeg format. Maximum size: 3mb]);
            
            if($request->role == 'instructor'){
                $file = $request->file('image')[0];
                $originalName = $file->getClientOriginalName();
                $email = $request->email;
                $cleanedString = str_replace(".", "_", $email);
                $newName = $cleanedString.$originalName;
                $path = $file->storeAs('images',$newName, 'public');
                $request->image = $path;
                $storeName = $request->image = $path;
                //dd($request->image);
                
                    //dd('im here @ under path');
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'     => 'required',
                    'mName'    => 'required',
                    'lName'      => 'required',
                    'gender'        => 'required',
                    'civilStatus'   => 'required',
                    'email'         => 'required|email|unique:users', //unique:user means email field should be unique in the users table
                    'phoneNumber'   => 'required|min:11|max:12',
                    'birthDate'     => 'required|date|before:'.now()->subYears(18)->toDateString(),
                    'image'         =>  'nullable',
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
                    
                ]));
                $user->birthDate = $formattedDate;
                $user->image = $storeName;
                $user->save();
                return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }else{ // if role is admin
                $file = $request->file('image')[0];
                $originalName = $file->getClientOriginalName();
                $email = $request->email;
                $cleanedString = str_replace(".", "_", $email);
                $newName = $cleanedString.$originalName;
                $path = $file->storeAs('images',$newName, 'public');
                $storeName = $request->image = $path;
                
                    //dd('im here @ under path');
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'     => 'required',
                    'mName'    => 'required',
                    'lName'      => 'required',
                    'gender'        => 'required',
                    'civilStatus'   => 'required',
                    'email'         => 'required|email|unique:users', //unique:user means email field should be unique in the users table
                    'phoneNumber'   => 'required|min:11|max:12',
                    'birthDate'     => 'required|date|before:'.now()->subYears(18)->toDateString(),
                    'region'        => 'required',
                    'province'      => 'required',
                    'city'          => 'required',
                    'barangay'      => 'required',
                    'role'          => 'required',
                    
                ],[
                    'birthDate.before'          =>'Must be at least 17 years old',
                    'gender.required'           => 'Gender is required',
                    'civilStatus.required'      => 'Status is required',
                    'region.required'           => 'Region is required',
                    'province.required'         => 'Province is required',
                    'city.required'             => 'City is required',
                    'barangay.required'         => 'Baranggay is required',
                    'role'                      => 'Role is required',
                    
                ]));
                $user->birthDate = $formattedDate;
                $user->image = $storeName;
                $user->save();
                return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }
         
            dd('im here @ if');
            
            // $user->image = $path;
            
           
        }else{ // if no image file
            
            if($request->role == 'instructor'){ //instructor no image
               
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'     => 'required',
                    'mName'    => 'required',
                    'lName'      => 'required',
                    'gender'        => 'required',
                    'civilStatus'   => 'required',
                    'email'         => 'required|email|unique:users', //unique:user means email field should be unique in the users table
                    'phoneNumber'   => 'required|min:11|max:12',
                    'birthDate'     => 'required|date|before:'.now()->subYears(18)->toDateString(),
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
                ]));
                $user->birthDate = $formattedDate;
                $user->save();
            return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }else{ //if not instructor
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'     => 'required',
                    'mName'    => 'required',
                    'lName'      => 'required',
                    'gender'        => 'required',
                    'civilStatus'   => 'required',
                    'email'         => 'required|email|unique:users', //unique:user means email field should be unique in the users table
                    'phoneNumber'   => 'required|min:11|max:12',
                    'birthDate'     => 'required|date|before:'.now()->subYears(18)->toDateString(),
                    'region'        => 'required',
                    'province'      => 'required',
                    'city'          => 'required',
                    'barangay'      => 'required',
                    'role'          => 'required',
                    
                ],[
                    'birthDate.before'          =>'Must be at least 17 years old',
                    'gender.required'           => 'Gender is required',
                    'civilStatus.required'      => 'Status is required',
                    'region.required'           => 'Region is required',
                    'province.required'         => 'Province is required',
                    'city.required'             => 'City is required',
                    'barangay.required'         => 'Baranggay is required',
                    'role'                      => 'Role is required',
                    
                ]));
                $user->birthDate = $formattedDate;
                $user->save();
                return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }
        }
       
        
        
        
        //dd('im here');
        

        








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





    public function showEditUser($id){

            //dd(User::findOrFail($id));
        return inertia('AdminDashboard/AdminPages/UserManagement/UserEdit',[
            'user' => User::findOrFail($id),
        ]);
    }


    public function userDelete(User $user){

        Storage::disk('public')->delete($user->image);    //delete image
        $user->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
