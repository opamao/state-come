@extends('layouts.master', [
    'titre' => 'RESPONSABLES',
])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">Nom responsable</h2>
            <p class="mb-0">Your web analytics dashboard template.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Partager</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Exporter</button>
            </div>
        </div>
    </div>

    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input data-datepicker="" name="debut" class="form-control" type="text"
                                    placeholder="Date début" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input data-datepicker="" name="fin" class="form-control" type="text"
                                    placeholder="Date fin" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-4">
                            <select class="form-select" required name="service">
                                <option selected="">Service</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="mb-4">
                            <select class="form-select" required name="categorie">
                                <option selected="">Catégorie</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <button type="submit" class="btn btn-secondary">Filtrer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-gray-200"></th>
                            <th class="border-gray-200">Objectifs</th>
                            <th class="border-gray-200">Réalisé</th>
                            <th class="border-gray-200">%Journalier</th>
                            <th class="border-gray-200">Objectif <br>cumulé</th>
                            <th class="border-gray-200">Réalisé <br>cumulé</th>
                            <th class="border-gray-200">%Cumulé</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="fw-bold">LUNDI</span></td>
                            <td><span class="fw-normal">20</span></td>
                            <td><span class="fw-normal">10</span></td>
                            <td><span class="fw-normal">2</span></td>
                            <td><span class="fw-bold">3</span></td>
                            <td><span class="fw-bold">2</span></td>
                            <td><span class="fw-bold">2</span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">MARDI</span></td>
                            <td><span class="fw-normal">20</span></td>
                            <td><span class="fw-normal">10</span></td>
                            <td><span class="fw-normal">2</span></td>
                            <td><span class="fw-bold">3</span></td>
                            <td><span class="fw-bold">2</span></td>
                            <td><span class="fw-bold">2</span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">MERCREDI</span></td>
                            <td><span class="fw-normal">20</span></td>
                            <td><span class="fw-normal">10</span></td>
                            <td><span class="fw-normal">2</span></td>
                            <td><span class="fw-bold">3</span></td>
                            <td><span class="fw-bold">2</span></td>
                            <td><span class="fw-bold">2</span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">JEUDI</span></td>
                            <td><span class="fw-normal">20</span></td>
                            <td><span class="fw-normal">10</span></td>
                            <td><span class="fw-normal">2</span></td>
                            <td><span class="fw-bold">3</span></td>
                            <td><span class="fw-bold">2</span></td>
                            <td><span class="fw-bold">2</span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">VENDREDI</span></td>
                            <td><span class="fw-normal">20</span></td>
                            <td><span class="fw-normal">10</span></td>
                            <td><span class="fw-normal">2</span></td>
                            <td><span class="fw-bold">3</span></td>
                            <td><span class="fw-bold">2</span></td>
                            <td><span class="fw-bold">2</span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">SAMEDI</span></td>
                            <td><span class="fw-normal">20</span></td>
                            <td><span class="fw-normal">10</span></td>
                            <td><span class="fw-normal">2</span></td>
                            <td><span class="fw-bold">3</span></td>
                            <td><span class="fw-bold">2</span></td>
                            <td><span class="fw-bold">2</span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">DIMANCHE</span></td>
                            <td><span class="fw-normal">20</span></td>
                            <td><span class="fw-normal">10</span></td>
                            <td><span class="fw-normal">2</span></td>
                            <td><span class="fw-bold">3</span></td>
                            <td><span class="fw-bold">2</span></td>
                            <td><span class="fw-bold">2</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
