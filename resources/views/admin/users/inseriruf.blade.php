@extends('layouts.inserir')

@section('content')

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
            <select id="modul" name="modul">
                @foreach($moduls as $modul)
                    <option value="{{$modul->id}}">{{$modul->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

  

       
      
    </form>
<div>
@stop