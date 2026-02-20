@extends('layouts.base')

@section('title', 'Llistat de Mascotes - Mascotes Clinic')

@section('content')
    <div id="content" class="container-fluid mt-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-lg-7">
                    <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-primary h-100">
                        <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-large">
                            <i class="bi bi-heart-fill me-2"></i>Llistat de mascotes
                        </legend>

                        @if(isset($pets) && $pets->count() > 0)
                            <div class="table-responsive">
                                <table class="table-clinic">
                                    <thead>
                                        <tr>
                                            <th class="py-3"><i class="bi bi-hash me-1"></i>Id</th>
                                            <th class="py-3"><i class="bi bi-tag-fill me-1"></i>Nom</th>
                                            <th class="py-3"><i class="bi bi-person-badge me-1"></i>Propietari</th>
                                            <th class="py-3 text-center"><i class="bi bi-gear-fill me-1"></i>Accions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pets as $pet)
                                            <tr>
                                                <td class="py-3 fw-semibold cell-id">{{ $pet->id }}</td>
                                                <td class="py-3">{{ $pet->nom }}</td>
                                                <td class="py-3"><span class="badge rounded-pill badge-clinic-email">{{ $pet->propietari_id }}</span></td>
                                                <td class="py-3 text-center">
                                                    <a href="{{ route('pet.edit', $pet->id) }}" class="btn btn-sm btn-clinic-primary" title="Modificar mascota">
                                                        <i class="bi bi-pencil-square me-1"></i>Modificar
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert border-0 shadow-sm text-center alert-clinic-info">
                                <i class="bi bi-info-circle me-2 info-icon"></i>
                                <p class="mb-0">No hi ha mascotes registrades.</p>
                            </div>
                        @endif
                    </fieldset>
                </div>

                <div class="col-12 col-lg-5">
                    <form method="post" action="{{ route('pet.updateFromList') }}">
                        @csrf
                        <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light h-100">
                            <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-primary">
                                <i class="bi bi-pencil-square me-2"></i>Editar mascota
                            </legend>

                            <input type="hidden" name="id" value="{{ isset($petToEdit) ? $petToEdit->id : '' }}" />

                            <div class="mb-3">
                                <label for="petIdField" class="form-label fw-semibold label-primary">
                                    <i class="bi bi-hash me-1"></i>Id
                                </label>
                                <input
                                    type="text"
                                    class="form-control border-2 bg-light input-readonly"
                                    id="petIdField"
                                    value="{{ isset($petToEdit) ? $petToEdit->id : '-' }}"
                                    readonly
                                />
                            </div>

                            <div class="mb-3">
                                <label for="petNameField" class="form-label fw-semibold label-primary">
                                    <i class="bi bi-tag-fill me-1"></i>Nom <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control border-2 shadow-sm @if(isset($petToEdit)) input-editable @else input-readonly @endif @error('nom') is-invalid @enderror"
                                    id="petNameField"
                                    placeholder="Nom de la mascota"
                                    name="nom"
                                    value="{{ old('nom', isset($petToEdit) ? $petToEdit->nom : '') }}"
                                    {{ !isset($petToEdit) ? 'disabled' : '' }}
                                />
                                @error('nom')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="ownerField" class="form-label fw-semibold label-primary">
                                    <i class="bi bi-person-badge me-1"></i>Id propietari <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control border-2 shadow-sm @if(isset($petToEdit)) input-editable @else input-readonly @endif @error('propietari_id') is-invalid @enderror"
                                    id="ownerField"
                                    placeholder="Ex: 1"
                                    name="propietari_id"
                                    value="{{ old('propietari_id', isset($petToEdit) ? $petToEdit->propietari_id : '') }}"
                                    {{ !isset($petToEdit) ? 'disabled' : '' }}
                                />
                                @error('propietari_id')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <p class="text-danger fst-italic small mb-3"><i class="bi bi-info-circle me-1"></i>* Camps obligatoris</p>

                            <button type="submit" class="btn btn-clinic-primary btn-lg w-100 shadow fw-semibold" {{ !isset($petToEdit) ? 'disabled' : '' }}>
                                <i class="bi bi-check-circle me-2"></i>Guardar canvis
                            </button>

                            @if(!isset($petToEdit))
                                <p class="text-muted fst-italic small mt-3 mb-0">Seleccioneu una mascota per editar-la.</p>
                            @endif
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
