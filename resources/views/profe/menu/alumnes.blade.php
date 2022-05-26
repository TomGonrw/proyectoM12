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
      <h1 style="text-align: center;">ALUMNES</h1>
</div>
<div class="cajaCentral">
    <?php
        $name = auth()->user()->name;
    ?>
    <h4>Professor <?php print_r($name) ?></h4>

    <table class="table">
        <tr class="h4 titol">
            <th>NOM</th>
            <th>COGNOM</th>
            <th>ACCIONS</th>
        </tr>
        @foreach($idalumn as $alum)
            <tr class="text">
                <td>
                    {{$alum->nom}}
                </td>
                <td>
                    {{$alum->cognom}}
                </td>
                <td>

                    <a href="{{route('alumneSol', ['id'=>$alum->id,'id_cicle'=>$id_cicle])}}">
                        <button type="button" class="btn btn-outline-warning " data-toggle="tooltip" data-placement="top" title="Info alumne">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </svg>
                        </button>
                    </a>
                </td>

            </tr>
        @endforeach
    </table>
    <button  style="margin-top: 10px;" type="button" onclick="document.location='/profe/menu'" class="btn btn-success">ATRAS</button>
</div>
<br>

</body>
@stop