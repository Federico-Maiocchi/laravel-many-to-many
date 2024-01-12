@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <button class="btn btn-info text-light"><a href="{{route('admin.technologies.create')}}">Crea nuova tecnologia</a></button>
        <div class="row py-4">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr >
                            <td>{{ $technology->id }}</td>
                            <td>{{ $technology->name }}</td>
                            <td>
                                <button class="btn btn-info text-light btn-sm"><a href="{{route('admin.technologies.edit', $technology)}}">Modifica</a></button>
                            </td>
                            <td>
                                <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
        
                                    <button class="btn btn-danger btn-sm" type="submit">Cancella</button>
                                </form>
                            </td>    
                        </tr>   
                    @endforeach
                </tbody>
            </table>  
        </div>
    </div>
@endsection