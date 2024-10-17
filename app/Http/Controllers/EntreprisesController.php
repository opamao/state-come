<?php

namespace App\Http\Controllers;

use App\Models\Entreprises;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EntreprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprise = Entreprises::join('users', 'entreprises.identre', '=', 'users.entreprise_id')->get();

        return view("entreprises.entreprises", compact('entreprise'));
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
            'logo' => 'required|file',
            'libelle' => 'required',
            'local' => 'required',
        ];
        $customMessages = [
            'nom.required' => "Nom représentant obligatoire",
            'prenom.required' => "Prénom représentant obligatoire",
            'phone.required' => "Phone représentant obligatoire",
            'email.required' => "Email représentant obligatoire",
            'libelle.required' => "Nom entreprise obligatoire",
            'local.required' => "Localisation entreprise obligatoire",
            'logo.required|file' => "Logo entreprise obligatoire",
        ];
        $this->validate($request, $roles, $customMessages);

        $fileLogoWithExtension = $request->file('logo')->getClientOriginalName();
        $imageLogo = 'logo_entreprise_' . time() . '_' . '.' . $fileLogoWithExtension;
        $request->file('logo')->move(public_path('/logoentreprise'), $imageLogo);

        $entreprise = new Entreprises();
        $entreprise->libelle_entre = $request->libelle;
        $entreprise->logo_entre = $imageLogo;
        $entreprise->localisation_entre = $request->local;
        $entreprise->adresse_entre = $request->adresse;
        $entreprise->contact_entre = $request->contact;

        if ($entreprise->save()) {
            $user = new User();
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->prenom = $request->prenom;
            $user->phone = $request->phone;
            $user->type_user = 'directeur';
            $user->directeur_id = null;
            $user->entreprise_id = $entreprise->identre;
            $user->password = Hash::make('1234567890');

            if ($user->save()) {
                return back()->with('succes',  "L'entreprise a été ajoué");
            } else {
                return back()->withErrors(["L'entreprise a été créé.", "Impossible de créer le directeur."]);
            }
        } else {
            return back()->withErrors(["Impossible de créer l'entreprise. Veuillez réessayer!!"]);
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

        Entreprises::where('id', $id)
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
        Entreprises::findOrFail($id)->delete();

        return back()->with('succes', "La suppression a été efecctué");
    }
}
