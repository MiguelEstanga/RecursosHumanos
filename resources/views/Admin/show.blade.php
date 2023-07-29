<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .contenido {

            height: 90vh;
        }

        h1 {
            width: 100%;
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: rgba(0, 0, 0, 1);
            font-size: 25px;
        }




        .firma {
            font-size: 15px;
            display: flex;
            justify-content: end;
            margin: 50px 0;
        }

        .firma div {
            border-bottom: solid 1px black;
            width: 250px;
            display: inline-block;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: auto;
            border: solid 1px black;
        }

    

        table th,td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: rgba(0, 0, 0, 1);
            font-size: 15px;
        }

        .contenedor .par {

            margin: 20px 0;

        }

        .contenedor .par div {

            margin: 20px 0;
            display: inline-block;
            margin: auto;
            font-size: 15px;
            font-weight: 100;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: rgba(0, 0, 0, 0.7);
        }

        .contenedor .doblepar div {
            display: inline-block;
            margin: auto;
            font-size: 15px;
            font-weight: 100;

            margin: 0 1px 0 0;
            width: 24%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: rgba(0, 0, 0, 0.7);
        }

        .contenedor .doblepar .doblepar-titulo {
            width: 10%;

            text-align: left;
        }

        .contenedor .doblepar .doblepar-data {
            text-align: center;
            width: 34%;

            border-bottom: 1px solid rgba(0, 0, 0, 0.7);
        }

        .data {
            width: 70%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.7);
            margin: auto;
            text-align: center;
        }

        .titulo {
            width: 25%;
           
        }
    </style>
</head>

<body>

    <div class="container-sm contenido">

        <div class="cabecera">
            <div class="logo">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/logo2.png'))) }}">

            </div>
            <div class="leyenda">
                DIRECCION DE RECURSOS HUMANOS
            </div>
        </div>
        <HR>
        </HR>
        <div class="planilla">
            <h1>
                DATOS DEL FUNCIONARIO
            </h1>

            <div class="col contenedor">
                <div class="par">
                    <div class="titulo">
                        NOMBRES Y APELLIDOS:
                    </div>
                    <div class="data">
                        {{ $registro->Nombre_Completo }} {{ $registro->Apellido_Completo }}

                    </div>
                </div>
                <div class="par">
                    <div class="titulo">
                        CEDULA DE IDENTIDAD:
                    </div>
                    <div class="data">
                        {{ $registro->Cedula }}

                    </div>
                </div>
                <div class="par">
                    <div class="titulo">
                        DEPENDENCIA NOMINA :
                    </div>
                    <div class="data">
                        {{ $registro->Dependencia_Nominal }}

                    </div>
                </div>
                <div class="doblepar">
                    <div class="doblepar-titulo">
                        CARGO:
                    </div>
                    <div class="doblepar-data">
                        {{ $registro->Cargo }}
                    </div>
                    <div class="doblepar-titulo">
                        CODIGO:
                    </div>
                    <div class="doblepar-data">
                        {{ $registro->Codigo }}
                    </div>
                </div>
                <div class="par">
                    <div class="titulo">
                        Direccion :
                    </div>
                    <div class="data">
                        {{ $registro->Direccion }}

                    </div>
                </div>
            </div>




        </div>
        <h1 style="text-align: center; margin:20px 0; ">DATOS DE CARGA FAMILIAR</h1>


        <table class="tablecuston table ">
            <thead>
                <tr>
                    <th>Nombre Y Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    @if($registro->id_tsolisitud == 2)
                        <th>
                            Fecha De Defuncion
                        </th>
                    @endif
                        
                    <th>Cedula Identidad</th>
                    <th>Grado de estudio</th>
                </tr>
            </thead>

            <tbody>
                @foreach($registro->carga as $carga)
                    <td>
                        {{ $carga->Nombre_Apellido }}
                    </td>
                    @if($registro->id_tsolisitud == 2 )
                        <td>
                            {{ $carga->Fecha_De_Defuncion }}
                        </td>    
                    @endif
                    <td>
                           
                        {{$carga->Fecha_Nacimiento}}
                        
                    </td>
                    <td>
                       {{ $carga->Cedula}}
                    </td>
                    <td>
                        {{ $carga->Nivel_Estudio }}
                    </td>
                @endforeach
            </tbody>
          {{ $registro->carga }}
        </table>

        <div class="firma" style="position:absolute; right:0;">
            RESIBIDO POR : <div></div>
        </div>
        <div class="firma">
            FECHA : <div></div>
        </div>
    </div>

</body>

</html>

<style>
    .d{
        height: ;
        width: ;
    }
</style>