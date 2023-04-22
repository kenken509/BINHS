<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrandsController extends Controller
{
    public function showHE(){
        print_r('this is home economics page');
    }

    public function showICT(){
        print_r('this is Information and Communications Technology (ICT) page');
    }

    public function showIA(){
        print_r('this is Industrial Arts page');
    }

    public function showSMAW(){
        print_r('this is home Shielded metal arc welding page');
    }
}
