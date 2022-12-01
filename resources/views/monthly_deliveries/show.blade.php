@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalle de la entrega mensual</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('monthlyDeliveries.index') }}">
                        Regresar
                    </a>
                    <a href="{{ route('getPdf', [$monthlyDelivery->id]) }}"
                        class='btn btn-default float-right'>
                        Exportar
                        <i class="far fa-file-pdf"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        @include('monthly_deliveries.show_fields')
                    </div>
                    <div class="col-4">
                        <!-- Base salary Field -->
                        {!! Form::label('base_salary', 'Salario base:') !!}
                        <p>{{ $dataSalary['base_salary'] }}</p>

                        <!-- Payment for deliveries Field -->
                        {!! Form::label('payment_for_deliveries', 'Pago por entregas:') !!}
                        <p>{{ $dataSalary['payment_for_deliveries'] }}</p>

                        <!-- Bonus salary Field -->
                        {!! Form::label('bonus_salary', 'Bono:') !!}
                        <p>{{ $dataSalary['bonus_salary'] }}</p>

                        <!-- Taxes Field -->
                        {!! Form::label('taxes', 'Impuestos:') !!}
                        <p>{{ $dataSalary['taxes'] }}</p>
                    </div>
                    <div class="col-4">
                        <!-- Monthly salary Field -->
                        {!! Form::label('monthly_salary', 'Sueldo mensual:') !!}
                        <p>{{ $dataSalary['monthly_salary'] }}</p
                        >

                        <!-- Grocery coupon Field -->
                        {!! Form::label('grocery_coupon', 'Vale de despensa:') !!}
                        <p>{{ $dataSalary['grocery_coupon'] }}</p>

                        <!-- Total Field -->
                        {!! Form::label('total', 'Monto total:') !!}
                        <p>{{ $dataSalary['total'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
