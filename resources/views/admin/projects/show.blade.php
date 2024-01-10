@extends('layouts.app')

@section('content')
<section class="p-3">
    <button class="btn btn-info text-light"><a href="{{route('admin.projects.index')}}">Sezione Progetti</a></button>
    <h2 class="py-4">Titolo: {{$project->title}}</h2>
    <div class="container">
        <div class="row row-gap-5">
            <div class="col-8">
                
                <div class="card h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->title}}</h5>
                        <p>{{optional($project->type)->name}}</p>
    
                        <p class="card-text">Descrizione: {{$project->description}}</p>
                        <p class="card-text">Immagine: {{$project->img}}</p>
                    </div>
                    <div class="d-flex justify-content-between p-2">
                        <div>
                            <button class="btn btn-info text-light"><a href="{{route('admin.projects.edit', $project)}}">Modifica</a></button>
                        </div>
                        
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
    
                            <button class="btn btn-danger" type="submit">delete</button>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</section>

@endsection