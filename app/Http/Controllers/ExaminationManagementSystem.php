<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExaminationManagementSystem extends Controller
{
    public function showExamSystem(){
        return inertia('ExaminationManagementSystem/StudentHomeShow');
    }
}
