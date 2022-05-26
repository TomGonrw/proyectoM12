@extends('layouts.inserir')

@section('content')

<div class="row titolar">
    <h1 style="text-align: center;">MODULS</h1>
</div>
<div class="cajaCentral"> 
    <table class="table">
        <tr class="h4 titol">
            <th>NOM DEL CICLE</th>
            <th>NOM USUARI</th>
            <th>NOM DEL MODUL</th>
            <th>ACCIONS</th>
        </tr>

        @foreach($grupos as $grupo)
            <tr class="text">
    
                <td >
                    @if(isset($grupo->cicle->nom))
                        {{$grupo->cicle->nom}}
                    @else
                        No hay ciclo asignado
                    @endif
                </td>
                
                <td>
                    @if(isset($grupo->users->name))
                        {{$grupo->users->name}}
                    
                    @else
                        No profe asignado

                    @endif
                </td>
                <td>
                    {{$grupo->nom}}
                </td>
                <td>
                    <a href="{{route('borrargrupo',$grupo->id)}}">
                    <button type="button" class="btn btn-outline-danger ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16" value="{{$grupo->id}}">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </button>
                    </a>
                    <a href="{{route('ugrupo',$grupo->id)}}">
                    <button type="button" class="btn btn-outline-warning ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16" value="{{$grupo->id}}">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-right">
        <button type="button" class="btn btn-success " onclick="document.location='users'"> ATRAS</button>
        <button type="button" class="btn btn-success " onclick="document.location='inserirg'"> AFEGIR NOU MODUL</button>
    </div>
</div>

@stop