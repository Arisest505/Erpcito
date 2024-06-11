

@extends('layouts.app')
    <!-- Scripts -->
    @vite(['resources/css/home.css', 'resources/js/app.js'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Estas en linea!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

