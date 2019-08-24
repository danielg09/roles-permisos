@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Usuarios
                    @can('users.create')
                    <a class="btn btn-primary float-right" href="{{ route('users.create') }}">Crear Nuevo</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                   
                                    <td width="10px">
                                        @can('users.show')
                                            <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Ver</a>
                                        @endcan
                                    </td>
                                                                       
                                    <td width="10px">
                                        @can('users.edit')
                                            <a class="btn btn-warning" href="{{route('users.edit', $user->id) }}">Editar</a>
                                        @endcan
                                    </td>
                                                                       
                                    <td width="10px">
                                        @can('users.destroy')
                                            <form method="POST" action="{{route('users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     </div>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
