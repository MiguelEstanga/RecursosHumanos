<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      {{ Auth::user()->roles[0]->name }}
    </a>
  
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="link_boton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            planillas
          </a>
          <ul  class="submenu" id="submenu" aria-labelledby="">
            <li><a  href="{{ route('planillabeneficiario.create') }}">crear una planilla</a></li>
         
            <li><a  href="#">Something else here</a></li>
          </ul>
        </li>
        
          @can("admin")
            <li class="nav-item">
                    <div href="{{ route('Usuario.index') }}" class="nav-link">
                usuarios
              </div>
            </li>
          @endcan
        
      </ul>
    </div>
  
  </div>
  <div class="avatar" id="avatar">
      avatar
  </div>
  <div class="avatarmenu" id="avatarmenu">
    <div class="close" id="close_menu">
      X
    </div>
    <div class=" bg-dark datos_session">
        <h4>
          Recursos Humanos Contradulia De Monagas
        </h4>
        <p>
          Correo: {{ Auth::user()->email }} <br>
          Cedula: {{ Auth::user()->cedula }}
        </p>
       
        
    </div>
    <div >
        <div class="p-2 item">
          <a class="fs-4 text-dark" href="{{ route('desboart') }}">Mis Planillas</a>
         
        </div>
        <div class="p-2 item" >
           <a class="fs-4 text-dark" href="{{ route('planillabeneficiario.create') }}">
              Crear Una Nueva
           </a>
        </div>
        @can('admin')
          <div class="p-2 item">
            <a class="fs-4 text-dark" href="{{ route('planillas.all') }}">
              Todas las planillas
            </a>
          </div>
           <div class="p-2 item">
            <a class="fs-4 text-dark" href="{{ route('solisitudes.index') }}">
              solisitudes
            </a>
          </div>
        @endcan

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
    border: solid 1px #fff;
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

  close_menu.addEventListener('click' , e=>{
      avatarmenu.classList.toggle('active')
      
   })
</script>