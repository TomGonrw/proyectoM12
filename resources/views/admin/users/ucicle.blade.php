@extends('layouts.inserir')

@section('content')
<div class="row titolar">
    <h1 style="text-align: center;">EDITAR CICLO</h1>
</div>
<div class="cajaCentral"> 
    <form method="POST" action="{{ route('editarcicle', $cicle->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Codi</label>
            <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="{{$cicle->nom}}">
        </div>

        <div class="form-group">
            <label for="email">Nom</label>
            <input type="text" class="form-control" id="observacions" name="observacions" aria-describedby="emailHelp" placeholder="{{$cicle->observacions}}">
        </div>
        <BR>
        <button type="button" class="btn btn-success " onclick="document.location='/admin/ciclos'"> ATRAS</button>
        <button type="submit" class="btn btn-primary">ENVIAR</button>
    </form>
<div>
@stop