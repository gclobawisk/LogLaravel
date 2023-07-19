<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <div class="container mt-5">
        @if (Auth::check()) 
            {{"Logado como: ".Auth::user()->email}}
            {{"ID: ".Auth::user()->id}}
        @endif

        <div class="d-flex justify-content-end mb-3" data-bs-toggle="modal" data-bs-target="#ModalInsert">
            <button class="btn btn-primary">Adicionar</button>
        </div>
     
        <table class="table table-striped">
        <thead class="bg bg-dark text-white">
            <tr>
                <th scope="col" class="col-1">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col" class="col-1">Editar</th>
                <th scope="col" class="col-1">Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->nome}}</td>
                <td>{{$product->descricao}}</td>
                <td>{{$product->preco}}</td> 
                <td>
                    <i class="fa-solid fa-pen-to-square text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                </td> 
                <td>
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Tem certeza de que deseja excluir este produto?')">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
        </table>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        
    </div>


    <!-- Modal Insert -->
    <div class="modal fade" id="ModalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="ModalInsertLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('products.insert', $product->id) }}">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nome</span>
                        <input type="text" class="form-control" value="Adicionando Produto" name="nome" id="" aria-label="nome" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Descricao</span>
                        <input type="text" class="form-control" value="Adicionando Descrição do Produto" name="descricao" id="" aria-label="descricao" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Valor</span>
                        <input type="number" class="form-control" value="4.9" name="preco" id="" aria-label="preco" aria-describedby="basic-addon1">
                    </div>

      
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

                </form>
        </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('products.update', $product->id) }}">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                        <input type="text" class="form-control" value="{{$product->id}}" name="id" id="" aria-label="id" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nome</span>
                        <input type="text" class="form-control" value="{{$product->nome}}" name="nome" id="" aria-label="nome" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Descricao</span>
                        <input type="text" class="form-control" value="{{$product->descricao}}" name="descricao" id="" aria-label="descricao" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Descricao</span>
                        <input type="number" class="form-control" value="{{$product->preco}}" name="preco" id="" aria-label="preco" aria-describedby="basic-addon1">
                    </div>

      
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

                </form>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    {{-- <script>
        alert("Para Teste: Apenas o último produto está sendo editado")
    </script> --}}
</body>
</html>