<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrandsController extends Controller
{
    public function showHE(){
        return inertia('Index/WebPages/Strands/HomeEconomics');
    }

    public function showICT(){
        return inertia('Index/WebPages/Strands/ICT');
    }

    public function showIA(){
        return inertia('Index/WebPages/Strands/IndustrialArts');
    }

    public function showSMAW(){
        return inertia('Index/WebPages/Strands/SMAW');
    }
}
