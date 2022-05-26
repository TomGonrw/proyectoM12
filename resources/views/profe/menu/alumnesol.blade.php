@extends('layouts.inserir')

@section('content')


<html>
<head>
<style>
    body{
        background-color:#6ba090;
    }
    .info {
       width: 60%; 
       border: none;
       
    }

    th {
        background-color: #406882;
    }
    
    .table td, .table th {
        border: 0 !important;
    }

    h4 {
        text-align: center
    }

    .titol {
        font-size: 20px;
    }
    .titole{
    }

</style>
<body>

<div class="row titolar titole">
    <h1 style="text-align: center;">{{$alumn->nom}} {{ $alumn->cognom }}</h1>
</div>


<div class=" cajaCentral">
    <div class="row">
    <div class="col d-flex justify-content-center text-center" >
        <table class="table info">
                <tr>
                    <th colspan="2" class="titol">DADES PERSONALS</th>
                </tr>
                <tr class="text">
                    <th> Nom </th>
                    <td>
                        {{$alumn->nom}}  {{$alumn->cognom}}
                    </td>
                </tr>
                <tr class="text">
                    <th> DNI </th>
                    <td>
                        {{$alumn->dni}}
                    </td>
                </tr>
                <tr class="text">
                    <th> Correu </th>
                    <td>
                        {{$alumn->correu}}
                    </td>
                </tr>
                <tr class="text">
                    <th> Direcció </th>
                    <td>
                        {{$alumn->direccio}}
                    </td>
                </tr>
        </table>
    </div>

    <div class="col" style="background-color: #406882;">
        <table class="table table-striped table-hover">
            <tr>
                <th colspan="3" class="titol">BUTLLETÍ</th>
            </tr>

            <?php
            ?>

            @foreach ($modul as $mod)
                <?php 
                    $i = 0;
                    $j = 0;
                    $horas = 0;
                    $notatotal = 0;
                    $notaprobi = 0;
                    $notauf = array();
                    $horauf = array();
                    
                ?>
                <tr >
                    <th colspan="3">{{$mod->nom}} {{$mod->nomllarg}}</th>
                </tr>
                @foreach ($alumne->ufs as $uf)
                <tr>
                    @if ($uf->moduls->nom == $mod->nom)
                        <?php
                            $i++;
                            $horas += $uf->horas;
                            $notauf[$i] = $uf->pivot->nota;
                            $horauf[$i] = $uf->horas;
                        ?>
                        <td>{{$uf->nom}}</td>
                        <td>{{$uf->horas}} horas</td>
                        <td>{{$uf->pivot->nota}}</td>
                </tr>
                    @endif
                @endforeach
                <?php 
                    foreach($notauf as $not) {
                        if ($not < 5) {
                           $notaprobi = null;
                        } else {
                            $j++;
                            $notaprobi += ($horauf[$j] / $horas) * $not;
                        }
                    }
                ?>
                <tr>
                    <th></td>
                    <th>{{$horas}} horas</td>
                    <th >
                        <?php
                            if ($notaprobi == 0) {
                            } else {
                                echo(round($notaprobi));
                            }
                        ?>
                    </td>
                </tr>
            @endforeach
        </table>

            <div class="text-right" style="margin: 10px; border-top: solid white 1px;">
                <a href="{{route('pdf', $alumn->id)}}" >
                    <button  style="margin-top: 10px;" type="button" class="btn btn-success"> GENERAR PDF</button>
                </a>
            </div>
    </div>
   
    </div>
    <button  style="margin-top: 10px;" type="button" onclick="document.location='{{route('mostrarAlumnes', $id_cicles)}}'" class="btn btn-success">ATRAS</button>
</div>
<br>

</body>
@stop

