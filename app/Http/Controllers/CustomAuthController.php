<?php

namespace App\Http\Controllers;

use App\Models\Objectifs;
use App\Models\SaisirObjectif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function customLogin(Request $request)
    {
        $roles = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $customMessages = [
            'email.required|email' => "Veuillez saisir votre adresse email",
            'password.required' => "Veuillez saisir cotre mot de passe",
        ];
        $this->validate($request, $roles, $customMessages);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Lorque les paramètres sont valides, garde les informations dans la session
            Auth::login($user);

            if (Auth::user()->type_user == 'responsable') {

                return redirect()->intended('objectifsdg')->withSuccess('Bon retour');

            } else if (Auth::user()->type_user == 'directeur') {

                return redirect()->intended('dashboard')->withSuccess('Bon retour');

            }

            return redirect('index')->withErrors(["Vous n'êtes pas autoriser"]);
        } else {
            // Les identifiants ne sont pas valides
            return back()->withInput()->withErrors(['E-mail ou mot de passe incorrect']);
        }
    }

    public function dashboard()
    {
        $listCome = User::where('type_user', 'responsable')->get();
        $nbreCome = User::where('type_user', 'responsable')->count();
        $sommeObjectif = Objectifs::sum('objectif');
        $sommeSaisirObjectif = SaisirObjectif::sum('quantite');

        // if (Auth::check()) {
        return view('dashboard.dashboard', compact('listCome', 'nbreCome', 'sommeObjectif', 'sommeSaisirObjectif'));
        // }

        // return redirect("index")->withErrors(["Vous n'êtes pas autorisé à accéder"]);
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('index');
    }
}
