@extends('layouts.base')

@section('title', 'Modificar Propietari - Mascotes Clinic')

@section('content')
    @include('partials.messages')

    <div id="content" class="container-fluid mt-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-5 col-lg-4">
                    {{-- Search Form --}}
                    <form method="post" action="{{ route('owner.searchModify') }}">
                        @csrf
                        <fieldset class="border-0 rounded-3 p-4 h-100 shadow-sm panel-search">
                            <legend class="float-none w-auto px-3 py-2 mb-3 rounded-2 text-white fw-bold legend-orange">
                                <i class="bi bi-search me-2"></i>Buscar propietari
                            </legend>

                            <div class="mb-3">
                                <label for="searchIdField" class="form-label label-white fw-semibold">
                                    <i class="bi bi-person-badge me-1"></i>Id <span class="text-warning">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control form-control-lg border-0 shadow-sm input-search @error('search_id') is-invalid @enderror"
                                    id="searchIdField"
                                    placeholder="Introdueix l'ID"
                                    name="search_id"
                                    value="{{ old('search_id', isset($owner) ? $owner->id : '') }}"
                                />
                            </div>

                            <button type="submit" class="btn btn-clinic-search btn-lg w-100 shadow fw-semibold">
                                <i class="bi bi-search me-2"></i>Buscar
                            </button>
                            
                            <p class="text-white-50-custom fst-italic small mt-3 mb-0">* Camp obligatori</p>
                        </fieldset>
                    </form>
                </div>

                <div class="col-12 col-md-7 col-lg-8">
                    {{-- Modify Form --}}
                    <form method="post" action="{{ route('owner.update') }}">
                        @csrf
                        <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-light">
                            <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-primary">
                                <i class="bi bi-pencil-square me-2"></i>Dades del propietari
                            </legend>

                            <input type="hidden" name="id" value="{{ isset($owner) ? $owner->id : '' }}" />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="idField" class="form-label fw-semibold label-primary">
                                            <i class="bi bi-hash me-1"></i>Id
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control border-2 bg-light input-readonly"
                                            id="idField"
                                            value="{{ isset($owner) ? $owner->id : '-' }}"
                                            readonly
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nomField" class="form-label fw-semibold label-primary">
                                            <i class="bi bi-person me-1"></i>Nom
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control border-2 bg-light input-readonly"
                                            id="nomField"
                                            value="{{ isset($owner) ? $owner->nom : '-' }}"
                                            readonly
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="emailField" class="form-label fw-semibold label-primary">
                                            <i class="bi bi-envelope me-1"></i>Email <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="email"
                                            class="form-control form-control-md border-2 shadow-sm @if(isset($owner)) input-editable @endif @error('email') is-invalid @enderror"
                                            id="emailField"
                                            placeholder="exemple@email.com"
                                            name="email"
                                            value="{{ old('email', isset($owner) ? $owner->email : '') }}"
                                            {{ !isset($owner) ? 'disabled' : '' }}
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="movilField" class="form-label fw-semibold label-primary">
                                            <i class="bi bi-phone me-1"></i>Mòbil <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control form-control-md border-2 shadow-sm @if(isset($owner)) input-editable @endif @error('movil') is-invalid @enderror"
                                            id="movilField"
                                            placeholder="999999999"
                                            name="movil"
                                            value="{{ old('movil', isset($owner) ? $owner->movil : '') }}"
                                            {{ !isset($owner) ? 'disabled' : '' }}
                                        />
                                    </div>
                                </div>
                            </div>

                            <p class="text-danger fst-italic small mb-3"><i class="bi bi-info-circle me-1"></i>* Camps obligatoris</p>

                            <button type="submit" class="btn btn-clinic-primary btn-lg w-100 shadow fw-semibold" {{ !isset($owner) ? 'disabled' : '' }}>
                                <i class="bi bi-check-circle me-2"></i>Guardar canvis
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
