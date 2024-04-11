<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $services = Services::all();

        return view('services.services', compact('services'));
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
            'libelle' => 'required',
            'code' => 'required',
            'valeur' => 'required',
        ];
        $customMessages = [
            'libelle.required' => "Veuillz saisir le libelle de la devise",
            'code.required' => "Veuillez saisir le code de la devise",
            'valeur.required' => "Veuillez saisir la valeur de la devise",
        ];
        $this->validate($request, $roles, $customMessages);

        $devise = new Devises();
        $devise->id_devise =  Str::uuid();
        $devise->libelle_devise = $request->libelle;
        $devise->code_devise = $request->code;
        $devise->valeur_devise = $request->valeur;
        $devise->save();

        return back()->with('succes', $request->libelle . " a été ajoué");
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
            'libelle' => 'required',
            'code' => 'required',
            'valeur' => 'required',
        ];
        $customMessages = [
            'libelle.required' => "Veuillz saisir le libelle de la devise",
            'code.required' => "Veuillez saisir le code de la devise",
            'valeur.required' => "Veuillez saisir la valeur de la devise",
        ];
        $this->validate($request, $roles, $customMessages);

        Devises::where('id_devise', $id)
            ->update(
                [
                    'libelle_devise' => $request->libelle,
                    'code_devise' => $request->code,
                    'valeur_devise' => $request->valeur,
                ]
            );

        return back()->with('succes', "La modification a été effectué");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Devises::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }
}
