@extends('layouts.base')

@section('title', 'Mascotes Clinic - Inici')

@section('content')
<div class="container-fluid mt-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="text-center py-5 px-4 rounded-3 shadow-sm hero-section">
                    <i class="bi bi-hospital hero-icon"></i>
                    <h1 class="mt-3 mb-3 fw-bold text-white">Benvingut a Mascotes Clinic</h1>
                    <p class="lead text-white mb-0">Sistema de Gestió de Propietaris i Mascotes</p>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-border-primary">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-people-fill card-icon icon-primary"></i>
                        <h5 class="card-title mt-3 mb-3 fw-bold title-primary">Gestió de Propietaris i Mascotes</h5>
                        <p class="card-text text-muted">Consulta, modifica i gestiona la informació dels propietaris i de les seves mascotes registrats al sistema.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-border-orange">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-search card-icon icon-orange"></i>
                        <h5 class="card-title mt-3 mb-3 fw-bold title-orange">Cerca de Mascotes</h5>
                        <p class="card-text text-muted">Troba totes les mascotes associades a un propietari específic de manera ràpida i eficient.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-border-light">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-pencil-square card-icon icon-light"></i>
                        <h5 class="card-title mt-3 mb-3 fw-bold title-light">Actualització de l'Historial</h5>
                        <p class="card-text text-muted">Modifica les dades de l'historial de les mascotes mantenint la informació sempre actualitzada.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('login') }}" class="btn btn-clinic-primary w-100 py-2 fw-semibold text-white">
                         <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sessió
                    </a>
                </div>
                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('register') }}" class="btn btn-clinic-secondary w-100 py-2 fw-semibold text-white">
                         <i class="bi bi-person-plus me-2"></i>Registra't
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
