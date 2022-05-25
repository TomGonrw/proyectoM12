@extends('layouts.inserir')

@section('content')

<div class="cajaCentral"> 
    <form method="POST" action="{{ route('inserirCicle') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Codi</label>
            <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Escriu el nom">
        </div>

        <div class="form-group">
            <label for="email">Nom</label>
            <input type="text" class="form-control" id="observacions" name="observacions" aria-describedby="emailHelp" placeholder="Escriu la observació">
        </div>
        <button type="button" class="btn btn-success " onclick="document.location='ciclos'"> ATRAS</button>
        <button type="submit" class="btn btn-primary">ENVIAR</button>
    </form>
<div>
@stop