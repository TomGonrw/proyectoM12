@extends('layouts.inserir')

@section('content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<div class="row titolar">
    <h1 style="text-align: center;">EDITAR UF</h1>
</div>
<div class="cajaCentral"> 

    <form method="POST" action="{{ route('updateuf', $uf->id) }}" id="form">
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
            <select name="modul" id="modul" class="form-select">
                @foreach($moduls as $modul)
                    @if(isset($modul->id) && isset($uf->moduls->id))
                        @if($modul->id == $uf->moduls->id)
                            <option value="{{$modul->id}}" selected>{{$modul->nom}}</option>
                        @else
                            <option value="{{$modul->id}}">{{$modul->nom}}</option>
                        @endif
                    @else
                        <option value="{{$modul->id}}">{{$modul->nom}}</option>
                    @endif

                @endforeach
            </select>
        </div>
        <br>
        <button type="button" class="btn btn-success " onclick="document.location='/admin/ufs'"> ATRAS</button>
            <button type="submit" class="btn btn-primary">ENVIAR</button>
    </form>
<div>
@stop