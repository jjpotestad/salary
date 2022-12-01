<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col text-center">
                    <h3>Detalle de la entrega mensual</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <h5>Información general</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Trabajador</th>
                                <th scope="col">Cantidad de entregas</th>
                                <th scope="col">Horas trabajadas</th>
                                <th scope="col">Fecha de la entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $monthlyDelivery->worker->full_name }}</td>
                                <td>{{ $monthlyDelivery->count_delivery }}</td>
                                <td>{{ $monthlyDelivery->hours_worked }}</td>
                                <td>{{ $monthlyDelivery->date_delivery->format('m-Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <h5>Desgloce del salario</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Salario base</th>
                                <th scope="col">Pago por entregas</th>
                                <th scope="col">Bono</th>
                                <th scope="col">Impuestos</th>
                                <th scope="col">Sueldo mensual</th>
                                <th scope="col">Vale de despensa</th>
                                <th scope="col">Monto total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $dataSalary['base_salary'] }}</td>
                                <td>{{ $dataSalary['payment_for_deliveries'] }}</td>
                                <td>{{ $dataSalary['bonus_salary'] }}</td>
                                <td>{{ $dataSalary['taxes'] }}</td>
                                <td>{{ $dataSalary['monthly_salary'] }}</td>
                                <td>{{ $dataSalary['grocery_coupon'] }}</td>
                                <td>{{ $dataSalary['total'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>
</html>