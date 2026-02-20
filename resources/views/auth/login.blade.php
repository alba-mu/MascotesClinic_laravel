@extends('layouts.base')

@section('title', 'Iniciar Sessió - Mascotes Clinic')

@section('content')

    <div id="content" class="container-fluid mt-4">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="col-md-6 col-12">
                <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-primary">
                    <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-large">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sessió
                    </legend>

                    <form method="POST" action="{{ route('login') }}" novalidate id="loginForm">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="bi bi-envelope me-2"></i>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $rememberedEmail ?? '') }}" required autofocus>
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

                        <div class="form-check small">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember', $rememberedRemember ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Recorda'm</label>
                        </div>

                        <div class="">
                            <p class="text-center small">No tens compte? <a href="{{ route('register') }}" class="text-decoration-none"> Registra't</a></p>
                        </div>

                        <button type="submit" class="btn btn-clinic-primary fw-semibold text-white w-100">
                             <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sessió
                        </button>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const emailInput = document.getElementById('email');
            const rememberCheckbox = document.getElementById('remember');
            const loginForm = document.getElementById('loginForm');

            const storedEmail = localStorage.getItem('remembered_email');
            const storedRemember = localStorage.getItem('remembered_remember');

            if (storedEmail) {
                emailInput.value = storedEmail;
            }
            if (storedRemember === 'true') {
                rememberCheckbox.checked = true;
            }

            rememberCheckbox.addEventListener('change', () => {
                if (!rememberCheckbox.checked) {
                    localStorage.removeItem('remembered_email');
                    localStorage.removeItem('remembered_remember');
                }
            });

            loginForm.addEventListener('submit', () => {
                if (rememberCheckbox.checked) {
                    localStorage.setItem('remembered_email', emailInput.value.trim());
                    localStorage.setItem('remembered_remember', 'true');
                } else {
                    localStorage.removeItem('remembered_email');
                    localStorage.removeItem('remembered_remember');
                }
            });
        });
    </script>
@endsection
