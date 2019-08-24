@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Roles
                    @can('roles.create')
                    <a class="btn btn-primary float-right" href="{{ route('roles.create') }}">Crear Nuevo</a>
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
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td width="10px">
                                        @can('roles.show')
                                            <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Ver</a>
                                        @endcan
                                    </td>

                                    
                                    <td width="10px">
                                        @can('roles.edit')
                                            <a class="btn btn-warning" href="{{route('roles.edit', $role->id) }}">Editar</a>
                                        @endcan
                                    </td>
                                                           
                                    <td width="10px">
                                        @can('roles.destroy')
                                            <form method="POST" action="{{route('roles.destroy', $role->id) }}">
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
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
