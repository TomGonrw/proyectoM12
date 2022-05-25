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
  <h1 style="margin-left: 470px;">NOTES ALUMNES</h1> 
  <p style="padding-left:50px">M8</p>
</div>

<div class="row cajaCentral">
    <table class="table">
          <tr class="h4 titol">
            <th scope="col">NOM</th>
            <th colspan="{{$x*2}}" scope="col">UF</th>
            <th scope="col">MITJANA</th>
            <th scope="col">OBSERVACIONS</th>
            <th scope="col">ACCIONS</th>
          </tr>

          @foreach ($alumne as $alu)
          <tr class="text">
              <td>{{$alu->nom}} {{$alu->cognom}}</td>              
              <form action="{{route('insnotas',$alu->id)}}">

          @foreach ($uf as $cu)
                    <td >{{$cu->nom}}</td>
                    <td><select style="background-color: #3a6a92; border: 1px solid;" class="form-select" name="notes[{{$cu->id}}]" id="notes">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>  
                    </select></td> 
                    
          @endforeach
          <td>
            <?php
            $a = 0;
            if (isset($request)) {
              foreach ($request->notes as $uf => $nota){
            }
            echo $a += $nota;            
          }else {
            echo "No hi han notas";
          }


            ?>
          </td>
          <td class="align-middle">
            <div class="form-floating">
              <textarea class="form-control" placeholder="" name="comentaris" id="comentaris"></textarea>
            </div>
          </td>
          <td> 
            <a href="">
              <button type="submit" class="btn btn-outline-info " data-toggle="tooltip" data-placement="top" title="Veure notes Alumnes" style="width: 100%; height:auto"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
              </svg></button>
            </a>
        </td>
        </form>

          @endforeach

        </tr>


    
    </table>
    
</div>
@stop