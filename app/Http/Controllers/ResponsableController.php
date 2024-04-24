<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsables = User::where("type_user", "responsable")->get();
        $services = Services::where("etat_service","0")->get();

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

        $respo = new User();
        $respo->name = $request->nom;
        $respo->email = $request->email;
        $respo->prenom = $request->prenom;
        $respo->phone = $request->phone;
        $respo->type_user = 'responsable';
        $respo->password = Hash::make('1234567890');
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

        return back()->with('succes', "La suppression a été efecctué");
    }
}
