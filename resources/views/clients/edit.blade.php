@extends('app')
@section('title', 'Novo Cliente')
@section('content')

<h2>Editar Cliente</h2>

<form action="{{ route('clients.update', $client) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label
            for="nome"
            class="form-label">
            Nome
        </label>

        <input
            value="{{ $client->nome }}"
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
            value="{{ $client->endereco }}"
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
        {{ $client->observacao }}
        </textarea>
    </div>

    <button class="btn btn-success" type="submit">
        Enviar
    </button>

</form>

@endsection
