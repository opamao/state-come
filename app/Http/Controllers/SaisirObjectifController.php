<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\SaisirObjectif;
use App\Models\Services;
use Illuminate\Http\Request;

class SaisirObjectifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objectifs = SaisirObjectif::join('objectifs', 'objectifs_ajout.objectif_id', '=', 'objectifs.idobjectif')
            ->join('services', 'objectifs_ajout.service_id', '=', 'services.idservice')
            ->join('categories', 'objectifs_ajout.categorie_id', '=', 'categories.idcategorie')
            ->select(
                'objectifs.objectif',
                'objectifs.idobjectif',
                'objectifs_ajout.idobjectifa',
                'objectifs_ajout.date_objectifa',
                'objectifs_ajout.quantite',
                'services.libelle_service',
                'categories.libelle_categorie',
            )
            ->get();

        $services = Services::where('etat_service', '=', 0)->get();

        return view('objectifs.objectif-dg', compact('objectifs', 'services'));
    }

    function fetch($id)
    {
        dd($id);
        $categorie = Categories::where('service_id', $id)->get();

        return response()->json($categorie);
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
        //
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
