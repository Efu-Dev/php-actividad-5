@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? "Detalle Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Código Barra:</strong>
                            {{ $producto->codigo_barra }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $producto->stock }}
                        </div>
                        <a class="btn btn-sm btn-primary " href="{{ route('insumos_producto.create') }}?id={{$producto->id}}">Añadir Nuevo Insumo</a>
                        <table class="table table-bordered table-responsive table-hover">
                            <thead class="table-dark">
                                <th>Insumo</th>
                                <th>Cantidad Requerida</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($producto->insumos as $insumo)
                                <tr>
                                    <td>{{$insumo['nombre']}}</td>
                                    <td>{{$insumo['pivot']['cantidad']}}</td>
                                    <td class="d-flex">
                                        <a style="max-height: 45px;" href="{{ route('insumos_producto.edit',$insumo['pivot']['id']) }}" class="btn btn-primary">Editar</a>
                                        @if($producto->insumos->count() > 1)
                                        <form action="{{ route('insumos_producto.destroy',$insumo->pivot->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @if(Auth::check() && Auth::user()->cargo == 'ADMIN')
                                            <button type="submit" class="btn btn-danger" style="max-height: 45px;">Eliminar</button>
                                            @endif
                                        </form>
                                        @else
                                            <button class="btn btn-danger" style="max-height: 45px;" disabled>Eliminar</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
