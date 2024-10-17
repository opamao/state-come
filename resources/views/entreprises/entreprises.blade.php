@extends('layouts.master', [
    'titre' => 'ENTREPRISE',
])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Entreprises</h2>
            <p class="mb-0">Liste des entreprises</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-block btn-gray-800 align-items-center" data-bs-toggle="modal"
                data-bs-target="#modal-default">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Entreprise
            </button>
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h2 class="h6 modal-title">AJOUT D'UNE ENTREPRISE</h2>
                            <button style="background-color: white;" type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form role="for" action="{{ route('entreprise.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" required class="form-control" name="libelle"
                                        placeholder="Nom de l'entreprise" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input type="file" required class="form-control" name="logo"
                                        placeholder="Le logo de l'entreprise" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Ou se situe l'entreprise" type="text" required
                                        class="form-control" name="local" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Adresse email entreprise" type="email" class="form-control"
                                        name="adresse" id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Contact entreprise" type="tel" class="form-control"
                                        name="contact" id="email" aria-describedby="emailHelp">
                                </div>

                                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

                                <label for="">Représentant</label>

                                <div class="mb-3">
                                    <input type="text" required class="form-control" name="nom" placeholder="Son nom"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input type="text" required class="form-control" name="prenom"
                                        placeholder="Son prénom" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Son numéro de téléphone" type="tel" required
                                        class="form-control" name="phone" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Son adresse email" type="email" required class="form-control"
                                        name="email" id="email" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary">Ajouter</button>
                                <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                    data-bs-dismiss="modal">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="btn-group ms-2 ms-lg-3">
                {{-- <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button> --}}
                <button type="button" class="btn btn-sm btn-outline-gray-600">Exporter</button>
            </div>
        </div>
    </div>

    @include('layouts.statut')

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">Logo   </th>
                    <th class="border-gray-200">Représentant</th>
                    <th class="border-gray-200">Entreprise</th>
                    <th class="border-gray-200">Localisation</th>
                    <th class="border-gray-200">Adresse</th>
                    <th class="border-gray-200">Contact</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entreprise as $liste)
                    <tr>
                        <td>
                            <img class="avatar rounded-circle"
                                src="{{ asset('logoentreprise' . '/' . $liste->logo_entre) }}" alt="Logo">
                        </td>
                        <td>
                            <span class="fw-normal">
                                {{ $liste->name }} {{ $liste->prenom }}
                                <br>
                                {{ $liste->phone }}
                                <br>
                                {{ $liste->email }}
                            </span>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $liste->libelle_entre }}</span>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $liste->localisation_entre }}</span>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $liste->adresse_entre }}</span>
                        </td>
                        <td>
                            <div class="d-flex">
                                {{ $liste->contact_entre }}
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-tertiary" href="{{ route('respos.show', $liste->identre) }}"
                                type="button">Voir</a>
                            <button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-edit{{ $liste->identre }}">Modifier</button>
                            <div class="modal fade" id="modal-edit{{ $liste->identre }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-edit{{ $liste->identre }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h2 class="h6 modal-title">MODIFICATION</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form role="for" action="{{ route('respos.update', $liste->identre) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="text" value="{{ $liste->name }}" required
                                                        class="form-control" name="nom" placeholder="Son nom"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" value="{{ $liste->prenom }}" required
                                                        class="form-control" name="prenom" placeholder="Son prénom"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input value="{{ $liste->phone }}" placeholder="Son téléphone"
                                                        type="tel" required class="form-control" name="phone"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input value="{{ $liste->email }}" placeholder="Son adresse email"
                                                        type="email" required class="form-control" name="email"
                                                        id="email" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info">Modifier</button>
                                                <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-delete{{ $liste->identre }}">Supprimer</button>
                            <div class="modal fade" id="modal-delete{{ $liste->identre }}" tabindex="-1"
                                role="dialog" aria-labelledby="modal-delete{{ $liste->identre }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h2 class="h6 modal-title">SUPPRESSION</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form role="for" action="{{ route('respos.destroy', $liste->identre) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                Êtes-vous sûre de vouloir supprimer?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
