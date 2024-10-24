<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsables = User::where("type_user", "responsable")
            ->where("directeur_id", Auth::user()->id)
            ->get();
        $services = Services::where("etat_service", "0")
            ->where("entreprise_id", Auth::user()->entreprise_id)
            ->get();

        return view('respos.resposables', compact('responsables', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = [
            'nom' => 'required',
            'prenom' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom",
            'prenom.required' => "Veuillez saisir le prénom",
            'phone.required' => "Veuillez saisir le téléphone",
            'phone.unique' => "Le numéro de téléphone est déjà utilisé. Veuillez essayer un eutre!",
            'email.required' => "Veuillez saisir l'email",
            'email.unique' => "L'adresse email est déjà utilisé. Veuillez essayer un autre!",
        ];
        $this->validate($request, $roles, $customMessages);

        $respo = new User();
        $respo->name = $request->nom;
        $respo->email = $request->email;
        $respo->prenom = $request->prenom;
        $respo->phone = $request->phone;
        $respo->type_user = 'responsable';
        $respo->password = Hash::make('1234567890');
        $respo->entreprise_id = Auth::user()->entreprise_id;
        $respo->directeur_id = Auth::user()->id;

        if ($respo->save()) {
            return back()->with('succes', $request->nom . " a été ajoué");
        } else {
            return back()->withErrors(["Une erreur est survenue. Veuillez réessayer!"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = [
            'nom' => 'required',
            'prenom' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom",
            'prenom.required' => "Veuillez saisir le prénom",
            'phone.required' => "Veuillez saisir le téléphone",
            'email.required' => "Veuillez saisir le email",
        ];
        $this->validate($request, $roles, $customMessages);

        User::where('id', $id)
            ->update(
                [
                    'name' => $request->nom,
                    'email' => $request->email,
                    'prenom' => $request->prenom,
                    'phone' => $request->phone,
                ]
            );

        return back()->with('succes', "La modification a été effectué");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été effectué");
    }
}
