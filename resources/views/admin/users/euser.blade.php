@extends('layouts.inserir')

@section('content')
<div class="row titolar">
    <h1 style="text-align: center;">EDITAR USUARIO</h1>
</div>
<div class="cajaCentral"> 

    <form method="POST" action="{{ route('euser', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
                <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="nom">Email</label>
                <input type="string" class="form-control" id="email" name="email" aria-describedby="emailHelp" pattern="[_a-z0-9-]+(.[_a-z0-9-]+)*@([i][n][s][c][a][m][i][d][e][m][a][r]|[x][t][e][c])+[.]+[c][a][t]$"title="solo se aceptan correos inscamidemar o xtec"  placeholder="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="nom">Password</label>
                <input type="string" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="">
        </div>
        <div class="form-group">
            <label for="nom">Repetir password</label>
                <input type="string" class="form-control" id="aa" name="aa" aria-describedby="emailHelp" placeholder="">
        </div>
        <BR>
            <button type="button" class="btn btn-success " onclick="document.location='/admin/usuarios'"> ATRAS</button>
            <button type="submit" class="btn btn-primary">ENVIAR</button>
    </form>
<div>
@stop