@extends('layouts.base')

@section('title', 'Llistat de Propietaris - Mascotes Clinic')

@section('content')
    @include('partials.messages')

    <div id="content" class="container-fluid mt-4">
        <div class="container">
            <fieldset class="border-0 rounded-3 p-4 shadow-sm panel-primary">
                <legend class="float-none w-auto px-3 py-2 mb-4 rounded-2 text-white fw-bold legend-large">
                    <i class="bi bi-people-fill me-2"></i>Llistat de propietaris
                </legend>

                @if(isset($owners) && $owners->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless align-middle mb-0 shadow-sm table-clinic">
                            <thead>
                                <tr>
                                    <th class="py-3"><i class="bi bi-hash me-1"></i>Id</th>
                                    <th class="py-3"><i class="bi bi-person me-1"></i>Nom</th>
                                    <th class="py-3"><i class="bi bi-envelope me-1"></i>Email</th>
                                    <th class="py-3"><i class="bi bi-phone me-1"></i>Mòbil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($owners as $owner)
                                    <tr>
                                        <td class="py-3 fw-semibold cell-id">{{ $owner->id }}</td>
                                        <td class="py-3">{{ $owner->nom }}</td>
                                        <td class="py-3"><span class="badge rounded-pill badge-clinic-email">{{ $owner->email }}</span></td>
                                        <td class="py-3">{{ $owner->movil }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert border-0 shadow-sm text-center alert-clinic-info">
                        <i class="bi bi-info-circle me-2" style="font-size: 1.5rem;"></i>
                        <p class="mb-0">No hi ha propietaris registrats.</p>
                    </div>
                @endif
            </fieldset>
        </div>
    </div>
@endsection
