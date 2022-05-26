@extends('layouts.inserir')
@section('content')
<head>
<style>

  th{
      background-color: #1a374d;
      text-align: center;
      color: #f0f0f0;
    }

  td{
      text-align: center;
      color: #f0f0f0;
    } 


</style>
</head>
<div class="row titolar">
  <h1 style="text-align: center;">{{$cicle->nom}}</h1> 
</div>
<div class="cajaCentral">

  @foreach ($modul as $mod)


  <h1>MODUL {{$mod->nom}}</h1>
    
    <table class="table" >

        <tr>
            <th>UNITATS FORMATIVES</th>
            @foreach($mod->ufs as $uf)
            <th colspan="2">{{$uf->nom}}</th>
            @endforeach
            <th rowspan="2">% de Modul <br>superat</th>
        </tr>
        
        <tr>
            <th>Cognoms, Nom</th>
            @foreach($mod->ufs as $uf)
                <th>Horas</th>
                <th>Nota</th>
            @endforeach
        </tr>

        <?php 
            $porcentageTotal = 0; 
            $aluTotal = 0;
            $ufsModul = count($mod->ufs)*2;
            $suspes = false;
        ?>

        @foreach($alumnes as $alumn)

        <?php 
            $calcul = 0;
            $numUfs = 0;
            $ufsApro = 0;
            $aluTotal++;
            $ufsAlu = 0;
        ?>
        <tr>
            <th>{{$alumn->cognom}}, {{$alumn->nom}}</th>
            
            @foreach($alumn->ufs->where('id_moduls', $mod->id) as $uf1)

                <?php $numUfs++; ?>

                <td><?php $ufsAlu++?>{{$uf1->horas}}</td>
                
                    <?php 
                        if ($uf1->pivot->nota >= 5) {
                            $ufsApro++;
                            $suspes = true;
                        }
                    ?> 

                <td><?php $ufsAlu++?>{{$uf1->pivot->nota}}</td>

            @endforeach
            

                <?php
                if($ufsAlu<$ufsModul) {
                    $num = $ufsModul-$ufsAlu;
                    while($num>0) {
                        echo '<td></td>';
                        $num--;
                    }
                }
                
                if ($ufsApro == 0) {
                    $total = 0;
                } else {
                    $total = ($ufsApro/$numUfs)*100;
                    $porcentageTotal += $total;
                }
                ?>

            <td>{{$total}}%</td>
            
        @endforeach
        </tr>
        <tr>
            <?php
                $i = $ufsModul;
                while($i>0) {
                    echo '<th></th>';
                    $i--;
                }    
                $porcMedia = $porcentageTotal/$aluTotal;
            ?>
            <th>Mitja del Grup</th>
            <td>{{$porcMedia}}%</td>
        </tr>
    </table>
    @endforeach
    <button  style="margin-top: 10px;" type="button" onclick="document.location='/profe/menu'" class="btn btn-success">ATRAS</button>

</div>
<br>


@stop