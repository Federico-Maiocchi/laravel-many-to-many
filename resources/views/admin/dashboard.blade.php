@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-light my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>
                <div>
                    <button class="btn btn-primary"><a href="{{route('admin.projects.index')}}">Guarda i Progetti</a></button>
                </div>
                
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
