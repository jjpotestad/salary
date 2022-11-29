<!-- Full Name Field -->
<div class="col-sm-12">
    {!! Form::label('full_name', 'Nombre completo:') !!}
    <p>{{ $worker->full_name }}</p>
</div>

<!-- Ref Number Field -->
<div class="col-sm-12">
    {!! Form::label('ref_number', 'Número de referencia:') !!}
    <p>{{ $worker->ref_number }}</p>
</div>

<!-- Role Field -->
<div class="col-sm-12">
    {!! Form::label('role', 'Rol:') !!}
    <p>{{ $worker->role->name }}</p>
</div>