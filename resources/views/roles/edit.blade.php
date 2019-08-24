@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Rol
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', '$role->id') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre del Rol</label>
                            <input type="text" name="name" id="" class="form-control" value="{{ $role->name }}">
                        </div>
                        <div class="form-group">
                            <label for="slug">URL Amigable</label>
                            <input type="text" name="slug" id="" class="form-control" value="{{ $role->slug }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción del Rol</label>
                            <textarea class="form-control" id="description" rows="3">{{ $role->description }}</textarea>
                        </div>
                        <hr>
                        <h3>Permiso Especial</h3>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="special" id="all-access"
                                    value="all-access"
                                @if ($role->special == 'all-access')
                                    checked = checked 
                                @endif>
                                <label class="form-check-label" for="all-access">
                                    Accesso total
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="special" id="no-access"
                                    value="no-access"
                                @if ($role->special == 'no-access')
                                    checked = checked 
                                @endif>
                                <label class="form-check-label" for="no-access">
                                    Ningún accesso
                                </label>
                            </div>
                        </div>
                        <hr>
                        <h3>Lista de Permisos</h3>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach ($permissions as $permission)
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $permission->id }}"
                                            id="{{ $permission->name }}" name="permissions[]"
                                        @if ($role->permissions->contains($permission->id))
                                            checked = checked 
                                        @endif>
                                        <label class="form-check-label" for="{{ $permission->name }}">
                                            {{ $permission->name }}
                                            <em>({{ $permission->description ?: 'Sin descripción' }})</em>
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection