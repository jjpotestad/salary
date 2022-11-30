<!-- Count Delivery Field -->
<div class="col-sm-12">
    {!! Form::label('count_delivery', 'Cantidad de entregas:') !!}
    <p>{{ $monthlyDelivery->count_delivery }}</p>
</div>

<!-- Hours Worked Field -->
<div class="col-sm-12">
    {!! Form::label('hours_worked', 'Horas trabajadas:') !!}
    <p>{{ $monthlyDelivery->hours_worked }}</p>
</div>

<!-- Date Delivery Field -->
<div class="col-sm-12">
    {!! Form::label('date_delivery', 'Fecha de la entrega:') !!}
    <p>{{ $monthlyDelivery->date_delivery->format('m-Y') }}</p>
</div>

<!-- Worker Field -->
<div class="col-sm-12">
    {!! Form::label('worker', 'Trabajador:') !!}
    <p>{{ $monthlyDelivery->worker->full_name }}</p>
</div>