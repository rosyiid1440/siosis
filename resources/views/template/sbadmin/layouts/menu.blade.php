@if (Auth::user()->name != '')
    <li class="nav-item {{ request()->is('periode') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('periode') }}">
            <i class="fas fa-calendar-week"></i>
            <span>Periode</span>
        </a>
    </li>
    {{-- <li class="nav-item {{ request()->is('angkatan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('angkatan') }}">
            <i class="fas fa-calendar-week"></i>
            <span>Angkatan</span>
        </a>
    </li> --}}
    <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-calendar-week"></i>
            <span>User</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('kandidat') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('kandidat') }}">
            <i class="fas fa-calendar-week"></i>
            <span>Kandidat</span>
        </a>
    </li>
@else
@endif
