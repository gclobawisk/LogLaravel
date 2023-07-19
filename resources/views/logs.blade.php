<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <div class="m-2 m-2 mt-5">
        @if (Auth::check()) 
            {{"Logado como: ".Auth::user()->email}}
            {{"ID: ".Auth::user()->id}}
        @endif

     
        <table class="table table-striped">
        <thead class="bg bg-dark text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuário</th>
                <th scope="col">Área</th>
                <th scope="col">Descrição</th>
                <th scope="col">Operação</th>
                <th scope="col">Vin</th>
                <th scope="col">IP</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr>
                <td scope="row">{{$log->id}}</th>
                <th scope="row">{{$log->user->email}}</th>
                <td>{{$log->log_are}}</th>
                <td>{{$log->log_des}}</td>
                <th scope="row">{{$log->log_op}}</td>
                <th scope="row">{{$log->log_vin}}</td>
                <td>{{$log->log_ip}}</td>
                <td>{{$log->log_dat}}</td> 
                <td>{{$log->log_hor}}</td> 
            </tr>
            @endforeach
        </tbody>
        </table>
        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>