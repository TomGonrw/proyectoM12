@extends('layouts.inserir')

@section('content')

<div class="cajaCentral"> 
    <form method="POST" action="{{ route('inserirA') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Escriu el nom">
        </div>

        <div class="form-group">
            <label for="cilce">Cicles</label>
            <select id="cicle" name="cicle">
                @foreach($cicles as $cicle)
                    <option value="{{$cicle->id}}">{{$cicle->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cognom">Cognom</label>
            <input type="string" class="form-control" id="cognom" name="cognom" aria-describedby="emailHelp" placeholder="Escriu el cognom">
        </div>

        <div class="form-group">
            <label for="dni">Dni</label>
            <input type="string" class="form-control" id="dni" name="dni" aria-describedby="emailHelp" pattern="^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$" placeholder="Escriu el dni">
        </div>

        <div class="form-group">
            <label for="correu">Correu</label>
            <input type="string" class="form-control" id="correu" name="correu" aria-describedby="emailHelp" pattern="[_a-z0-9-]+(.[_a-z0-9-]+)*@([i][n][s][c][a][m][i][d][e][m][a][r]|[x][t][e][c])+[.]+[c][a][t]$"title="solo se aceptan correos inscamidemar o xtec" placeholder="Escriu el correu">
        </div>

        <div class="form-group">
            <label for="direccio">Direccio</label>
            <input type="string" class="form-control" id="direccio" name="direccio" aria-describedby="emailHelp" placeholder="Escriu el direccio">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

  

       
      
    </form>
<div>
@stop