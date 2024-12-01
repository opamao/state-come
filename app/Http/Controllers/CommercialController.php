<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Commercial;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type_user == 'directeur') {
            $commercial = Commercial::where("entreprise_id", Auth::user()->entreprise_id)->get();
        } else {
            $commercial = Commercial::where("responsable_id", Auth::user()->id)->get();
        }

        $services = Services::where('entreprise_id', '=', Auth::user()->entreprise_id)->get();
        $clients = Clients::where('entreprise_id', '=', Auth::user()->entreprise_id)->get();

        return view('commercial.commercial', compact('commercial', 'services', 'clients'));
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
            'phone' => 'required',
            'email' => 'required',
            'date' => 'required',
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir son nom",
            'prenom.required' => "Veuillez saisir son prénom",
            'phone.required' => "Veuillez saisir son numéro de téléphone",
            'email.required' => "Veuillez saisir son adresse email",
            'date.required' => "Veuillez sélectionner sa date d'embauche",
        ];
        $this->validate($request, $roles, $customMessages);

        $respo = new Commercial();
        $respo->nom_come = $request->nom;
        $respo->prenom_come = $request->prenom;
        $respo->phone_come = $request->phone;
        $respo->email_come = $request->email;
        $respo->date_embauche_come = $request->date;
        $respo->responsable_id = Auth::user()->id;
        $respo->entreprise_id = Auth::user()->entreprise_id;
        $respo->password_come = Hash::make('1234567890');
        $respo->save();

        return back()->with('succes', $request->nom . " a été ajoué");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comme = Commercial::where('idcome', '=', $id)->first();
    
        return view('commercial.details', compact('comme'));
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
            'date' => 'required',
        ];
        $customMessages = [
            'nom.required' => "Son nom est obligatoire",
            'prenom.required' => "Son prénom est obligatoire",
            'phone.required' => "Son numéro de téléphone est obligatoire",
            'email.required' => "Son adresse email est obligatoire",
            'date.required' => "Sa date d'embauche est obligatoire",
        ];
        $this->validate($request, $roles, $customMessages);

        Commercial::where('idcome', $id)
            ->update(
                [
                    'nom_come' => $request->nom,
                    'prenom_come' => $request->prenom,
                    'phone_come' => $request->phone,
                    'email_come' => $request->email,
                    'date_embauche_come' => $request->date,
                ]
            );

        return back()->with('succes', "La modification a été effectué");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Commercial::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été effectué");
    }
}
