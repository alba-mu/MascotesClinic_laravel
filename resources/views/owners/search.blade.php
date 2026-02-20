@extends('layouts.base')

@section('title', 'Buscar Mascotes - Mascotes Clinic')

@section('content')
    <div id="content" class="container-fluid mt-4">
        <div class="container">
            <form method="post" action="{{ route('owner.searchPets') }}">
                @csrf
                <div class="row g-4">
                    <div class="col-12 col-md-5 col-lg-4">
                        <fieldset class="border-0 rounded-3 p-4 h-100 shadow-sm panel-search">
                            <legend class="float-none w-auto px-3 py-2 mb-3 rounded-2 text-white fw-bold legend-orange">
                                <i class="bi bi-search me-2"></i>Buscar propietari
                            </legend>

                            <div class="mb-3">
                                <label for="idField" class="form-label label-white fw-semibold">
                                    <i class="bi bi-person-badge me-1"></i>Id <span class="text-warning">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg border-0 shadow-sm input-search @error('id') is-invalid @enderror"
                                    id="idField"
                                    placeholder="Introdueix l'ID del propietari"
                                    name="id"
                                    value="{{ old('id', isset($owner) ? $owner->id : '') }}"
                                />
                                @error('id')
                                    <div class="invalid-feedback d-block text-white mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-clinic-search btn-lg w-100 shadow fw-semibold">
                                <i class="bi bi-search me-2"></i>Buscar
                            </button>
                            
                            <p class="text-white-50-custom fst-italic small mt-3 mb-0">* Camp obligatori</p>
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-7 col-lg-8">
                        <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light">
                            <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-primary">
                                <i class="bi bi-heart-fill me-2"></i>Mascotes del propietari
                            </legend>

                            @if(isset($owner) && isset($pets) && $pets->count() > 0)
                                <div class="table-responsive">
                                    <table class="table-clinic">
                                        <thead>
                                            <tr>
                                                <th class="py-3"><i class="bi bi-hash me-1"></i>Id</th>
                                                <th class="py-3"><i class="bi bi-tag-fill me-1"></i>Nom</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pets as $pet)
                                                <tr>
                                                    <td class="py-3 fw-semibold cell-id">{{ $pet->id }}</td>
                                                    <td class="py-3">{{ $pet->nom }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @elseif(isset($owner) && isset($pets) && $pets->count() == 0)
                                <div class="alert border-0 shadow-sm text-center alert-clinic-info">
                                    <i class="bi bi-info-circle me-2" style="font-size: 1.5rem;"></i>
                                    <p class="mb-0">No hi ha mascotes registrades per aquest propietari.</p>
                                </div>
                            @else
                                <div class="text-center py-5 text-muted">
                                    <i class="bi bi-arrow-up-circle icon-light-blue d-md-none"></i>
                                    <i class="bi bi-arrow-left-circle icon-light-blue d-none d-md-inline"></i>
                                    <p class="mt-3 empty-state-text">Introdueix un ID per veure les mascotes</p>
                                </div>
                            @endif
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
