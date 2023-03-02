<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecondController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('showString1');
    }

    public function showString(){
        return 'Peter Anwer';
    }
    public function showString1(){
        return 'Peter Anwer 1';
    }
    public function showString2(){
        return 'Peter Anwer 2';
    }
}
