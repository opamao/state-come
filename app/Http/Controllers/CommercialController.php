<?php

namespace App\Http\Controllers;

use App\Models\Commercial;
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
        $commercial = Commercial::where("responsable_id", Auth::user()->id)->get();

        return view('commercial.commercial', compact('commercial'));
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
        ];
        $customMessages = [
            'nom.required' => "Veuillez saisir le nom",
            'prenom.required' => "Veuillez saisir le prénom",
            'phone.required' => "Veuillez saisir le téléphone",
            'email.required' => "Veuillez saisir le email",
        ];
        $this->validate($request, $roles, $customMessages);

        $respo = new Commercial();
        $respo->nom_come = $request->nom;
        $respo->prenom_come = $request->email;
        $respo->phone_come = $request->prenom;
        $respo->email_come = $request->phone;
        $respo->responsable_id = 'responsable';
        $respo->entreprise_id = 'responsable';
        $respo->password_come = Hash::make('1234567890');
        $respo->save();

        return back()->with('succes', $request->nom . " a été ajoué");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
