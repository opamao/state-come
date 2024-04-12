<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Services;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::where('etat_service', 0)->get();

        $categories = Categories::join('services', 'categories.service_id', '=', 'services.idservice')
            ->select('categories.*', 'services.libelle_service')
            ->get();

        return view('services.categories', compact('services', 'categories'));
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
            'categorie' => 'required',
            'service' => 'required',
        ];
        $customMessages = [
            'categorie.required' => "Veuillez saisir le libelle de la catégorie",
            'service.required' => "Veuillez sélectionner le service",
        ];
        $this->validate($request, $roles, $customMessages);

        $devise = new Categories();
        $devise->libelle_categorie = $request->categorie;
        $devise->service_id = $request->service;
        $devise->save();

        return back()->with('succes', $request->categorie . " a été ajoué");
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
            'categorie' => 'required',
        ];
        $customMessages = [
            'service.required' => "Veuillez sélectionner service",
            'categorie.required' => "Veuillez saisir le libelle de la catégorie",
        ];
        $this->validate($request, $roles, $customMessages);

        Categories::where('idcategorie', $id)
            ->update(
                [
                    'libelle_categorie' => $request->categorie,
                    'service_id' => $request->service,
                    'etat_categorie' => $request->statut,
                ]
            );

        return back()->with('succes', "La modification a été effectué");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }
}
