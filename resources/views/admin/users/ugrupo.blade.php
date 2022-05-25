@extends('layouts.inserir')

@section('content')

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
            <select name="Cicle" id="Cicle">
                @foreach($cicles as $cicle)
                    @if($cicle->id == $modul->cicle->id)
                        <option value="{{$cicle->id}}" selected>{{$cicle->nom}}</option>
                    @else
                        <option value="{{$cicle->id}}">{{$cicle->nom}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Usuaris">Profes</label>
            <select name="Usuari" id="Usuari">
                @foreach($users as $user)
                    @if($user->id == $modul->users->id)
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

      
    
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<div>
@stop