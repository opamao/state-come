@extends('layouts.master', [
    'titre' => 'RESPONSABLES',
])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Clients & Prospects</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-block btn-gray-800 align-items-center" data-bs-toggle="modal"
                data-bs-target="#modal-default">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Client
            </button>
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h2 class="h6 modal-title">AJOUT D'UN CLIENT</h2>
                            <button style="background-color: white;" type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form role="for" action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" required class="form-control" name="nom" placeholder="Son nom"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Son téléphone" type="tel" required class="form-control"
                                        name="phone" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Son adresse email" type="email" required class="form-control"
                                        name="email" id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Sa localisation" type="text" class="form-control" name="adresse"
                                        id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <select name="type" required class="form-select" aria-label="Default select example">
                                        <option value="" selected="">Type client</option>
                                        <option value="client">Client</option>
                                        <option value="prospect">Prospect</option>
                                    </select>
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
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Client</th>
                    <th class="border-gray-200">Contact</th>
                    <th class="border-gray-200">E-mail</th>
                    <th class="border-gray-200">Adresse</th>
                    <th class="border-gray-200">Type</th>
                    <th class="border-gray-200"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $liste)
                    <tr>
                        @php
                            $i = 1;
                        @endphp
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            <span class="fw-normal">{{ $liste->nom_client }}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $liste->email_client }}</span>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $liste->phone_client }}</span>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $liste->adresse_client }}</span>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $liste->type_client }}</span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-tertiary" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-view{{ $liste->idclient }}">Voir</button>
                            <div class="modal fade" id="modal-view{{ $liste->idclient }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-view{{ $liste->idclient }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-tertiary text-white">
                                            <h2 class="h6 modal-title">DÉTAILS</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <small>Nom</small>
                                                <h5>{{ $liste->nom_client }}</h5>
                                            </div>
                                            <div class="mb-3">
                                                <small>Téléphone</small>
                                                <h5>{{ $liste->phone_client }}</h5>
                                            </div>
                                            <div class="mb-3">
                                                <small>E-mail</small>
                                                <h5>{{ $liste->email_client }}</h5>
                                            </div>
                                            @if ($liste->adresse_client == null)
                                            @else
                                                <div class="mb-3">
                                                    <small>Adresse</small>
                                                    <h5>{{ $liste->adresse_client }}</h5>
                                                </div>
                                            @endif
                                            <div class="mb-3">
                                                <small>Type client</small>
                                                <h5>
                                                    {{ $liste->type_client }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-tertiary text-white ms-auto"
                                                data-bs-dismiss="modal">Compris</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-edit{{ $liste->idclient }}">Modifier</button>
                            <div class="modal fade" id="modal-edit{{ $liste->idclient }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-edit{{ $liste->idclient }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h2 class="h6 modal-title">DÉTAILS</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form role="for" action="{{ route('clients.update', $liste->idclient) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input value="{{ $liste->nom_client }}" type="text" required
                                                        class="form-control" name="nom" placeholder="Son nom"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input value="{{ $liste->phone_client }}" placeholder="Son téléphone"
                                                        type="tel" required class="form-control" name="phone"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input value="{{ $liste->email_client }}"
                                                        placeholder="Son adresse email" type="email" required
                                                        class="form-control" name="email" id="email"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input value="{{ $liste->adresse_client }}"
                                                        placeholder="Sa localisation" type="text" class="form-control"
                                                        name="adresse" id="email" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <select name="type" required class="form-select"
                                                        aria-label="Default select example">
                                                        <option value="{{ $liste->type_client }}" selected="">Type
                                                            client</option>
                                                        <option value="client">Client</option>
                                                        <option value="prospect">Prospect</option>
                                                    </select>
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
                                data-bs-target="#modal-delete{{ $liste->idclient }}">Supprimer</button>
                            <div class="modal fade" id="modal-delete{{ $liste->idclient }}" tabindex="-1"
                                role="dialog" aria-labelledby="modal-delete{{ $liste->idclient }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h2 class="h6 modal-title">SUPPRESSION</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form role="for" action="{{ route('clients.destroy', $liste->idclient) }}"
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
