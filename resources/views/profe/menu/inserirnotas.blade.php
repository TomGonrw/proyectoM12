@extends('layouts.inserir')
@section('content')
<head>
<style>

  th{
    background-color: #1a374d;
    text-align: center;
    color: #f0f0f0;
  }
  body{
        background-color: #6ba090;
  }

  td{
    text-align: center;
          color: #f0f0f0;
  }


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<div class="row titolar">
  <h1 style="text-align: center;">NOTES ALUMNES</h1> 
</div>

<div class=" cajaCentral">
    <table class="table">
          <tr class="h4 titol">
            <th scope="col">NOM</th>
            <th colspan="{{$x*2}}" scope="col">UF</th>
            <th scope="col">COMENTARI MODUL</th>
            <th scope="col">ACCIONS</th>
          </tr>

          @foreach ($alumne as $alu)
          <tr class="text">
              <th>{{$alu->nom}} {{$alu->cognom}}</th>              
              <form action="{{route('insnotas', ['id'=>$alu->id,'id_modul'=>$id_modul,'id_cicle'=>$id_cicle])}}">

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
          <td class="align-middle">
            <div class="form-floating">
              <textarea class="form-control" placeholder="" name="comentaris" id="comentaris"></textarea>
            </div>
          </td>
          <td> 
            <a href="">
              <button type="submit" id="enviar" class="btn btn-outline-info " data-toggle="tooltip" data-placement="top" title="Veure notes Alumnes" style="width: 100%; height:auto"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
              </svg></button>
            </a>
        </td>
        </form>
          @endforeach
        </tr>
    </table>
    <button  style="margin-top: 10px;" type="button" onclick="document.location='/profe/menu'" class="btn btn-success">ATRAS</button>
  </div>
<script>
  $("#enviar").on( "click", function() {
    console.log("hola");
    alert("Registro enviado");
});

</script>
@stop