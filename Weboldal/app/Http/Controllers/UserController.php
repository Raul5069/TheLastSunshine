<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\profile;
use Hash;

class UserController extends Controller
{
    public function Reg(){
        if(Auth::check()){
            return view('welcome',[
                'nev' => Auth::user()->name,
                'result' => profile::where('userid', Auth::user()->id)
                            ->get()
            ]);
        } else {
            return view('welcome');
        }
    }

    public function RegData(Request $request){
        $request->validate([
            'name'                   => 'required|unique:users',
            'email'                 => 'required|email|unique:users',
            'password'              => ['required','confirmed', Password::min(8)
                                                                ->letters()
                                                                ->numbers()
                                                                ->mixedCase()],
            'password_confirmation' => 'required'
        ],[
            'name.required'                  => 'Név mező nem lehet üres!',
            'name.unique'                    => 'Ez a felhasználónév már foglalt!',
            'email.unique'                   => 'Ez az email már foglalt!',
            'email.required'                 => 'Email mező nem lehet üres!',
            'email.email'                    => 'Szabványos e-mail címet adjon meg!',
            'password.required'              => 'Jelszó mező nem lehet üres!',
            'password.confirmed'             => 'A két jelszó nem egyezik meg!',
            'password.min'                   => 'Minimum 8 karakter legyen a jelszó!',
            'password.letters'               => 'A jelszó tartalmazzon betüt!',
            'password.numbers'               => 'A jelszó tartalmazzon számot',
            'password.mixedCase'             => 'A jelszónak kis- és nagybetűket kell tartalmaznia!',
            'password_confirmation.required' => 'Jelszó újra mező nem lehet üres!'

        ]);
        $data           = new User;
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/profil');
        } else {
            return redirect('/');
        }
    }

    public function Login(Request $request){
        $request->validate([
            'email'         => 'required|email',
            'password'      => ['required', Password::min(8)
                                                            ->letters()
                                                            ->numbers()
                                                            ->mixedCase()],
            
        ],[
            'email.required'    => 'Email mező nem lehet üres!',
            'email.email'       => 'Szabványos e-mail címet adjon meg!',
            'password.required' => 'Jelszó mező nem lehet üres!',
            'password.min'                   => 'Minimum 8 karakter legyen a jelszó!',
            'password.letters'               => 'A jelszó tartalmazzon betüt!',
            'password.numbers'               => 'A jelszó tartalmazzon számot',
            'password.mixedCase'             => 'A jelszó tartalmazzon kis és nagy betüt!'


        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect('/');
    }
}
