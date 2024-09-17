<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Destalhes do Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UniAlfa</a>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Detalhes do Produto {{ $product->descricao }}
            </div>

            <div class="card-body">
                <p><strong>
                        ID:
                    </strong>{{ $product->id }}</p>
                <p><strong>
                        Descrição:
                    </strong>{{ $product->descricao }}</p>
                <p><strong>
                        Marca:
                    </strong>{{ $product->marca }}</p>
                <p><strong>
                        Observação:
                    </strong>{{ $product->observacao }}</p>
                <br>
                <a class="btn btn-success" href="{{ route('products.index') }} ">
                    Voltar
                </a>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
