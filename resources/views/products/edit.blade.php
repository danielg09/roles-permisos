@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Producto
                </div>

                <div class="card-body">
                   <form method="POST" action="{{ route('products.update', $product->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre del Producto</label>
                            <input type="text" name="name" id="" class="form-control" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción del Producto</label>
                            <input type="text" name="description" id="" class="form-control" value="{{ $product->description }}">
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
