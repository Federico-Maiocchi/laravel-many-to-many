@extends('layouts.app')

@section('content')

<section class="py-3">
    <button class="btn btn-info text-light"><a href="{{route('admin.projects.index')}}">Torna ai Progetti</a></button>
</section>
    
    <div class="container">
        <form action="{{ route('admin.projects.store' ) }}" method="POST" >

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="titolo" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Seleziona una categoria</label>
                <select name="type_id" class="form-control" id="type_id">
                    <option>Seleziona una categoria</option>
                    @foreach($types as $type)
                    <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3 d-flex flex-wrap gap-2 text-light">
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input name="technologies[]" class="form-check-input" type="checkbox" value="{{$technology->id}}" 
                        id="technology-{{$technology->id}}" @checked(in_array($technology->id, old('technologies',[])))>
                        <label class="form-check-label" for="technology-{{$technology->id}}">
                            {{$technology->name}}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="descrizione" >{{ old('description') }} </textarea>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Immagine</label>
                <textarea class="form-control" name="img" id="img" rows="3" placeholder="immagine" >{{ old('img') }} </textarea>
            </div>

            <div class="">
                <input type="submit" class="btn btn-success" value="Crea nuovo progetto">
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