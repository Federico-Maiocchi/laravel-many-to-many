@extends('layouts.app')

@section('content')

<section class="py-5">
<button class="btn btn-info text-light"><a href="{{route('admin.projects.index')}}">Torna ai Progetti</a></button>
</section>
  <div class="container">
    <h1>Modifica progetto</h1>
        <form action="{{ route('admin.projects.update', $project ) }}" method="POST" >

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="titolo" value="{{ old('title',$project->title) }}">
            </div>

            <select name="type_id" class="form-control" id="type_id">
                <option>Seleziona una categoria</option>
                @foreach($types as $type)
                  <option @selected( old('type_id', optional($project->type)->id) == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <div class="mb-3 d-flex flex-wrap gap-2 text-light">
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input name="technologies[]" class="form-check-input" type="checkbox" value="{{$technology->id}}" 
                        id="technology-{{$technology->id}}" @checked(in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all())))>
                        <label class="form-check-label" for="technology-{{$technology->id}}">
                            {{$technology->name}}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="descrizione"> {{ old('description',$project->description) }}</textarea>
            </div>
                <div class="mb-3">
                <label for="img" class="form-label">Immagine</label>
                <textarea class="form-control" name="img" id="img" rows="3" placeholder="immagine"> {{ old('img',$project->img) }}</textarea>
            </div>
            <div class="mb-">
                <input type="submit" class="btn btn-success" value="Edit">
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