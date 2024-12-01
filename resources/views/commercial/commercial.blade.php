@extends('layouts.master', [
    'titre' => 'TACHES ET RENDEZ-VOUS',
])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Mes commerciaux</h2>
            <p class="mb-0">Liste de mes commerciaux</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-block btn-gray-800 align-items-center" data-bs-toggle="modal"
                data-bs-target="#modal-default">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Commercial
            </button>
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h2 class="h6 modal-title">AJOUT D'UN COMMERCIAL</h2>
                            <button style="background-color: white;" type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form role="for" action="{{ route('comme.store') }}" method="POST">
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
                                    <input placeholder="Son numéro de téléphone" type="tel" required
                                        class="form-control" name="phone" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Son adresse email" type="email" required class="form-control"
                                        name="email" id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <small>Sa date d'embauche</small>
                                    <input placeholder="Sa date d'embauche" type="date" required class="form-control"
                                        name="date" id="date" aria-describedby="dateHelp">
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
                                    <div class="mb-3">
                                        <select name="respo" required class="form-select"
                                            aria-label="Default select example">
                                            <option value="" selected="">Commercial</option>
                                            @foreach ($commercial as $comme)
                                                <option value="{{ $comme->idcome }}">{{ $comme->nom_come }}
                                                    {{ $comme->prenom_come }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select name="service" class="form-select" aria-label="Default select example">
                                            <option value="" selected="">Service</option>
                                            @foreach ($services as $item)
                                                <option value="{{ $item->idservice }}">{{ $item->libelle_service }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select name="client" class="form-select" aria-label="Default select example">
                                            <option value="" selected="">Client</option>
                                            @foreach ($clients as $clie)
                                                <option value="{{ $clie->idclient }}">{{ $clie->nom_client }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <small for="">Date début</small>
                                            <input type="date" required class="form-control" name="dateDebut">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <small for="">Date fin</small>
                                            <input type="date" required class="form-control" name="dateFin">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input placeholder="Quota vente" type="number" required class="form-control"
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
                    <th class="border-gray-200">Nom & prénom</th>
                    <th class="border-gray-200">Contact</th>
                    <th class="border-gray-200">Embauche</th>
                    <th class="border-gray-200">Objectif</th>
                    <th class="border-gray-200">Réalisé</th>
                    <th class="border-gray-200">%</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commercial as $liste)
                    <tr>
                        @php
                            $i = 1;
                            $objectif = \App\Models\Objectifs::join(
                                'commercial',
                                'objectifs.commercial_id',
                                '=',
                                'commercial.idcome',
                            )
                                ->where('commercial.responsable_id', $liste->id)
                                ->sum('objectifs.quota_ventes');
                            $saisir = \App\Models\SaisirObjectif::where('responsable_id', $liste->id)->sum('quantite');
                        @endphp
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            <span class="fw-normal">{{ $liste->nom_come }} <br> {{ $liste->prenom_come }}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $liste->phone_come }} <br> {{ $liste->email_come }}</span>
                        </td>
                        <td>
                            <span class="fw-normal">{{ $liste->date_embauche_come }}</span>
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
                            <a class="btn btn-sm btn-tertiary" href="{{ route('comme.show', $liste->idcome) }}"
                                type="button">Voir</a>
                            <button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-edit{{ $liste->idcome }}">Modifier</button>
                            <div class="modal fade" id="modal-edit{{ $liste->idcome }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-edit{{ $liste->idcome }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h2 class="h6 modal-title">MODIFICATION</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form role="for" action="{{ route('comme.update', $liste->idcome) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="text" value="{{ $liste->nom_come }}" required
                                                        class="form-control" name="nom" placeholder="Son nom"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" value="{{ $liste->prenom_come }}" required
                                                        class="form-control" name="prenom" placeholder="Son prénom"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input value="{{ $liste->phone_come }}" placeholder="Son téléphone"
                                                        type="tel" required class="form-control" name="phone"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <input value="{{ $liste->email_come }}"
                                                        placeholder="Son adresse email" type="email" required
                                                        class="form-control" name="email" id="email"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <small>Sa date d'embauche</small>
                                                    <input value="{{ $liste->date_embauche_come }}"
                                                        placeholder="Sa date d'embauche" type="date" required
                                                        class="form-control" name="date" id="date"
                                                        aria-describedby="dateHelp">
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
                                data-bs-target="#modal-delete{{ $liste->idcome }}">Supprimer</button>
                            <div class="modal fade" id="modal-delete{{ $liste->idcome }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-delete{{ $liste->idcome }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h2 class="h6 modal-title">SUPPRESSION</h2>
                                            <button style="background-color: white;" type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form role="for" action="{{ route('comme.destroy', $liste->idcome) }}"
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
