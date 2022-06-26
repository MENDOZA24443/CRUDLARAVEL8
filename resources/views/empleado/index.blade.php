@extends('layouts.app')

@section('content')


<div class="container">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible " role="alert">
 
 {{Session::get('mensaje')}}
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
 @endif





<a href="{{url('empleado/create')}}" class="btn btn-success"> Registrar nuevo empleado</a>
<br>
<br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th> Correo </th>
            <th>Cedula</th>
            <th> Fecha de Nacimiento </th>
            <th>Acciones</th>
            
        </tr>
    </thead>

    <tbody id="myTable">  
    <input class="form-control" id="myInput" type="text" placeholder="Filtrar...">
    <br>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->Nombre}}</td>
            <td>{{$empleado->Apellido}}</td>
            <td>{{$empleado->Correo}}</td>
            <td>{{$empleado->Cedula}}</td>
            <td>{{$empleado->date}}</td>
            <td>
                <a href="{{url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                | 
            <form action="{{url('/empleado/'.$empleado->id)}}" class="d-inline" method="post" >
            @csrf
            {{method_field('DELETE')}}

            <input class="btn btn-danger" type="submit"  onclick="return confirm('Quieres Borrar')"  value="Borrar">
                
            </form> 



            </td>
        </tr>
        @endforeach
<script>
   $(document).ready(function(){
   $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    </tbody>
    
</table>

{!!$empleados->links()!!}
</div>
@endsection