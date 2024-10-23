@extends('app')
@section('title', 'Novo Estudante')
@section('content')

<h2>Editar Estudante</h2>

<form action="{{ route('studants.update', $studant) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label
            for="nome"
            class="form-label">
            Nome
        </label>

        <input
            value="{{ $studant->nome }}"
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
            CPF
        </label>

        <input
            value="{{ $studant->cpf }}"
            type="text"
            class="form-control"
            id="cpf"
            name="cpf"
            placeholder="Digite seu CPF">
    </div>

    <div class="mb-3">
        <label
            for="ra"
            class="form-label">
            Observação
        </label>

        <input
            value="{{ $studant->ra }}"
            type="text"
            class="form-control"
            rows="3"
            id="ra"
            name="ra"
            placeholder="Digite seu ra">
        </input>
    </div>

    <div class="mb-3"></div>
    <label
        for="nascimento"
        class="form-label">
        Data de Nascimento
    </label>

    <input
        value="{{ $studant->nascimento }}"
        type="text"
        class="form-control"
        id="nascimento"
        name="nascimento"
        placeholder="Digite sua data de nascimento">
    </input>

    <button class="btn btn-success" type="submit">
        Enviar
    </button>

</form>

@endsection
