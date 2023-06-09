<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigo_barra') }}
            {{ Form::text('codigo_barra', $producto->codigo_barra, ['class' => 'form-control' . ($errors->has('codigo_barra') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Barra']) }}
            {!! $errors->first('codigo_barra', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 d-flex justify-content-center">
        <a class="btn btn-secondary" href="{{route('productos.index')}}">Regresar</a>
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
