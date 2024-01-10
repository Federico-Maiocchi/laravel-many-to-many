@extends('layouts.home')
@section('content')

<section class="text-light p-5">
    <h1>Benvenuto</h1>

    <h3>Questa è la home</h3>

    <div class="container py-3">
        
        <div class="row py-4">
            @foreach($projects as $project)
                <div class="col-4 p-2">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title">
                            titolo:
                            {{$project->title}}
                        </h5>
                        <p class="card-text">img: {{$project->img}}</p>
                        <p class="card-text">descrizione: {{$project->description}}</p>
                        </div> 
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection