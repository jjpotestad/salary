<div class="table-responsive">
    <table class="table" id="workers-table">
        <thead>
        <tr>
            <th>Nombre completo</th>
            <th>Número de referencia</th>
            <th>Rol</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($workers as $worker)
            <tr>
                <td>{{ $worker->full_name }}</td>
                <td>{{ $worker->ref_number }}</td>
                <td>{{ $worker->role->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['workers.destroy', $worker->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('workers.show', [$worker->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('workers.edit', [$worker->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ route('listByWorker', [$worker->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="fas fa-truck"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estás seguro de eliminar al trabajador?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
