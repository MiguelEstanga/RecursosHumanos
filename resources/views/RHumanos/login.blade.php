<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>login</title>
</head>

<body>
    <div class="contenedor-login">

        <div class="formulario">
            <div class="logo">
                <img src="{{ asset('img/logo.jpeg') }}" alt="Logo">
            </div>
            <div class="contenedorsession">


                <form method="post" action="{{ route('auth') }}">
                    @csrf
                    <div>
                        <h2>
                            Inicio de Sesión
                        </h2>

                    </div>
                    <div class="data-input">

                        <div class="input">
                            <label for="email">
                                <ion-icon name="mail"> </ion-icon>
                            </label> <input type="text" name="email" class="input" id="email">
                        </div>
                        @error('email')
                            <p style="color: red"> El email es requerido </p>
                        @enderror
                    </div>
                    <div class=" ">

                        <div class="">
                            <label for="password">
                                <ion-icon name="glasses"></ion-icon>
                            </label> <input type="password" class="input" name="password" id="password">
                        </div>
                        @error('password')
                            <p style="color: red"> La contraseña es requerida </p>
                        @enderror
                    </div>
                    <div class="acciones">

                        <div class="col-sm-6 control" style="margin: auto">
                            <a href="{{ route('home') }}" class="lick btn btn-primary">Registrarse</a>
                        </div>
                        <div class="col-sm-6   control">
                            <button type="submit" class="btn btn-primary" > Iniciar Sesión </button>
                        </div>
                    </div>
                    @if (session('mensage'))
                        <p style="color: #5de28c">{{ session('mensage') }}</p>
                    @endif
                    @if (session('login'))
                        <p style="
                            text-align: center;
                            color: red
                            ">
                            Los datos ingresados son incorrectos
                        </p>
                    @endif
            </div>
            </form>




        </div>



    </div>
</body>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</html>


<style>
    * {
        margin: 0;
    }

    body{
       
        background-image: linear-gradient( 60deg , #212529  , #5DADE2 , #28B463 80%)  ;
       
    }

    .contenedor-login {

        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .formulario {
      
        width: 500px;
        height: 600px;
        display: grid;
        position: relative;
    }

    .logo {
        position: absolute;
        border-radius: 50%;
        box-shadow: 0 0 10px black;
        width: 150px;
        height: 150px;
        margin: auto;
        top: -50px;
        left: -50px;
        z-index: 2;
        background: black;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #5DADE2;
    }

    .logo img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .contenedorsession form {


        height: 70%;
        display: grid;
        grid-template-rows: repeat(4, 1fr);
        gap: 2px;
        border-radius: 5px;
        *box-shadow: -2px 4px 15px 4px rgba(0,0,0,0.91);
        transition: linear all 500ms;

    }

    .contenedorsession form:hover{
        box-shadow: -2px 4px 15px 4px rgba(0,0,0,0.91);
    }

    .contenedorsession form div {

        display: grid;
        justify-content: center;
        align-items: center;

    }

    .contenedorsession form div label {
        position: relative;

        width: 50px;
        height: 50px;
        top: 50px;
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .contenedorsession form div input {
        height: 50px;
        width: 300px;
        border: none;
        margin: 0 10px;
        padding: 0 50px;
        position: relative;
        font-size: 15px;
        font-weight: 100;
        font-family: sans-serif;
        outline: none;

    }

    .contenedorsession form div h2 {
        width: 100%;
        text-align: center;
        font-size: 30px;
    }

    .contenedorsession form div input:focus {
        color: rgb(101, 101, 187);
    }

    .contenedorsession form div input:active {
        border: 1px solid rgb(101, 101, 187);
    }

    .acciones {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        width: 100%;
    }

    .acciones button {
        border: none;
        width: 150px;
        height: 40px;
        border-radius: 5px;
        font-weight: 100;
        font-family: sans-serif;
        cursor: pointer;
       
    }

    .acciones a {
        text-decoration: none;
        font-weight: 100;
        font-family: sans-serif;
        cursor: pointer;
    }

    h2 {
        font-size: 20px;
        color: #fff;
        font-weight: 100;
    }
</style>
