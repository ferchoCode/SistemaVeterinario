<li class="side-menus {{ Request::is('home') ? 'active' : '' }} {{ Request::is('home/*') ? 'active' : '' }}" 
aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle "  href="{{ url('reporte') }}">
        <i class="fas fa-flag"></i><span>- Reportes</span>
    </a>
</li>

{{-- <li class="side-menus {{ Request::is('tipo-alquiler') ? 'active' : '' }}{{ Request::is('tipo-alquiler/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('tipo-alquiler') }}">
        <i class=" fas fa-building"></i><span>-Alquiler</span>
    </a>
   
</li> --}}

<li class="side-menus {{ Request::is('cliente') ? 'active' : '' }}{{ Request::is('cliente/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('cliente') }}">
        <i class=" fas fa-user"></i><span>-Cliente</span>
    </a>
   
</li>

<li class="side-menus {{ Request::is('mascota') ? 'active' : '' }}{{ Request::is('masocta/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('mascota') }}">
        <i class=" fas fa-dog "></i><span>-Mascota</span>
    </a>
</li>
<li class="side-menus {{ Request::is('especie') ? 'active' : '' }}{{ Request::is('especie/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('especie') }}">
        <i class=" fas fa-paw "></i><span>-Especie</span>
    </a>
</li>
<li class="side-menus {{ Request::is('raza') ? 'active' : '' }}{{ Request::is('raza/*') ? 'active' : '' }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="{{ url('raza') }}">
        <i class=" fas fa-paw "></i><span>-Raza</span>
    </a>
</li>
