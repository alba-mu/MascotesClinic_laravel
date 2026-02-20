@extends('layouts.base')

@section('title', 'Registrar-se - Mascotes Clinic')

@section('content')
    <div id="content" class="container-fluid mt-4">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="col-md-6 col-12">
                <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-primary">
                    <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-large">
                        <i class="bi bi-person-plus me-2"></i>Registrar-se
                    </legend>

                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="bi bi-person me-2"></i>Nom</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="bi bi-envelope me-2"></i>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"><i class="bi bi-lock me-2"></i>Contrasenya</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label"><i class="bi bi-lock me-2"></i>Confirmar Contrasenya</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <p class="text-center small">Ja tens compte? <a href="{{ route('login') }}" class="text-decoration-none"> Inicia sessió</a></p>
                        </div>

                        <button type="submit" class="btn btn-clinic-primary fw-semibold text-white w-100">
                             <i class="bi bi-person-plus me-2"></i>Registrar-se
                        </button>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
@endsection