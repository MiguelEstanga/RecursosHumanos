    <div 
        class=" 
            card
            {{ $planilla->estado->id == 1 ? 'esperando' : '' }}
            {{ $planilla->estado->id == 4 ? 'aprobado' : '' }}
            {{ $planilla->estado->id == 5 ? 'invalida' : '' }}
            bg-dark
            text-white        
        "

    >
              <div class="card-header ">
                <div class="row g-3">
                    <div class="col-md-4">
                            Petición Hecha por : {{ $planilla->user->name }} 
                     </div>
                        <div class="col-md-4">
                            Cédula : {{ $planilla->user->cedula }}
                        </div>
                        <div class="col-md-4">
                            Estado : {{ $planilla->estado->estado }}  {{ $planilla->created_at }}
                        </div>
                </div>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ $planilla->TipoDeSolisitud->Tipo_Solisitud }}</h5>
                <div class="card-text">
                    A Nombre de : {{ $planilla->Nombre_Completo }} {{ $planilla->Apellido_Completo }} 
                </div>
                <div>
                    Cédula: {{ $planilla->Cedula }}
                </div>
                <div>
                     Cargo: {{ $planilla->Cargo }}
                </div>

                @can("admin")
                                    <a "></a> 
                    <a target="_black" href="{{ route('planilla.show.admin' , $planilla->id) }}" class="btn btn-primary">Ver planilla</a>

                    <a target="_black" href="{{ route('planilla.respuesta' , $planilla->id) }}"  class ="btn btn-success">Responder</a>


                @endcan
                @if($planilla->estado->id == 5  || $planilla->estado->id == 2 )
                    <form action="{{ route('planillabeneficiario.delete' , $planilla->id) }}" method="post" >
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger">
                            Eliminar
                        </button>
                    </form>
                   
                @endif
                @if($planilla->mensage == 'null')
                    <p>
                        Eperando Respuesta Del Analista
                    </p>
                @endif
              </div>
              <div 
                class="
                    alert
                    {{ $planilla->estado->id == 1 ? 'alert-primary' : '' }}
                    {{ $planilla->estado->id == 2 ? 'alert-info' : '' }}
                    {{ $planilla->estado->id == 3 ? 'alert-warning' : '' }}

                    {{ $planilla->estado->id == 4 ? 'alert-success' : '' }}
                    {{ $planilla->estado->id == 5? 'alert-danger' : '' }}


                    container respuesta 
                      ">

                
                     {{ $planilla->mensage }}
              </div>
</div>

<style>
    .card{
        padding: 10px;
    }
    .invalidada{
        box-shadow: 0 0 10x red;
        border: solid 3px red;
    }

    .esperando{
        border: solid 3px yellow;
    }

    .aprobado{
        border: solid 3px #239B56;
       
    }
</style>