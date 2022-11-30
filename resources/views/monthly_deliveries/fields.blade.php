<!-- Count Delivery Field -->
<div class="form-group col-sm-6">
    {!! Form::label('count_delivery', 'Cantidad de entregas:') !!}
    {!! Form::number('count_delivery', null, ['class' => 'form-control']) !!}
</div>

<!-- Hours Worked Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hours_worked', 'Horas trabajadas:') !!}
    {!! Form::number('hours_worked', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Delivery Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_delivery', 'Fecha de la entrega:') !!}
    {!! Form::text('date_delivery', null, ['class' => 'form-control','id'=>'date_delivery']) !!}
</div>

<!-- Worker Field -->
<div class="form-group col-sm-4">
    {!! Form::label('worker_id', 'Trabajador:') !!}
    {!! Form::select('worker_id', $workers, null, ['class' => 'custom-select form-control','id'=>'worker_id']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_delivery').datetimepicker({
            format: 'YYYY-MM',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush