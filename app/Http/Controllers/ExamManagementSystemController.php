<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamManagementSystemController extends Controller
{
    function showAdminPanel(){
         return inertia('ExaminationManagement/Dashboard');
     }
 
}
