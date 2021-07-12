<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('interfaces.template.register');
        //return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'sexe' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            "telephone"=>"required|string|max:30",
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

         function useravatar(Request $request){
            return $request->avatar?Storage::disk("public")->put("avatar",$request->avatar):"avatar/default.png";
        }
        $user = User::create([
            'nom' =>$request->nom,
            'prenom' =>$request->prenom,
            'sexe' =>$request->sexe,
            'email' =>$request->email,
            "telephone"=>$request->telephone,
            'avatar' =>useravatar($request),
            "created_at"=>now(),
            "etat"=>1,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
