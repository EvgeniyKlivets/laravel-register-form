<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //повернення сторінки з формою реєстрації
    
    public function create()
    {
        //dd(session()->all());
        //dd(session('errors')); //виводить помилки
        return view('login');
        //return view('auth.register');
    }

    //створення нового користувача
    public function store(Request $request)//import down
    {
        //validate
        $credentials = $request->validate([

            //масіви
           // 
            'email'=>['required','string', 'email',],//унікальні емайли з табл. юзерс
            'password'=>['required','string']//перевірка пароля з мінімальною кіл.сиволів 8
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) 
        {
            //throw ValidationException::withMessages([
               // 'email'=>'These credentails do not match our records.'
           // ]);
            return back()
                ->withInput()//раніше введені дані 
                ->withErrors([
                'email'=>'These credentails do not match our records.'
            ]); 

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
            
        }
        
    }
       //destroy session
    public function destroy(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('welcome');
        }
    
}
