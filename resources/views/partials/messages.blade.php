{{-- Success Messages --}}
@if(session('success'))
    <div id="info" class="container mt-3">
        @if(is_array(session('success')))
            @foreach(session('success') as $message)
                <div class='alert border-0 shadow-sm d-flex align-items-center alert-clinic-success'>
                    <i class='bi bi-check-circle-fill me-3' style='font-size: 1.5rem;'></i>
                    <span class='fw-semibold'>{{ $message }}</span>
                </div>
            @endforeach
        @else
            <div class='alert border-0 shadow-sm d-flex align-items-center alert-clinic-success'>
                <i class='bi bi-check-circle-fill me-3' style='font-size: 1.5rem;'></i>
                <span class='fw-semibold'>{{ session('success') }}</span>
            </div>
        @endif
    </div>
@endif

{{-- Info Messages --}}
@if(session('info'))
    <div id="info" class="container mt-3">
        @if(is_array(session('info')))
            @foreach(session('info') as $message)
                <div class='alert border-0 shadow-sm d-flex align-items-center alert-clinic-success'>
                    <i class='bi bi-check-circle-fill me-3' style='font-size: 1.5rem;'></i>
                    <span class='fw-semibold'>{{ $message }}</span>
                </div>
            @endforeach
        @else
            <div class='alert border-0 shadow-sm d-flex align-items-center alert-clinic-success'>
                <i class='bi bi-check-circle-fill me-3' style='font-size: 1.5rem;'></i>
                <span class='fw-semibold'>{{ session('info') }}</span>
            </div>
        @endif
    </div>
@endif

{{-- Error Messages --}}
@if(session('error'))
    <div id="error" class="container mt-2">
        @if(is_array(session('error')))
            @foreach(session('error') as $message)
                <div class='alert border-0 shadow-sm d-flex align-items-center alert-clinic-error'>
                    <i class='bi bi-exclamation-triangle-fill me-3' style='font-size: 1.5rem;'></i>
                    <span class='fw-semibold'>{{ $message }}</span>
                </div>
            @endforeach
        @else
            <div class='alert border-0 shadow-sm d-flex align-items-center alert-clinic-error'>
                <i class='bi bi-exclamation-triangle-fill me-3' style='font-size: 1.5rem;'></i>
                <span class='fw-semibold'>{{ session('error') }}</span>
            </div>
        @endif
    </div>
@endif

{{-- Validation Errors --}}
@if($errors->any())
    <div id="error" class="container mt-2">
        @foreach($errors->all() as $error)
            <div class='alert border-0 shadow-sm d-flex align-items-center alert-clinic-error'>
                <i class='bi bi-exclamation-triangle-fill me-3' style='font-size: 1.5rem;'></i>
                <span class='fw-semibold'>{{ $error }}</span>
            </div>
        @endforeach
    </div>
@endif
