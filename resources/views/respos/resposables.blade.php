@extends('layouts.master', [
    'titre' => 'RESPONSABLES',
])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Responsable commercial</h2>
            <p class="mb-0">Your web analytics dashboard template.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-block btn-gray-800 align-items-center" data-bs-toggle="modal"
                data-bs-target="#modal-default">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Responsable
            </button>
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h2 class="h6 modal-title">AJOUT D'UN RESPONSABLE</h2>
                            <button style="background-color: white;" type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form role="for" action="{{ route('respos.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" required class="form-control" name="nom" placeholder="Son nom"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input type="text" required class="form-control" name="prenom"
                                        placeholder="Son prénom" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Son téléphone" type="tel" required class="form-control"
                                        name="phone" aria-describedby="emailHelp">
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
            <div class="ms-2 ms-lg-3">
                <button type="button" class="btn btn-block btn-gray-800 align-items-center" data-bs-toggle="modal"
                    data-bs-target="#modal-objectif">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>
                    Objectif
                </button>
                <div class="modal fade" id="modal-objectif" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h2 class="h6 modal-title">AJOUT D'OBJECTIF</h2>
                                <button style="background-color: white;" type="button" class="btn-close"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form role="for" action="{{ url('details') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    {{-- le mot de passe est genere automatiquement --}}
                                    <div class="mb-3">
                                        <select name="respo" required class="form-select"
                                            aria-label="Default select example">
                                            <option value="" selected="">Responsable</option>
                                            @foreach ($responsables as $respo)
                                                <option value="{{ $respo->id }}">{{ $respo->name }}
                                                    {{ $respo->prenom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select name="service" required class="form-select"
                                            aria-label="Default select example">
                                            <option value="" selected="">Service</option>
                                            @foreach ($services as $item)
                                                <option value="{{ $item->idservice }}">{{ $item->libelle_service }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="date" required class="form-control" name="date">
                                    </div>
                                    <div class="mb-3">
                                        <input placeholder="Objectif" type="number" required class="form-control"
                                            name="objectif">
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
                    <th class="border-gray-200">Responsable</th>
                    <th class="border-gray-200">Contact</th>
                    <th class="border-gray-200">Objectif</th>
                    <th class="border-gray-200">Réalisé</th>
                    <th class="border-gray-200">%</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responsables as $liste)
                    <tr>
                        @php
                            $objectif = \App\Models\Objectifs::where('responsable_id', $liste->id)->sum('objectif');
                            $saisir = \App\Models\SaisirObjectif::where('responsable_id', $liste->id)->sum('quantite');
                        @endphp
                        <td>
                            {{ $liste->id }}
                        </td>
                        <td>
                            <span class="fw-normal">{{ $liste->name }} {{ $liste->prenom }}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $liste->phone }} <br> {{ $liste->email }}</span>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $objectif }}</span>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $saisir }}</span>
                        </td>
                        <td>
                            <div class="d-flex">
                                @if (($objectif * $saisir) / 100 <= 50)
                                    <svg class="icon icon-xs text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @else
                                    <svg class="icon icon-xs text-success me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                                {{ ($objectif * $saisir) / 100 }}%
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-tertiary" href="{{ route('respos.show', $liste->id) }}"
                                type="button">Voir</a>
                            <button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-edit{{ $liste->id }}">Modifier</button>
                            <div class="modal fade" id="modal-edit{{ $liste->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-edit{{ $liste->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h2 class="h6 modal-title">MODIFICATION</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form role="for" action="{{ route('respos.update', $liste->id) }}"
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
                                data-bs-target="#modal-delete{{ $liste->id }}">Supprimer</button>
                            <div class="modal fade" id="modal-delete{{ $liste->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-delete{{ $liste->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h2 class="h6 modal-title">SUPPRESSION</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form role="for" action="{{ route('respos.destroy', $liste->id) }}"
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
