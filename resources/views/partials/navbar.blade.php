<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <style>
      .container{
        margin: auto;
        margin-top: 5%;
        width: 70%;
      }

      .img3{
        width: 450px;
        height: 200px;
        margin:10px auto;
        display:block;
      }


      .cajaCentral {
        background-color: #1a374d;
        align-content: center;
        padding: 30px;
        color: #f0f0f0;
      }
      
      .text{
          text-align: center;
          color: #f0f0f0;
      }

      .titol{
          text-align: center;
          color: #f0f0f0;
      }

      td {
        background-color: #4b7c9c !important;
      }

      label {
        text-align: center;
          color: #f0f0f0;
      }

      .titolar {
        background-color: #1a374d;
        padding: 5px;
        color: #f0f0f0;
        margin-bottom: 5px;
        width: 100%;
        margin-left: 0.5px;
      }
      .linea {
          background-color: #45806e;
          padding: 20px;
      }
      .botonatras{
        width: 10%;
      }
    </style>

 
<div class="row">
  <div class="col ml-auto">
        <div class="row linea">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <div style="float: right">
                    <button class="btn btn-danger" type="submit">Logout</button>
                </div>
            </form>
        </div>
  </div>
  <div class="col-12">
    <img class="img3" src="http://drive.google.com/uc?export=view&id=1HI1MSYldnQ3HyVUjsYX4W_KI9DLRs4bP">
</div>

</body>
</html>