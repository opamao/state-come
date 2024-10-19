@extends('layouts.master', [
    'titre' => 'ENTREPRISE',
])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">{{ $entreprise->libelle_entre }}</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Partager</button>
            </div>
        </div>
    </div>

    @include('layouts.statut')

    <div class="col-12 mb-4">
        <form action="{{ route('entreprise.update', $entreprise->identre) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card border-0 shadow components-section">
                <div class="card-header bg-info text-white">
                    <h4>Entreprise</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <input value="entreprise" type="hidden" required class="form-control"
                            name="controle" placeholder="Nom de l'entreprise" aria-describedby="emailHelp">
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <img style="height: 150px; width: 150px;" class="avatar rounded-circle"
                                    src="{{ asset('logoentreprise' . '/' . $entreprise->logo_entre) }}" alt="Logo">
                                <input type="file" class="form-control" name="logo"
                                    placeholder="Le logo de l'entreprise" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <small>Entreprise</small>
                                <input value="{{ $entreprise->libelle_entre }}" type="text" required class="form-control"
                                    name="libelle" placeholder="Nom de l'entreprise" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <small>Localisation</small>
                                <input value="{{ $entreprise->localisation_entre }}" placeholder="Ou se situe l'entreprise"
                                    type="text" required class="form-control" name="local"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <small>Contact</small>
                                <input value="{{ $entreprise->contact_entre }}" placeholder="Contact entreprise"
                                    type="tel" class="form-control" name="contact" id="email"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <small>Adresse</small>
                                <input value="{{ $entreprise->adresse_entre }}" placeholder="Adresse email entreprise"
                                    type="email" class="form-control" name="adresse" id="email"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="text-align: right;">
                    <button type="submit" class="btn btn-info">Modifier</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 mb-4">
        <form action="{{ route('entreprise.update', $entreprise->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card border-0 shadow components-section">
                <div class="card-header bg-info text-white">
                    <h4>Représentant</h4>
                </div>
                <div class="card-body">
                    <input value="representant" type="hidden" required class="form-control"
                            name="controle" placeholder="Nom de l'entreprise" aria-describedby="emailHelp">
                    <div class="row mb-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <small>Nom</small>
                                <input type="text" value="{{ $entreprise->name }}" required class="form-control"
                                    name="nom" placeholder="Son nom" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <small>Prénom</small>
                                <input type="text" value="{{ $entreprise->prenom }}" required class="form-control"
                                    name="prenom" placeholder="Son prénom" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <small>Téléphone</small>
                                <input value="{{ $entreprise->phone }}" placeholder="Son téléphone" type="tel" required
                                    class="form-control" name="phone" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <small>E-mail</small>
                                <input value="{{ $entreprise->email }}" placeholder="Son adresse email" type="email"
                                    required class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="text-align: right;">
                    <button type="submit" class="btn btn-info">Modifier</button>
                </div>
            </div>
        </form>
    </div>
@endsection
