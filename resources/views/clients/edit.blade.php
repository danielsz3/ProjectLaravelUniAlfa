@extends('app')
@section('title', 'Novo Cliente')
@section('content')

<h2>Editar Cliente</h2>

<form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
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

    <div class="mb-3">

        <label
            for="avatar"
            class="form-label">
            Avatar
        </label>

        <input
            type="file"
            class="form-control"
            id="avatar"
            nome="avatar"
            accept="image/*">
    </div>

    @if ($client->avatar)
    <div class="mb-3">
        <img
            src="{{ asset('storage/' . $client->avatar) }}"
            alt="Avatar do cliente"
            class="img-thumbnail" width="150">
    </div>

    <button class="btn btn-success" type="submit">
        Enviar
    </button>

</form>

@endsection
