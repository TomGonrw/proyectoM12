@extends('layouts.inserir')

@section('content')


<html>
<head>
<style>
    body{
        background-color:#6ba090;
    }
    h1 {
        
    }
    
</style>
<body>

<div class="row titolar">
    <h1 style="margin-left: 470px;">MODULS</h1>
</div>

<div class="row cajaCentral">
    <?php
        $user = auth()->user();
        $name = auth()->user()->name;
    ?>
    <h4>Professor <?php print_r($name) ?></h4>

    <table class="table">
        <tr class="h4 titol">
            <th>NOM</th>
            <th>CICLES</th>
            <th>ACCIONS</th>
        </tr>

        @foreach($user->moduls->where('id_cicles', 1) as $mod)
            <tr class="text">
                <td>
                    {{$mod->nom}}
                </td>
                <td>
                    {{$mod->cicle->nom}}
                </td>
                <td>

                    <button type="button" class="btn btn-outline-info " data-toggle="tooltip" data-placement="top" title="Veure Notes Modul">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>
                    </button>
                    
                    <a href="https://www.google.com">
                        <button type="button" class="btn btn-outline-warning " data-toggle="tooltip" data-placement="top" title="Avaluar Alumnes">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

</div>

</body>
@stop