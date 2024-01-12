@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <button class="btn btn-info text-light"><a href="{{route('admin.types.create')}}">Crea nuovo tipo</a></button>
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
                    @foreach ($types as $type)
                        <tr >
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>
                                <button class="btn btn-info text-light btn-sm"><a href="{{route('admin.types.edit', $type)}}">Modifica</a></button>
                            </td>
                            <td>
                                <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
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