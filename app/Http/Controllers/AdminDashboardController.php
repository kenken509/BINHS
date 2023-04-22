<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    function showAdminPanel(){
        return inertia('AdminDashboard/AdminPages/Dashboard'); 
     }
 
}
