@extends('layouts.base')

@section('title', 'Cercar Mascota - Mascotes Clinic')

@section('content')
    @include('partials.messages')

    <div id="content" class="container-fluid mt-4">
        <div class="container mb-4">
            <form method="post" action="{{ route('pet.searchDetail') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-search mb-3">
                            <legend class="float-none w-auto px-3 py-2 rounded-2 text-white fw-bold legend-orange mb-0">
                                <i class="bi bi-search me-2"></i>Cercar mascota
                            </legend>

                            <div class="row align-items-end">
                                <label for="idField" class="form-label label-white fw-semibold mb-2">
                                    <i class="bi bi-hash me-1"></i>Id Mascota <span class="text-warning">*</span>
                                </label>
                                <div class="col-sm-9 mb-3">
                                    <input
                                        type="text"
                                        class="form-control border-0 shadow-sm input-search @error('id') is-invalid @enderror"
                                        id="idField"
                                        placeholder="Introdueix l'ID de la mascota"
                                        name="id"
                                        value="{{ old('id', isset($pet) ? $pet->id : '') }}"
                                    />
                                </div>
                                <div class="col-sm-3 mb-3">
                                    <button type="submit" class="btn btn-clinic-search btn-sm-lg w-100 shadow fw-bold">
                                        <i class="bi bi-search me-2 fw-bold"></i>Cercar
                                    </button>
                                </div>
                            </div>
                            
                            <p class="text-white-50-custom fst-italic small mt-3 mb-0">* Camp obligatori</p>
                        </fieldset>
                    </div>
                </div>
            </form>

            @if(isset($pet))
                <div class="row g-4 mb-4">
                    <div class="col-12 col-md-4">
                        <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light h-100">
                            <legend class="float-none w-auto px-3 py-2 rounded-2 text-white fw-bold legend-primary">
                                <i class="bi bi-heart-fill me-2"></i>Informació de la mascota
                            </legend>
                            <div class="row g-3">
                                <div class="col-xl-3 col-md-5 col-sm-6 col-12">
                                    <div class="p-3 bg-light rounded">
                                        <p class="mb-1 text-muted small"><i class="bi bi-hash me-1"></i>ID</p>
                                        <p class="mb-0 fw-bold fs-5 cell-id">{{ $pet->id }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-md-7 col-sm-6 col-12">
                                    <div class="p-3 bg-light rounded">
                                        <p class="mb-1 text-muted small"><i class="bi bi-tag-fill me-1"></i>Nom</p>
                                        <p class="mb-0 fw-bold fs-5">{{ $pet->nom }}</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-8">
                        @if($pet->owner)
                            <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light h-100">
                                <legend class="float-none w-auto px-3 py-2 rounded-2 text-white fw-bold legend-accent">
                                    <i class="bi bi-person-fill me-2"></i>Informació del propietari
                                </legend>
                                <div class="row g-3">
                                    <div class="col-lg-2 col-sm-4 col-12">
                                        <div class="p-3 bg-light rounded">
                                            <p class="mb-1 text-muted small"><i class="bi bi-hash me-1"></i>ID</p>
                                            <p class="mb-0 fw-semibold">{{ $pet->owner->id }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-8 col-12">
                                        <div class="p-3 bg-light rounded">
                                            <p class="mb-1 text-muted small"><i class="bi bi-person me-1"></i>Nom</p>
                                            <p class="mb-0 fw-semibold">{{ $pet->owner->nom }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-8 col-12">
                                        <div class="p-3 bg-light rounded">
                                            <p class="mb-1 text-muted small"><i class="bi bi-envelope me-1"></i>Email</p>
                                            <p class="mb-0 fw-semibold">{{ $pet->owner->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 col-12">
                                        <div class="p-3 bg-light rounded">
                                            <p class="mb-1 text-muted small"><i class="bi bi-phone me-1"></i>Mòbil</p>
                                            <p class="mb-0 fw-semibold">{{ $pet->owner->movil }}</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        @else
                            <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light h-100">
                                <legend class="float-none w-auto px-3 py-2 rounded-2 text-white fw-bold legend-accent">
                                    <i class="bi bi-person-fill me-2"></i>Informació del propietari
                                </legend>
                                <div class="alert border-0 shadow-sm text-center alert-clinic-info">
                                    <i class="bi bi-info-circle me-2"></i>
                                    <span>No hi ha informació del propietari.</span>
                                </div>
                            </fieldset>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light">
                            <legend class="float-none w-auto px-3 py-2 rounded-2 text-white fw-bold legend-orange">
                                <i class="bi bi-clipboard2-pulse-fill me-2"></i>Historial mèdic
                            </legend>
                            
                            @if($pet->history && $pet->history->count() > 0)
                                <div class="table-responsive">
                                    <table class="table-clinic">
                                        <thead>
                                            <tr>
                                                <th class="py-3"><i class="bi bi-hash me-1"></i>ID</th>
                                                <th class="py-3"><i class="bi bi-calendar3 me-1"></i>Data</th>
                                                <th class="py-3"><i class="bi bi-file-medical me-1"></i>Motiu Visita</th>
                                                <th class="py-3"><i class="bi bi-journal-text me-1"></i>Descripció</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pet->history as $entry)
                                                <tr>
                                                    <td class="py-3 fw-semibold cell-id">{{ $entry->id }}</td>
                                                    <td class="py-3">{{ $entry->data }}</td>
                                                    <td class="py-3">{{ $entry->motiu_visita }}</td>
                                                    <td class="py-3">{{ $entry->descripcio }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert border-0 shadow-sm text-center alert-clinic-info">
                                    <i class="bi bi-info-circle me-2"></i>
                                    <span>No hi ha entrades d'historial per aquesta mascota.</span>
                                </div>
                            @endif
                        </fieldset>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
