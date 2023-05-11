<?php
namespace App\Http\Controllers;


use App\Mail\FirstMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StrandsController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//****************************************************************************** */
Route::get('/email/verify', function(){
   $isVerified = Auth::user()->email_verified_at;

   if($isVerified){
     return redirect()->route('index');
   }
    return inertia('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');


 //verification mail handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect()->route('index',)->with('success', 'Email was verified');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) { // import this: use Illuminate\Http\Request;
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send'); // 'throttle:attemptTime,minutes'
//mail


//************************************************************************** */
// Route::get('/send-mail', function(){
//     Mail::to('testing@example.com')->send(new FirstMail());
    
// });

//Auth::routes(['verify' => true]);

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/show', [IndexController::class, 'show']);

// Route::controller(IndexController::class)->group(function(){
//     Route::get('/', 'index')->name('index.home');
//     Route::get('/about', 'showAbout')->name('index.about');
//     Route::get('/contact', 'showContact')->name('index.contact');
//     Route::get('/downloads', 'showDownloads')->name('index.downloads');
//     Route::get('/news', 'showNews')->name('index.news');
// });



Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::delete('/logout', 'destroy')->name('logout');
    Route::get('/guest-registration', 'showRegistration')->name('register.guest');
    Route::post('/guest-register', 'storeGuest')->name('register.guestStore');
    
});


Route::controller(MailController::class)->group(function(){
    Route::get('/verify-email', 'showVerify')->name('verify.show');
    Route::get('/verify-email-sent', 'showVerificationSent')->name('verificationSent.show');
    Route::get('/send-mail/{id}', 'sendMail')->name('mail.verify');
    Route::get('/confirmed-email/{id}', 'confirmEmail')->name('mail.confirmed');
});

Route::controller(UserAccountController::class)->group(function(){
    Route::get('/register', 'create')->name('register');
    Route::post('/store', 'store')->name('register.store');
});

Route::controller(AdminDashboardController::class)->group(function(){
    Route::get('/admin/panel', 'showAdminPanel')->name('admin.showAdminPanel');
});

Route::controller(StrandsController::class)->middleware('auth','verified')->group(function(){
    Route::get('/strand/he', 'showHE')->name('strand.showHE');
    Route::get('/strand/ict', 'showICT')->name('strand.showICT');
    Route::get('/strand/ia', 'showIA')->name('strand.showIA');
    Route::get('/strand/smaw', 'showSMAW')->name('strand.showSMAW');
    
});

Route::controller(UserManagementController::class)->middleware(['auth','verified'])->group(function(){
    Route::match(['get','post'],'/admin/panel/users-all', 'showAllUsers')->name('admin.showAllUsers');
    Route::get('/admin/panel/user-add', 'showAddUser')->name('admin.addUser');
    Route::get('/admin/panel/user-edit/{id}', 'showEditUser')->name('admin.editUser');
    Route::delete('/admin/panel/user-delete/{user}', 'userDelete')->name('admin.userDelete');
    Route::post('/admin/panel/user-store', 'userStore')->name('admin.userStore');
    Route::post('/admin/panel/user-update','userUpdate')->name('admin.userUpdate');
    
});

Route::controller(QuestionsController::class)->group(function(){
    Route::get('admin/panel/exam-management/question-all', 'questionsShow' )->name('question.all');
});

Route::controller(ExaminationManagementSystem::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('student-examination/home', 'showExamSystem')->name('studentExamination.show');
});

