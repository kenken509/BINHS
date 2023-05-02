<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function questionsShow(){

        
            return inertia('AdminDashboard/AdminPages/ExaminationManagement/QuestionsManagement/QuestionsAll',[
                'questions' => Question::with('choices')->get(),
        ]);
    }
}
