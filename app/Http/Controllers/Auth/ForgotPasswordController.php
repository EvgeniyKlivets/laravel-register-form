<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Providers\RouteServiceProvider;
//use Illuminate\Support\Facades\Auth;
//use Dotenv\Exception\ValidationException;



class ForgotPasswordController extends Controller
{
    //повернення сторінки з формою реєстрації
    
    public function create()
    {
        //dd(session()->all());
        //dd(session('errors')); //виводить помилки
        return view('forgot-password');
        //return view('auth.register');
    }

    //створення нового користувача
    public function store(Request $request)//import down
    {
        //validate
       $request->validate([

            'email'=>['required', 'email',]//унікальні емайли з табл. юзерс
            
        ]);

        
        
    }
      
    
    
}