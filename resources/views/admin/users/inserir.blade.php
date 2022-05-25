@extends('layouts.inserir')

@section('content')

<div class="cajaCentral"> 
    <form method="POST" action="{{ route('InsU') }}" id="form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Escriu el nom">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" pattern="[_a-z0-9-]+(.[_a-z0-9-]+)*@([i][n][s][c][a][m][i][d][e][m][a][r]|[x][t][e][c])+[.]+[c][a][t]$" title="solo se aceptan correos inscamidemar o xtec" placeholder="Escriu el email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="contra">Contrasenya</label>
            <input type="password" class="form-control" id="contra" name="contra" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="admin">Admin</label>
            <select name="admin" id="admin">
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<div>

  
  
  
@stop