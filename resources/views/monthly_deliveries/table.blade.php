<div class="table-responsive">
    <table class="table" id="monthlyDeliveries-table">
        <thead>
        <tr>
            <th>Cantidad de entregas</th>
            <th>Horas trabajadas</th>
            <th>Fecha de la entrega</th>
            <th>Trabajador</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($monthlyDeliveries as $monthlyDelivery)
            <tr>
                <td>{{ $monthlyDelivery->count_delivery }}</td>
                <td>{{ $monthlyDelivery->hours_worked }}</td>
                <td>{{ $monthlyDelivery->date_delivery->format('m-Y') }}</td>
                <td>{{ $monthlyDelivery->worker->full_name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['monthlyDeliveries.destroy', $monthlyDelivery->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('monthlyDeliveries.show', [$monthlyDelivery->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('monthlyDeliveries.edit', [$monthlyDelivery->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estás seguro de eliminar la entrega mensual?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
