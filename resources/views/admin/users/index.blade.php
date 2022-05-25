@extends('layouts.inserir')

@section('content')


<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body{
        background-color:#6ba090;
    }
    .img2{
        width: 200px;
        height: 200px;
        margin:10px auto;
        display:block;
    }

</style>
<body>  
    <div class="row cajaCentral">

        <div class="col caja">
            <img class="img2"src="http://drive.google.com/uc?export=view&id=106xgvUO-6hurrvRSurFJy2xrQiFoddYS" alt="titulo enlace" border="0" onclick="document.location='ciclos'" /> 
            <h4 class="text">CICLES</h4>
        </div>
        <div class="col">
            <img class="img2"src="http://drive.google.com/uc?export=view&id=1eaopCDkNsnzDuAXd8f1m7Jd9IWXqS25E" alt="titulo enlace" border="0" onclick="document.location='grupos'" /> 
            <h4 class="text">MÓDULS</h4>
        </div>
        <div class="col">
            <img class="img2"src="http://drive.google.com/uc?export=view&id=1yW9tBaGGuFpUhHLlnch5qRq2TlaYpFfo" alt="titulo enlace" border="0" onclick="document.location='ufs'" /> 
            <h4 class="text">UNITATS FORMATIVES</h4>
        </div>
        <div class="col">
            <img class="img2"src="http://drive.google.com/uc?export=view&id=1xqIpq7GokzxF54UHRESVe8pvICtvAOUA" alt="titulo enlace" border="0" onclick="document.location='usuarios'" /> 
            <h4 class="text">USUARIS</h4>
        </div>
        <div class="col">
            <img class="img2"src="http://drive.google.com/uc?export=view&id=1l53-PXSdnG9_mi1waVMMwFg85WSDDUZ3" alt="titulo enlace" border="0" onclick="document.location='alumnes'" /> 
            <h4 class="text">ALUMNES</h4>
        </div>
    </div>

</body>
@stop