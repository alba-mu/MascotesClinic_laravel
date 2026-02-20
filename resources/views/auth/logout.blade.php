@extends('layouts.base')

@section('title', 'Logout - Mascotes Clinic')

@section('content')
    <div id="content" class="container-fluid mt-4">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
                <div class="col-12 col-md-10 col-lg-8">
                    <fieldset class="border-0 rounded-3 p-4 p-md-5 shadow-sm panel-secondary">
                        <div class="alert border-0 shadow-sm text-center alert-clinic-info mb-4">
                            <i class="bi bi-info-circle me-2" style="font-size: 1.5rem;"></i>
                            <p class="mb-0">Has tancat sessió correctament. Fins aviat!</p>
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                            <a href="{{ route('welcome') }}" class="btn btn-clinic-primary fw-semibold px-4">
                                <i class="bi bi-house-door me-2"></i>Tornar a l'inici
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-clinic-secondary fw-semibold px-4">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar sessió
                            </a>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection