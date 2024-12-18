<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UniAlfa</a>
        </div>
    </nav>

    <div class="container">
        <h1>Lista De Produtos</h1>


        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Descrição</td>
                    <td>Marca</td>
                    <td>Valor</td>
                    <td>Ações</td>
                </tr>

            </thead>
            <tbody>
                @foreach ($products as $product )
                <tr>

                    <td>{{ $product->id }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->descricao }}
                        </a>
                    </td>

                    <td>{{ $product->marca }}</td>

                    <td>R$ {{ $product->valor }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
