<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="formularioRegistro">

        <div class="container-sm conten-data">
            <div class="logo">
                <img src="{{ asset('img/logo.jpeg') }}" alt="Logo">
            </div>
            <form class="row g-3 needs-validation" method="post" action="{{ route('registroUsuario') }}">
                @csrf
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="validationCustom01" name="name" required>
                    @error('name')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="valid-feedback">
                        nombre
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="validationCustom01" name="apellido" required>
                    @error('apellido')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="valid-feedback">
                        apellido Completo
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Cédula de Identidad</label>
                    <input type="text" class="form-control" id="validationCustom02" name="cedula" required>
                    @error('cedula')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="valid-feedback">
                        Cedula de identidad
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Contraseña</label>
                    <div class="input-group has-validation">

                        <input type="password" name="password" class="form-control" name="password"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        @error('password')
                            <p class="alert alert-danger"> {{ $message }} </p>
                        @enderror
                        <div class="invalid-feedback">
                            contraceña
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Repetir Contraseña</label>
                    <input type="password" name="password_confirm" class="form-control" id="validationCustom03"
                        required>
                    @error('password')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="invalid-feedback">
                        Repetir Contraseña
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="validationCustom05" class="form-label">Email</label>
                    <input type="email" name="email" required class="form-control" id="validationCustom05" required>
                    @error('email')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="invalid-feedback">
                        Email
                    </div>
                </div>

                <div class="col-12 accion">
                    <div> <a href="{{ route('login') }}" class="btn btn-primary" > Volver al Inicio de Sesión </a> </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>
<style>
    body{
        background-image: linear-gradient( 60deg , #212529  , #5DADE2 , #28B463 80%)  ;

    }
    .accion {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }

    .accion div {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .accion div button {
        border: none;
        width: 150px;
        height: 40px;
        border-radius: 5px;
        font-weight: 100;
        font-family: sans-serif;
        cursor: pointer;
       
         }

    .logo {
        position: absolute;
        border-radius: 50%;
        box-shadow: 0 0 5px black;
        width: 150px;
        height: 150px;
        margin: auto;
        top: -120px;
        left: -120px;
        z-index: 2;
        background: black;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #5DADE2;
    }
    .logo img{
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }
    .formularioRegistro {
        
       
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .conten-data {
        padding: 20px;
        border-radius: 5px;
        width: 500px;
        color: #fff;
      
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);
        transition:all 500ms linear;
              *box-shadow: -2px 4px 15px 4px rgba(0,0,0,0.91);

    }

    .conten-data:hover {
        
              box-shadow: -2px 4px 15px 4px rgba(0,0,0,0.91);

    }
</style>

</html>
