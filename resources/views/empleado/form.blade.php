<h1>{{$modo}} empleado </h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
    <ul>    
    @foreach($errors-> all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
    </div>
    
@endif


<div class="form-group">
<label for="Nombre">Nombre</label>

<input type="text" class="form-control" name="Nombre" 
value="{{isset($empleado->Nombre)? $empleado->Nombre:old('Nombre')}}" id="Nombre">


</div>
<div class="form-group">
<label for="Apellido">Apellido</label>
<input type="text" class="form-control" name="Apellido"
 value="{{isset($empleado->Apellido)?$empleado->Apellido:old('Apellido')}}" id="Apellido">

</div>

<div class="form-group">
<label for="Correo">Correo</label>
<input type="text" class="form-control" name="Correo" 
value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" id="Correo">

</div>

<div class="form-group">
<label for="Cedula">Cedula</label>
<input type="number" class="form-control" name="Cedula" 
value="{{isset($empleado->Cedula)?$empleado->Cedula:old('Cedula')}}" id="Cedula">

</div>

<div class="form-group">
<label for="date">Fecha de Nacimiento</label>
<input type="date" class="form-control" name="date" value="{{isset($empleado->date)?$empleado->date:old('date')}}" id="date" >
<br>
</div>





<input class="btn btn-success" type="submit" value="{{$modo}} datos" >
<a class="btn btn-primary" href="{{url('empleado')}}"> Regresar </a>
<br>