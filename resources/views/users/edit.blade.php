@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Usuario
                </div>

                <div class="card-body">
                   <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre del Usuario</label>
                            <input type="text" name="name" id="" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email del Usuario</label>
                            <input type="text" name="email" id="" class="form-control" value="{{ $user->email }}">
                        </div>
                        <hr>
                        <h3>Lista de Roles</h3>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach ($roles as $role)
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}" name="roles[]" 
                                            @if ($user->roles->contains($role->id))
                                                checked = checked 
                                            @endif>
                                            <label class="form-check-label" for="{{ $role->name }}">
                                                {{ $role->name }}
                                                <em>({{ $role->description ?: 'Sin descripción' }})</em>
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
