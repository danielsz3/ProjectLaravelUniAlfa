@extends('app')
@section('title', 'Novo Cliente')
@section('content')

<h2>Novo Cliente</h2>

<form action="{{ route('clients.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label
            for="nome"
            class="form-label">
            Nome
        </label>

        <input
            type="text"
            class="form-control"
            id="nome"
            name="nome"
            placeholder="Digite seu Nome">
    </div>

    <div class="mb-3">
        <label
            for="endereco"
            class="form-label">
            Endereço
        </label>

        <input
            type="text"
            class="form-control"
            id="endereco"
            name="endereco"
            placeholder="Digite seu Endereço">
    </div>

    <div class="mb-3">
        <label
            for="observacao"
            class="form-label">
            Observação
        </label>

        <textarea
            type="text"
            class="form-control"
            rows="3"
            id="observacao"
            name="observacao"
            placeholder="Digite seu observacao">
        </textarea>
    </div>

    <button class="btn btn-success" type="submit">
        Enviar
    </button>

</form>

@endsection
