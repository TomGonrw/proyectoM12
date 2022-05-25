@extends('layouts.inserir')

@section('content')

<div class="cajaCentral"> 

    <form method="POST" action="{{ route('updateuf', $uf->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
                <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="{{$uf->nom}}">
        </div>
        <div class="form-group">
            <label for="horas">Hores</label>
                <input type="number" class="form-control" id="horas" name="horas" aria-describedby="emailHelp" placeholder="{{$uf->horas}}">
        </div>
        <div class="form-group">
            <label for="modul">Modul</label>
            <select name="modul" id="modul">
                @foreach($moduls as $modul)
                    @if($modul->id == $uf->moduls->id)
                        <option value="{{$modul->id}}" selected>{{$modul->nom}}</option>
                    @else
                        <option value="{{$modul->id}}">{{$modul->nom}}</option>
                    @endif
                @endforeach
            </select>
   
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<div>

    <button type="button" class="btn btn-success " onclick="document.location='users'"> ATRAS</button>

@stop