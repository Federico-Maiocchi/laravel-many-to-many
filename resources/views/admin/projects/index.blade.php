@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <button class="btn btn-info text-light"><a href="{{route('admin.projects.create')}}">Crea Progetto</a></button>
        <div class="row py-4">

            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITOLO</th>
                        <th>SLUG</th>
                        <th>TIPO</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr >
                            <td>{{ $project->id }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->type->name }}</td>
                            <td>
                                <button class="btn btn-success btn-sm"><a href="{{ route('admin.projects.show', $project) }}">Info</a></button>
                            </td>
                            <td>
                                <button class="btn btn-info text-light btn-sm"><a href="{{route('admin.projects.edit', $project)}}">Modifica</a></button>
                            </td>
                            <td>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
        
                                    <button class="btn btn-danger btn-sm" type="submit">Cancella</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h3>Non ci sono progetti</h3>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection