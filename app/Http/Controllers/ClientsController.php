<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::all();

        return view('clients.client', compact('clients'));
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
            'type' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom",
            'type.required' => "Veuillez sélectionner le type de votre client",
            'phone.required' => "Veuillez saisir le téléphone",
            'email.required' => "Veuillez saisir le email",
        ];
        $this->validate($request, $roles, $customMessages);

        $client = new Clients();
        $client->nom_client = $request->nom;
        $client->email_client = $request->email;
        $client->type_client = $request->type;
        $client->phone_client = $request->phone;
        $client->adresse_client = $request->adresse;
        $client->entreprise_id = Auth::user()->entreprise_id;

        if ($client->save()) {
            return back()->with('succes', $request->nom . " a été ajoué");
        } else {
            return back()->withErrors(["Impossible d'enregistrer votre client. Veuillez reessayer!"]);
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
            'type' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom",
            'type.required' => "Veuillez sélectionner le type de votre client",
            'phone.required' => "Veuillez saisir le téléphone",
            'email.required' => "Veuillez saisir le email",
        ];
        $this->validate($request, $roles, $customMessages);

        Clients::where('idclient', $id)
            ->update(
                [
                    'nom_client' => $request->nom,
                    'email_client' => $request->email,
                    'type_client' => $request->type,
                    'phone_client' => $request->phone,
                    'adresse_client' => $request->adresse,
                ]
            );

        return back()->with('succes', "La modification a été effectué");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Clients::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été effectué");
    }
}
