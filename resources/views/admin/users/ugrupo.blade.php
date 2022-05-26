@extends('layouts.inserir')

@section('content')
<div class="row titolar">
    <h1 style="text-align: center;">EDITAR MODUL</h1>
</div>

<div class="cajaCentral"> 

    <form method="POST" action="{{ route('updategrupo', $modul->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
                <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="{{$modul->nom}}">
        </div>
        <div class="form-group">
            <label for="Cicle">Cicle</label>
            <select name="Cicle" id="Cicle" class="form-select">
                @foreach($cicles as $cicle)
                    @if(isset($cicle->id) && isset($modul->cicle->id))
                        @if($cicle->id == $modul->cicle->id)
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

        <div class="form-group">
            <label for="Usuaris">Profes</label>
            <select name="Usuari" id="Usuari" class="form-select">
                @foreach($users as $user)
                    @if(isset($user->id) && isset($modul->users->id))
                        @if($user->id == $modul->users->id)
                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                        @else
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @else
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
<br>
      
            <button type="button" class="btn btn-success " onclick="document.location='/admin/grupos'"> ATRAS</button>
            <button type="submit" class="btn btn-primary">ENVIAR</button>
    </form>
<div>
@stop