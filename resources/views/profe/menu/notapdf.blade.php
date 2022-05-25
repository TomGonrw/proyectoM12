@extends('layouts.butlleti')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTAS</title>
    <style>
        td {
        background-color: white !important;
      }

      th {
        color: black !important;
      }

    </style>
</head>
<body>
    <div class="col" >

        <table class="table table-striped table-hover">
            <tr>
                <th colspan="2" class="titol">Dades Personals</th>
            </tr>
            <tr>
                <th> Nom </th>
                <td>
                    {{$alumn->nom}}  {{$alumn->cognom}}
                </td>
            </tr>
            <tr>
                <th> DNI </th>
                <td>
                    {{$alumn->dni}}
                </td>
            </tr>
            <tr>
                <th> Correu </th>
                <td>
                    {{$alumn->correu}}
                </td>
            </tr>
        </table>
        
        <table class="table table-striped table-hover">
            <tr>
                <th colspan="3" class="titol">Qualificacions</th>
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
                            break;
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
</body>
</html>
@stop