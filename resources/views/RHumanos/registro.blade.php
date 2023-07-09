<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>registrar</title>
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
                    <label for="validationCustom01" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="validationCustom01" name="name" required>
                    @error('name')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="valid-feedback">
                        nombre
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Apelldo Completo</label>
                    <input type="text" class="form-control" id="validationCustom01" name="apellido" required>
                    @error('apellido')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="valid-feedback">
                        apellido Completo
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Cedula de identidad</label>
                    <input type="text" class="form-control" id="validationCustom02" name="cedula" required>
                    @error('Cedula')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="valid-feedback">
                        Cedula de identidad
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">contraceña</label>
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
                    <label for="validationCustom03" class="form-label">repetir contraceña</label>
                    <input type="password" name="password_confirm" class="form-control" id="validationCustom03"
                        required>
                    @error('password')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="invalid-feedback">
                        repetir contraceña
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="validationCustom05" class="form-label">email</label>
                    <input type="email" name="email" required class="form-control" id="validationCustom05" required>
                    @error('email')
                        <p class="alert alert-danger"> {{ $message }} </p>
                    @enderror
                    <div class="invalid-feedback">
                        emiail
                    </div>
                </div>

                <div class="col-12 accion">
                    <div> <a href="{{ route('login') }}"> login </a> </div>
                    <div>
                        <button class="" type="submit">Submit form</button>
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
        background: #5DADE2;
        color: #fff;
    }

    .logo {
        position: absolute;
        border-radius: 50%;
        box-shadow: 0 0 5px black;
        width: 200px;
        height: 200px;
        margin: auto;
        top: -150px;
        left: -150px;
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
        background-image: linear-gradient(90deg, #F4D03F, #5DADE2, #E74C3C);
        border: solid 1px black;
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
        background: rgba(255, 255, 255, .5);
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);
        border: 1.5px solid rgba(209, 213, 219, 0.3);
    }
</style>

</html>
