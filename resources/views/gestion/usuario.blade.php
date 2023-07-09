@extends('layouts.app')
@section('titulo', 'Editar:Usuario')

@section('contenido')
   
    <div class="container-sm">
        <h2 class="alert" > Editar Usuario </h2>

        <form method="post" action="{{route('gestionar.put' , $usuario->id)   }}" class="row g-3 needs-validation" novalidate>
            @csrf
            @method('put')
           
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nombre Completo</label>
                <input  type="text" 
                        value="{{$usuario->name}}" 
                        class="form-control" 
                        id="validationCustom01"
                        name="nombre_completo" 
                        required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Apellidos</label>
                <input type="text" 
                        class="form-control" 
                        id="validationCustom02" 
                        name="apellido"
                        value="{{$usuario->apellido}}" 
                        required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Cedula</label>
                <div class="input-group has-validation">
                    
                    <input 
                            value="{{$usuario->cedula}}"
                            type="text" 
                            name="cedula"
                            class="form-control" 
                            id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required>
                    
                </div>
            </div>
         
            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Rol</label>
               
                <select name="role" class="form-select" id="validationCustom04" required>
                    
                    <option  {{ $usuario->role_id == 2 ? 'selected' : 'null' }} value="Usuario" > Usuario  </option>
                    <option  value="Administrador" {{ $usuario->role_id == 1 ? 'selected' : 'null' }}   > Administrador </option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Email</label>
                <input type="text" 
                        class="form-control" 
                        id="validationCustom02" 
                        name="email"
                        value="{{$usuario->email}}" 
                        required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
          
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
@endsection
