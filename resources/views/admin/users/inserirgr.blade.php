@extends('layouts.inserir')

@section('content')
<div class="row titolar">
    <h1 style="text-align: center;">INSERTAR MODUL</h1>
</div>
<div class="cajaCentral"> 
    <form method="POST" action="{{ route('inserirG') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="string" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Escriu el nom">
        </div>

        <div class="form-group">
            <label for="cilce">Cicles</label>
            <select id="cicle" name="cicle"  class="form-select">
                @foreach($cicles as $cicle)
                    @if(isset($cicle->id))
                        <option value="{{$cicle->id}}">{{$cicle->nom}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="users">Profes</label>
            <select id="users" name="users" class="form-select">
                @foreach($users as $user)
                    @if(isset($user->id))
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <br>
           
 
        <button type="button" class="btn btn-success " onclick="document.location='grupos'"> ATRAS</button>
        <button type="submit" class="btn btn-primary">ENVIAR</button>


  

       
      
    </form>
<div>
@stop