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

        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('login') }}" class="btn btn-clinic-primary w-100 py-2 fw-semibold">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sessió
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
