<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a
      id="desboart" 
      class="navbar-brand"  ">
      {{ Auth::user()->roles[0]->name }}
    </a>
  
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
         <li class="nav-item">
                    <a href="{{ route('anuncion.index') }}" class="nav-link">
                Inicio
              </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="link_boton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Planillas
          </a>
          <ul  class="submenu" id="submenu" aria-labelledby="">
            <li><a  href="{{ route('planillabeneficiario.create') }}">Crear una Planilla</a></li>
         
            
          </ul>
        </li>
        
          @can("admin")
            <li class="nav-item">
              <a href="{{ route('Usuario.index') }}" class="nav-link">
                Usuarios
              </a>
            </li>
             <li class="nav-item">
              <a href="{{ route('reporte') }}" class="nav-link">
                Reporte
              </a>
            </li>
          @endcan
        
      </ul>
    </div>
  
  </div>
  <div class="avatar" id="avatar">
      @can('admin')
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 512 512"><path fill="white" d="M213.3 384c0-87 65.2-158.7 149.3-169.2v-1.5c5.5-8 21.3-21.3 21.3-42.7s-21.3-42.7-21.3-53.3C362.7 32 319.2 0 256 0c-60.5 0-106.7 32-106.7 117.3c0 10.7-21.3 32-21.3 53.3s15.2 35.4 21.3 42.7c0 0 0 21.3 10.7 53.3c0 10.7 21.3 21.3 32 32c0 10.7 0 21.3-10.7 42.7L64 362.7C21.3 373.3 0 448 0 512h271.4c-35.5-31.3-58.1-77-58.1-128zM384 256c-70.7 0-128 57.3-128 128s57.3 128 128 128s128-57.3 128-128s-57.3-128-128-128zm85.3 149.3h-64v64h-42.7v-64h-64v-42.7h64v-64h42.7v64h64v42.7z"/></svg>

      @endcan
      @can('public')
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 256 256"><path fill="white" d="M230.92 212c-15.23-26.33-38.7-45.21-66.09-54.16a72 72 0 1 0-73.66 0c-27.39 8.94-50.86 27.82-66.09 54.16a8 8 0 1 0 13.85 8c18.84-32.56 52.14-52 89.07-52s70.23 19.44 89.07 52a8 8 0 1 0 13.85-8ZM72 96a56 56 0 1 1 56 56a56.06 56.06 0 0 1-56-56Z"/></svg>

      @endcan
  </div>
  <div class="avatarmenu" id="avatarmenu">
    <div class="close" id="close_menu">
      X
    </div>
    <div class=" bg-dark datos_session">
        <h4>
          Recursos Humanos Contraloría De Monagas
        </h4>
        <p>
          Correo: {{ Auth::user()->email }} <br>
          Cédula: {{ Auth::user()->cedula }}
        </p>
       
        
    </div>
    <div >
        <div class="p-2 item">
          <a class="fs-4 text-dark" href="{{ route('desboart') }}">Mis Planillas</a>
         
        </div>
        <div class="p-2 item" >
           <a class="fs-4 text-dark" href="{{ route('planillabeneficiario.create') }}">
              Crear Planilla
           </a>
        </div>
        @can('admin')
          <div class="p-2 item">
            <a class="fs-4 text-dark" href="{{ route('planillas.all') }}">
              Todas las Planillas
            </a>
          </div>
           <div class="p-2 item">
            <a class="fs-4 text-dark" href="{{ route('solisitudes.index') }}">
              Solicitudes
            </a>
          </div>
           <div class="p-2 item">
            <a class="fs-4 text-dark" href="{{ route('anuncion.create') }}">
              Crear Un Anuncio
            </a>
          </div>
        @endcan
          <div class="p-2 item">
            <form action="{{ route('cerrar_sesion') }}" method="post" >
              @csrf
                <button
                style="
                  border: none;
                  background-color: transparent;
                "
                 class="fs-4 text-dark" >
                   Cerrar Sesion
              </button>
            </form>
          
          </div>
    </div>
  </div>
</nav>

<style>
  a{
    text-decoration: none;
  }
  .submenu{
    position: absolute;
    display: none;
    background-color: #17202A;
    color: #000;
    padding: 10px 0;
    list-style: none;
   width: 200px;
   z-index: 100;
    border-radius: 10px;
  }
  .submenu li{
     padding: 10px;
  }
  .submenu li:hover{
    background: rgba(255, 255, 255, .4);

  }
  .submenu li a{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
  }

  .submenu.active{
    display: block;
  }

  .avatar{
    border-radius: 50%;
    width: 50px;
    height: 50px;
    margin-right: 30px;
    position: relative;
    cursor: pointer;
  }

  .avatarmenu{
    position: fixed;
    transition: all 300ms linear;
   background-color: #ffff;
   box-shadow: 0 0 10px rgba(0, 0, 0, .7);
    left:-100%;
    top: 0;
    height: 100vh;
    width: 40%;
    z-index: 100;
  }

  .avatarmenu.active{
    left: 0;
  }

  .close{
    color: #fff;
   
    width: 40px;
    height: 40px;
    position: absolute;
    top: 1px;
    right: 1px;
    text-align: center;
    font-size: 20px;
    font-weight: 400;
    cursor: pointer;

  }

  .datos_session{
    background-color: #343a40;
    padding: 20px;
    height: 20%;
    color: #fff;
    font-family: Arial;
    font-weight: 400;
  }

  .item:hover   {
    background-color: #212529;
    
  }


  .item:hover a{
    color: #fff!important;
  }

</style>
<script type="text/javascript">
   link_boton.addEventListener('click' , e=>{
      submenu.classList.toggle('active')
   })

   avatar.addEventListener('click' , e=>{
      avatarmenu.classList.toggle('active')
   })

   desboart.addEventListener('click' , e=>{
      avatarmenu.classList.toggle('active')
   })

  close_menu.addEventListener('click' , e=>{
      avatarmenu.classList.toggle('active')
      
   })
</script>