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
                
                
                
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="mb-5 text-center">
                        {{ __('You are logged in!') }}
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <button class="btn btn-primary btn-lg"><a href="{{route('admin.projects.index')}}">Lista Progetti</a></button>
                        </div>
        
                        <div>
                            <button class="btn btn-info text-light btn-lg"><a href="{{route('admin.projects.create')}}">Crea Progetto</a></button>
                        </div>
        
                        <div>
                            <button class="btn btn-primary btn-lg"><a href="{{route('admin.types.index')}}">Lista tipi</a></button>
                        </div>
        
                        <div>
                            <button class="btn btn-primary btn-lg"><a href="{{route('admin.technologies.index')}}">Lista tecnologie</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
