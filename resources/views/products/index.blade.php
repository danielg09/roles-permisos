@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Productos
                    @can('products.create')
                    <a class="btn btn-primary float-right" href="{{ route('products.create') }}">Crear Nuevo</a>
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
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    
                                    <td width="10px">
                                        @can('products.show')
                                            <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Ver</a>
                                        @endcan
                                    </td>
      
                                    <td width="10px">
                                        @can('products.edit')
                                            <a class="btn btn-warning" href="{{route('products.edit', $product->id) }}">Editar</a>
                                        @endcan
                                    </td>
                                    
                                    <td width="10px">                                      
                                        @can('products.destroy')
                                            <form method="POST" action="{{route('products.destroy', $product->id) }}">
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
                    {{ $products->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
