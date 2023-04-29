<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Subject;
use App\Models\TestModel;
use App\Models\TestSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    public function showAllUsers(Request $request){
        //dd(User::orderByDesc('created_at')->paginate(10));
        
        $filters = $request->role;
        //$test = Subject::findOrFail(1)->user();
        //$test->all();
        
        $query = User::latest();
        //dd($query);
        //dd($query);
        
        return inertia('AdminDashboard/AdminPages/UserManagement/UsersAll',[
            'users' =>$query->filteredData($filters)->paginate(10),
        ]);
    }

    public function showAddUser(){
        return inertia('AdminDashboard/AdminPages/UserManagement/UserAdd', [
            'subjects' => Subject::all()
        ]);
    }

    public function userStore(Request $request){
    
        $date = date_create($request->date);

        $age = Carbon::parse($request->birthDate)->age;
    
        //$defaultPassword = $request->lName;
        //$request->password = $defaultPassword;
        
        //dd($request);
        if($request->hasFile('image')){
        
            $request->validate([
                'image.*'       => 'mimes:jpg,png|max:3000',
            ],[
                'image.*'       => 'this image'
            ]); //Image file type must be in jpg,png,jpeg format. Maximum size: 3mb]);
            
            if($request->role == 'instructor'){ // if instructor with Image
                $file           = $request->file('image')[0];
                $originalName   = $file->getClientOriginalName();
                $email          = $request->email;
                $cleanedString  = str_replace(".", "_", $email);
                $newName        = $cleanedString.$originalName;
                $path           = $file->storeAs('images',$newName, 'public');
                $request->image = $path;
                $storeName      = $request->image = $path;
                //dd($request->image);
                
                    //dd('im here @ under path');
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'         => 'required',
                    'mName'         => 'required',
                    'lName'         => 'required',
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
                    'subject_id'    => 'required',
                    'age'           => 'nullable',
        
                ],[
                    'fName'                     => 'The first name field is required',
                    'mName'                     => 'The middle name field is required',
                    'lName'                     => 'The last name field is required',
                    'birthDate.before'          =>'Must be at least 17 years old',
                    'gender.required'           => 'Gender is required',
                    'civilStatus.required'      => 'Status is required',
                    'region.required'           => 'Region is required',
                    'province.required'         => 'Province is required',
                    'city.required'             => 'City is required',
                    'barangay.required'         => 'Baranggay is required',
                    'role'                      => 'Role is required',
                    'subject_id'                => 'Subject is required',
                    
                ]));
                
                $user->age          = $age;
                $user->password     = $request->lName; // hashed using accessor mutator in User model
                $user->birthDate    = $date;
                $user->image        = $storeName;
                $user->save();
                return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }
            elseif($request->role == 'student'){ //student with image
                $file               = $request->file('image')[0];
                $originalName       = $file->getClientOriginalName();
                $email              = $request->email;
                $cleanedString      = str_replace(".", "_", $email);
                $newName            = $cleanedString.$originalName;
                $path               = $file->storeAs('images',$newName, 'public');
                $request->image     = $path;
                $storeName          = $request->image = $path;
                //dd($request->image);
                
                    //dd('im here @ under path');
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'         => 'required',
                    'mName'         => 'required',
                    'lName'         => 'required',
                    'gender'        => 'required',
                    'civilStatus'   => 'required',
                    'email'         => 'required|email|unique:users', //unique:user means email field should be unique in the users table
                    'phoneNumber'   => 'required|min:11|max:12',
                    'birthDate'     => 'required|date|before:'.now()->subYears(11)->toDateString(),
                    'image'         =>  'nullable',
                    'region'        => 'required',
                    'province'      => 'required',
                    'city'          => 'required',
                    'barangay'      => 'required',
                    'role'          => 'required',
                    'subject_id'    => 'required',
                    'fatherName'    => 'required',
                    'motherName'    => 'required',
                    'age'           => 'nullable',
        
                ],[
                    'fName'                     => 'The first name field is required',
                    'mName'                     => 'The middle name field is required',
                    'lName'                     => 'The last name field is required',
                    'birthDate.before'          =>'Must be at least 12 years old',
                    'gender.required'           => 'Gender is required',
                    'civilStatus.required'      => 'Status is required',
                    'region.required'           => 'Region is required',
                    'province.required'         => 'Province is required',
                    'city.required'             => 'City is required',
                    'barangay.required'         => 'Baranggay is required',
                    'role'                      => 'Role is required',
                    'subject_id'                => 'Subject is required',
                    'fatherName'                => "The father's name field is required",
                    'motherName'                => "The mother's name field is required",
                    
                ]));
                $user->age          = $age;
                $user->password     = $request->lName; // hashed using accessor mutator in User model
                $user->birthDate    = $date;
                $user->image        = $storeName;
                $user->save();
                return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }
            else{ // if role is admin
                $file = $request->file('image')[0];
                $originalName = $file->getClientOriginalName();
                $email = $request->email;
                $cleanedString = str_replace(".", "_", $email);
                $newName = $cleanedString.$originalName;
                $path = $file->storeAs('images',$newName, 'public');
                $storeName = $request->image = $path;
                
                    //dd('im here @ under path');
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'         => 'required',
                    'mName'         => 'required',
                    'lName'         => 'required',
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
                    'age'           => 'nullable',
                    
                ],[
                    'fName'                     => 'The first name field is required',
                    'mName'                     => 'The middle name field is required',
                    'lName'                     => 'The last name field is required',
                    'birthDate.before'          =>'Must be at least 17 years old',
                    'gender.required'           => 'Gender is required',
                    'civilStatus.required'      => 'Status is required',
                    'region.required'           => 'Region is required',
                    'province.required'         => 'Province is required',
                    'city.required'             => 'City is required',
                    'barangay.required'         => 'Baranggay is required',
                    'role'                      => 'Role is required',
                    
                ]));
                $user->age          = $age;
                $user->password     = $request->lName; // hashed using accessor mutator in User model
                $user->birthDate    = $date;
                $user->image        = $storeName;
                $user->save();
                return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }
           
        }else{ // if no image file
            
            if($request->role == 'instructor'){ //instructor no image
               
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'         => 'required',
                    'mName'         => 'required',
                    'lName'         => 'required',
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
                    'subject_id'    => 'required',
        
                ],[
                    'birthDate.before'          =>'Must be at least 17 years old',
                    'gender.required'           => 'Gender is required',
                    'civilStatus.required'      => 'Status is required',
                    'region.required'           => 'Region is required',
                    'province.required'         => 'Province is required',
                    'city.required'             => 'City is required',
                    'barangay.required'         => 'Baranggay is required',
                    'role'                      => 'Role is required',
                    'subject_id'                => 'Subject is required',
                    'fName'                     => 'The first name field is required',
                    'mName'                     => 'The middle name field is required',
                    'lName'                     => 'The last name field is required',
                ]));
                $user->age          = $age;
                $user->password     = $request->lName; // hashed using accessor mutator in User model
                $user->birthDate    = $date;
                $user->save();
            return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }
            elseif($request->role == 'student'){ // student without image
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'         => 'required',
                    'mName'         => 'required',
                    'lName'         => 'required',
                    'gender'        => 'required',
                    'civilStatus'   => 'required',
                    'email'         => 'required|email|unique:users', //unique:user means email field should be unique in the users table
                    'phoneNumber'   => 'required|min:11|max:12',
                    'birthDate'     => 'required|date|before:'.now()->subYears(11)->toDateString(),
                    'region'        => 'required',
                    'province'      => 'required',
                    'city'          => 'required',
                    'barangay'      => 'required',
                    'role'          => 'required',
                    'subject_id'    => 'required',
                    'fatherName'    => 'required',
                    'motherName'    => 'required',
                    'age'           => 'nullable',
        
                ],[
                    'fName'                     => 'The first name field is required',
                    'mName'                     => 'The middle name field is required',
                    'lName'                     => 'The last name field is required',
                    'birthDate.before'          =>'Must be at least 12 years old',
                    'gender.required'           => 'Gender is required',
                    'civilStatus.required'      => 'Status is required',
                    'region.required'           => 'Region is required',
                    'province.required'         => 'Province is required',
                    'city.required'             => 'City is required',
                    'barangay.required'         => 'Baranggay is required',
                    'role'                      => 'Role is required',
                    'subject_id'                => 'Subject is required',
                ]));
                $user->age          = $age;
                $user->password     = $request->lName; // hashed using accessor mutator in User model
                $user->birthDate    = $date;
                $user->save();
                return redirect()->route('admin.showAllUsers')->with('success', 'Successfully Added new User!');
            }
            else{ //if admin
                $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet
                    'fName'         => 'required',
                    'mName'         => 'required',
                    'lName'         => 'required',
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
                    'age'           => 'nullable',
                    
                ],[
                    'fName'                     => 'The first name field is required',
                    'mName'                     => 'The middle name field is required',
                    'lName'                     => 'The last name field is required',
                    'birthDate.before'          =>'Must be at least 17 years old',
                    'gender.required'           => 'Gender is required',
                    'civilStatus.required'      => 'Status is required',
                    'region.required'           => 'Region is required',
                    'province.required'         => 'Province is required',
                    'city.required'             => 'City is required',
                    'barangay.required'         => 'Baranggay is required',
                    'role'                      => 'Role is required',
                    
                ]));
                $user->age          = $age;
                $user->password     = $request->lName; // hashed using accessor mutator in User model
                $user->birthDate    = $date;
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

        //dd(User::findOrFail($id)->subject);
        //dd(User::with('subject')->get());
        return inertia('AdminDashboard/AdminPages/UserManagement/UserEdit',[
            'user' => User::findOrFail($id),
            'userSubject' => User::findOrFail($id)->subject,
            'subjects' => Subject::all()
        ]);
    }


    public function userDelete(User $user){

        //delete image if there's one
        if($user->image){
            Storage::disk('public')->delete($user->image);
        }
            
        $user->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
