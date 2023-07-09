<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid menu">
        @auth
            <p class="logo">
                {{ Auth::user()['name'] }} {{ Auth::user()['apellido'] }}
            </p>
        @endauth
        @guest
            <a class="navbar-brand" href="#">Administracion Recursos Humanos </a>
        @endguest

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-tabs">
                    @auth
                        <li class="nav-item ">
                            <a aria-current="page" class="nav-link {{ request()->path() == 'inicio' ? 'active' : '' }} "
                                aria-current="page" href="{{ route('inicio') }}">inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'soliciotudPlanilla' ? 'active' : '' }}"
                                aria-current="page" href="{{ route('planillas') }}"> solicitud de planilla </a>
                        </li>


                    @endauth

                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'usuarios' ? 'active' : '' }}" aria-current="page"
                                href="{{ route('gestionar.usarios') }}">usuarios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link  {{ request()->path() == 'solicitudes' ? 'active' : '' }} " aria-current="page"
                                href="{{ route('solicitudes') }}"> solicitudes </a>
                        </li>
                    @endcan
                    @can('superadmin')
                        <li class="nav-item">
                            <a href="{{ route('anuncion') }}"
                                class="nav-link  {{ request()->path() == 'anuncion' ? 'active' : '' }}" aria-current="page"
                                href="">Anuncio para los talentos</a>
                        </li>
                    @endcan

                    <li>
                        <a class="nav-link " href="  {{ route('logout') }} "> cerrar session </a>
                    </li>


                </ul>

            </div>
        @endauth

    </div>
</nav>
<style>
    nav{
        margin:0 0 30px 0;
       
    }
 
    .logo {
        font-size: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #020202;
        height: 100%;
        margin: 0 40px 0 0;
    }
</style>
