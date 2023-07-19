<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    

</head>
<body>
    @if (Auth::check()) 

    <div class="d-flex justify-content-end m-3">
        {{"Logado como: ".Auth::user()->email}}
        {{"ID: ".Auth::user()->id}}
        <p> <a href="">Deslogar</a></p>
    </div>
    
    <div class="d-flex justify-content-center m-3">
    
        <h2 class="p-5"><a href="/produtos">Produtos</a></h2>
        <h2 class="p-5"><a href="/log">Log</a></h2>
        
    </div>

    @else
    <div class="d-flex justify-content-center m-3">
        <h2 class="p-5"><a href="/login">Login</a></h2>
        <h2 class="p-5"><a href="/produtos">Produtos</a></h2>
        <h2 class="p-5"><a href="/log">Log</a></h2>
    </div>
    @endif
    
</body>
</html>