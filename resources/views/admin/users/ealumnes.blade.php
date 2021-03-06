@extends('layouts.inserir')

@section('content')
<div class="row titolar">
    <h1 style="text-align: center;">EDITAR ALUMNE</h1>
</div>
<div class="cajaCentral"> 

    <form method="POST" action="{{ route('upalumne', $alumne->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
                <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="{{$alumne->nom}}">
        </div>
        <div class="form-group">
            <label for="cognom">Cognom</label>
                <input type="string" class="form-control" id="cognom" name="cognom" aria-describedby="emailHelp" placeholder="{{$alumne->cognom}}">
        </div>
        <div class="form-group">
            <label for="dni">Dni</label>
                <input type="string" class="form-control" id="dni" name="dni" aria-describedby="emailHelp" pattern="^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$" placeholder="{{$alumne->dni}}">
        </div>
        <div class="form-group">
            <label for="correu">Correu</label>
                <input type="string" class="form-control" id="correu" name="correu" aria-describedby="emailHelp" pattern="[_a-z0-9-]+(.[_a-z0-9-]+)*@([i][n][s][c][a][m][i][d][e][m][a][r]|[x][t][e][c])+[.]+[c][a][t]$"title="solo se aceptan correos inscamidemar o xtec"  placeholder="{{$alumne->correu}}">
        </div>
        <div class="form-group">
            <label for="direccio">Dirrecio</label>
                <input type="string" class="form-control" id="direccio" name="direccio" aria-describedby="emailHelp" placeholder="{{$alumne->direccio}}">
        </div>
        <div class="form-group">
            <label for="cicle">Cicle</label>   
                <select name="cicle" id="cicle" class="form-select">
                    @foreach($cicles as $cicle)
                        @if(isset($cicle->id) && isset($alumne->cicles->id))
                            @if($cicle->id == $alumne->cicles->id)
                                <option value="{{$cicle->id}}" selected>{{$cicle->nom}}</option>
                            @else
                                <option value="{{$cicle->id}}">{{$cicle->nom}}</option>
                            @endif
                        @else
                            <option value="{{$cicle->id}}">{{$cicle->nom}}</option>
                        @endif
                    @endforeach
                </select>
        </div>
        <BR>
            <button type="button" class="btn btn-success " onclick="document.location='/admin/alumnes'"> ATRAS</button>
            <button type="submit" class="btn btn-primary">ENVIAR</button>
    </form>
<div>
@stop