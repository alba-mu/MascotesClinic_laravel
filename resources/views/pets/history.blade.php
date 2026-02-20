@extends('layouts.base')

@section('title', 'Afegir Historial - Mascotes Clinic')

@section('content')
    <div id="content" class="container-fluid mt-4">
        <div class="container mb-4">
            <form method="post" action="{{ route('pet.storeHistory') }}">
                @csrf
                <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light h-100">
                    <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-primary">
                        <i class="bi bi-plus-circle me-2"></i>Afegir entrada a l'historial
                    </legend>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="mascota_id" class="form-label fw-semibold label-primary">
                                <i class="bi bi-hash me-1"></i>Id Mascota <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control border-2 shadow-sm input-standard @error('mascota_id') is-invalid @enderror"
                                id="mascota_id" 
                                name="mascota_id" 
                                placeholder="Ex: 101" 
                                value="{{ old('mascota_id') }}"
                                required
                            />
                            @error('mascota_id')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="data" class="form-label fw-semibold label-primary">
                                <i class="bi bi-calendar3 me-1"></i>Data de la visita <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="date" 
                                class="form-control border-2 shadow-sm input-standard @error('data') is-invalid @enderror"
                                id="data" 
                                name="data" 
                                value="{{ old('data') }}"
                                required
                            />
                            @error('data')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-12">
                            <label for="motiu_visita" class="form-label fw-semibold label-primary">
                                <i class="bi bi-file-medical me-1"></i>Motiu de la visita <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control border-2 shadow-sm input-standard @error('motiu_visita') is-invalid @enderror"
                                id="motiu_visita" 
                                name="motiu_visita" 
                                placeholder="Ex: Revisió, Vacuna, Tractament, etc." 
                                value="{{ old('motiu_visita') }}"
                                required
                            />
                            @error('motiu_visita')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label for="descripcio" class="form-label fw-semibold label-primary">
                                <i class="bi bi-journal-text me-1"></i>Descripció de la visita
                            </label>
                            <textarea 
                                class="form-control border-2 shadow-sm input-standard @error('descripcio') is-invalid @enderror"
                                id="descripcio" 
                                name="descripcio" 
                                placeholder="Introduïu una descripció detallada de la visita, diagnòstic, tractament aplicat, etc."
                                rows="5"
                            >{{ old('descripcio') }}</textarea>
                            @error('descripcio')
                                <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-2">
                                <i class="bi bi-info-circle me-1"></i>Podeu afegir detalls addicionals sobre la visita
                            </small>
                        </div>
                    </div>

                    <p class="text-danger fst-italic small mb-3"><i class="bi bi-info-circle me-1"></i>* Camps obligatoris</p>

                    <button type="submit" class="btn btn-clinic-primary btn-lg w-100 shadow fw-semibold">
                        <i class="bi bi-check-circle me-2"></i>Afegir entrada al historial
                    </button>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
