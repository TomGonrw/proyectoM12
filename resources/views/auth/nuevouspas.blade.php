@extends('layouts.inserir')

@section('content')

<div class="cajaCentral"> 
    <form method="POST" action="{{ route('Nuevapass', $usu->id) }}">
        @csrf
        @method('PUT')  
        <div class="form-group">
            <label for="contra">Contrasenya</label>
            <input type="password" class="form-control" id="contra" name="contra" placeholder="{{$usu->id}}">
        </div>


        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
    </form>
<div>
@stop