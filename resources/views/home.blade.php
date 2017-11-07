@extends('clients.layouts.default')
@section('content')
    <div class="jumbotron mt-4">
        <h1 class="display-3">Client Onboarding!</h1>
        <p class="lead">A simple platform to add and manage clients.</p>
        <p class="lead text-center">
            <a class="btn btn-primary btn-lg" href="{{ url('clients') }}" role="button">Get Started</a>
        </p>
    </div>
@stop
