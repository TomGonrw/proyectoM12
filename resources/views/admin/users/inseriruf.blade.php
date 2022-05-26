@extends('layouts.inserir')

@section('content')
<div class="row titolar">
    <h1 style="text-align: center;">INSERIR UF</h1>
</div>
<div class="cajaCentral"> 
    <form method="POST" action="{{ route('inserirU') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Escriu el nom">
        </div>
        <div class="form-group">
            <label for="horas">horas</label>
            <input type="number" class="form-control" id="horas" name="horas" aria-describedby="emailHelp" placeholder="Escribe las horas de la uf">
        </div>
        <div class="form-group">
            <label for="users">Moduls</label>
            <select id="modul" name="modul" Class="form-select">
                @foreach($moduls as $modul)
                    <option value="{{$modul->id}}">{{$modul->nom}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="button" class="btn btn-success " onclick="document.location='/admin/ufs'"> ATRAS</button>
        <button type="submit" class="btn btn-primary">ENVIAR</button>
        

  

       
      
    </form>
<div>
@stop