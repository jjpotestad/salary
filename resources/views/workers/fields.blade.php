<!-- Full Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('full_name', 'Nombre completo:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Ref Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('ref_number', 'Número de referencia:') !!}
    {!! Form::number('ref_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-4">
    {!! Form::label('role_id', 'Rol:') !!}
    {!! Form::select('role_id', $roles, null, ['class' => 'custom-select form-control']) !!}
</div>
