<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    public function showUserName(){
        return 'Peter Anwer';
    }

//    public function getIndex(){
//        $data = [];
//        $data['data'] = 'عم الناس';
//        $data['type'] = 'تمساح';
//        return view('welcome', $data);
//    }

    public function getIndex(){
        $obj = new \stdClass;
        $obj->name = 'Abser';
        $obj->type = 'crocodile';
        return view('welcome', compact('obj'));
    }
}
