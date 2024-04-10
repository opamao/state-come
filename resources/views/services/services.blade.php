@extends('layouts.master', [
    'titre' => 'RESPONSABLES',
])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">

            <h2 class="h4">Services</h2>
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
                Service
            </button>
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h2 class="h6 modal-title">AJOUT DE SERVICE</h2>
                            <button style="background-color: white;" type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form role="for" action="#" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" required class="form-control" name="service"
                                        placeholder="Libelle service" aria-describedby="emailHelp">
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
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Libellé</th>
                    <th class="border-gray-200">Statut</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="#" class="fw-bold">
                            456423
                        </a>
                    </td>
                    <td>
                        <span class="fw-normal">Platinum Subscription Plan</span>
                    </td>
                    <td><span class="fw-bold text-success">Paid</span></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-sm">
                                    <span class="fas fa-ellipsis-h icon-dark"></span>
                                </span>
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu py-0">
                                <a class="dropdown-item rounded-top" href="#"><span
                                        class="fas fa-eye me-2"></span>View Details</a>
                                <a class="dropdown-item" href="#"><span class="fas fa-edit me-2"></span>Edit</a>
                                <a class="dropdown-item text-danger rounded-bottom" href="#"><span
                                        class="fas fa-trash-alt me-2"></span>Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="fw-bold">
                            453673
                        </a>
                    </td>
                    <td>
                        <span class="fw-normal">Gold Subscription Plan</span>
                    </td>
                    <td><span class="fw-bold text-danger">Cancelled</span></td>
                    <td>
                        <button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal-edit">Modifier</button>
                        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog"
                            aria-labelledby="modal-edit" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info text-white">
                                        <h2 class="h6 modal-title">MODIFICATION</h2>
                                        <button style="background-color: white;" type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form role="for" action="#" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <input type="text" required class="form-control" name="service"
                                                    placeholder="Libelle service" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-2">
                                                <select name="statut" required class="form-select" id="country"
                                                    aria-label="Default select example">
                                                    <option value="" selected="">Disponibilité</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">Désactive</option>
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
                            data-bs-target="#modal-delete">Supprimer</button>
                        <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog"
                            aria-labelledby="modal-delete" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h2 class="h6 modal-title">SUPPRESSION</h2>
                                        <button style="background-color: white;" type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form role="for" action="#" method="POST">
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
            </tbody>
        </table>
    </div>
@endsection
