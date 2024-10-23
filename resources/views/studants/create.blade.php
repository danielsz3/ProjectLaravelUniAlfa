@extends('app')
@section('title', 'Novo Estudante')
@section('content')

<h2>Novo Estudante</h2>

<form action="{{ route('studants.store') }}" method="POST">
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
            for="cpf"
            class="form-label">
            Endereço
        </label>

        <input
            type="text"
            class="form-control"
            id="cpf"
            name="cpf"
            placeholder="Digite seu Endereço">
    </div>

    <div class="mb-3">
        <label
            for="ra"
            class="form-label">
            RA
        </label>

        <input
            type="text"
            class="form-control"
            id="ra"
            name="ra"
            placeholder="Digite seu RA">
    </div>

    <div class="mb-3"></div>
    <label
        for="nascimento"
        class="form-label">
        Data de Nascimento
    </label>

    <input
        type="date"
        class="form-control"
        id="nascimento"
        name="nascimento">

    <button class="btn btn-success" type="submit">
        Enviar
    </button>

</form>

@endsection
