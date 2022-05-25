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
    <h1 style="margin-left: 470px;">ALUMNES</h1>
</div>

<div class="row cajaCentral">
        <h3>Alumne <span class="badge bg-secondary">{{$alumne->nom}}</span></h3>
    <table class="table table-striped table-hover">
        <thead class="bg-primary text-white">
            <th>UFS</th>
            <th>NOTAS</th>
        </thead>
        <tbody>
            @foreach ($alumne->ufs as $uf)
                <tr>
                    <td>{{$uf->nom}}</td>

                    <td>{{$uf->pivot->nota;}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
@stop