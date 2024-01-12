@extends('layouts.app')

@section('content')

<section class="py-3">
    <button class="btn btn-info text-light"><a href="{{route('admin.types.index')}}">Lista tipi</a></button>
</section>
    
    <div class="container">
        <h1 class="text-light">Crea Nuovo Tipo</h1>
        <form action="{{ route('admin.types.store' ) }}" method="POST" >

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label text-light">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="inserisci nome" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Crea nuovo tipo">
            </div>

        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>

@endsection