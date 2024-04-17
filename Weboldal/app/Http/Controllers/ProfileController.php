<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\profile;


class ProfileController extends Controller
{
    public function NewProfile(Request $request){
        $request->validate([
            'age' => 'required|numeric|min:18|max:99',
            'telszam' => 'required|min:11|max:11',
            'kedvetel' => 'required|max:30',
            'bio' => 'required|max:200'
        ],[

            'age.max' => 'A valós életkorodat add meg!',
            'age.min' => 'A regisztrációhoz 18 évesnek kell lenned!',
            'age.required' => 'Add meg az életkorod!',
            'bio.required' => 'A leírást kötelező megadni!',
            'bio.max' => 'Maximum 200 karakter lehet a biód',
            'telszam.required' => 'Létező telefonszámot adjon meg a helyes formátum: 00 00 000 0000',
            'telszam.max' => '11 karakterű létező telefonszámot adjon meg a helyes formátum: 00 00 000 0000',
            'telszam.min' => '11 karakterű létező telefonszámot adjon meg a helyes formátum: 00 00 000 0000',
            'kedvetel.required' => 'A semmin kívül csak szeretsz valamit',
            'kedvetel.max' => 'Csak egy fajta ételt adjál meg!'
        ]);
        $data = new profile;
        $data->userid = Auth::user()->id;
        $data->age = $request->age;
        $data->telszam = $request->telszam;
        $data->kedvetel = $request->kedvetel;
        if($request->gender == 1){
            $data->gender = 'm';
        } else {
            $data->gender = 'f';
        }
        $data->bio = $request->bio;
        $data->Save();
        return redirect('/sajatprofil');
    }

    public function GetProfileData($id){
        return view('profil_mod',[
            'result'=>profile::find($id),
            'id'    => $id
        ]);
    }

    public function ProfileMod(Request $request){
        if(!Auth::check()){
            return;
        }
        $request->validate([
            'bio' => 'required|max:200',
            'kedvetel' => 'required|max:30',
            'telszam' => 'required|min:11|max:11'
        ],[
            'bio.required' => 'A leírást kötelező megadni!',
            'bio.max' => 'Maximum 200 karakter lehet a biód',
            'kedvetel.max' => 'Csak egy fajta ételt adjál meg!',
            'telszam.required' => 'Létező telefonszámot adjon meg a helyes formátum: 00 00 000 0000',
            'telszam.max' => '11 karakterű létező telefonszámot adjon meg a helyes formátum: 00 00 000 0000',
            'telszam.min' => '11 karakterű létező telefonszámot adjon meg a helyes formátum: 00 00 000 0000',
            'kedvetel.required' => 'A semmin kívül csak szeretsz valamit'
        ]);
        $data = profile::where('userid','like', Auth::user()->id)->first();
        $data->telszam = $request->telszam;
        $data->kedvetel = $request->kedvetel;
        $data->bio    = $request->bio;
        $data->Save();
        return redirect('/sajatprofil');
    }

    public function Felhasznalok(Request $request){
        if(Auth::check()){
            return view('felhasznalok',[
                'result' => profile::select('users.name','profiles.id','profiles.age',
                                            'profiles.bio','profiles.gender','users.email','profiles.kedvetel')
                                           ->join('users','users.id','profiles.userid')

                                           ->get()

            ]);


        } else{
            return redirect('/');
        }
    }





    public function Adatlap($id){
        if(Auth::check()){
            return view('adatlap',[
                'result' => profile::select('users.id','users.name', 'users.email','profiles.age',
                                            'profiles.bio', 'profiles.gender', 'profiles.telszam','profiles.kedvetel')
                                            ->join('users','users.id','profiles.userid')
                                            ->where('profiles.id',$id)
                                            ->get()
            ]);
        } else{
            return redirect('/');
        }
    }

    public function SajatProfil(){
        if(Auth::check()){

            return view('sajatprofil',[
                'result' => profile::select('users.id','users.name','users.email','profiles.age',
                                            'profiles.bio','profiles.gender','profiles.telszam','profiles.kedvetel')
                                            ->join('users','users.id','profiles.userid')
                                            ->where('profiles.userid',Auth::user()->id)
                                            ->get()
            ]);
        } else{
            return redirect('/');
        }
    }

    public function ProfMod(){
        if(Auth::check()){

            return view('profil_mod',[
                'result' => profile::select('users.id','users.name','users.email','profiles.age',
                                            'profiles.bio','profiles.gender','profiles.telszam','profiles.kedvetel')
                                            ->join('users','users.id','profiles.userid')
                                            ->where('profiles.userid',Auth::user()->id)
                                            ->first()
            ]);
        } else{
            return redirect('/');
        }
    }



    public function Rolunk(){
        return view('/rolunk');



    }

    public function Letoltes(){
        return view('/letoltes');



    }
}
