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
            'service' => 'required',
        ];
        $customMessages = [
            'service.required' => "Veuillez saisir le libelle du service",
        ];
        $this->validate($request, $roles, $customMessages);

        $devise = new Services();
        $devise->libelle_service = $request->service;
        $devise->save();

        return back()->with('succes', $request->service . " a été ajoué");
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
            'service' => 'required',
        ];
        $customMessages = [
            'service.required' => "Veuillez saisir le libelle du service",
        ];
        $this->validate($request, $roles, $customMessages);

        Services::where('idservice', $id)
            ->update(
                [
                    'libelle_service' => $request->service,
                    'etat_service' => $request->statut,
                ]
            );

        return back()->with('succes', "La modification a été effectué");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Services::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }
}
