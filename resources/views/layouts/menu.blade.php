
<li class="nav-item">
    <a href="{{ route('workers.index') }}"
       class="nav-link {{ Request::is('workers*') ? 'active' : '' }}">
        <p>Trabajadores</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('monthlyDeliveries.index') }}"
       class="nav-link {{ Request::is('monthlyDeliveries*') ? 'active' : '' }}">
        <p>Entregas mensuales</p>
    </a>
</li>


