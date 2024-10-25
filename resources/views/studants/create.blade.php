@extends('app')
@section('title', 'Novo Estudante')
@section('content')

<h2>Novo Estudante</h2>

<!-- Exibir mensagens de erro de validação -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


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
            placeholder="Digite seu Nome"
            value="{{ old('nome') }}"
            required>

    </div>
    <div class="mb-3">

        <label
            for="cpf"
            class="form-label">
            CPF
        </label>

        <input
            type="text"
            class="form-control cpf-mask"
            id="cpf"
            name="cpf"
            placeholder="Digite seu CPF"
            value="{{ old('cpf') }}"
            required>


    </div>
    <div class="mb-3">

        <label
            for="ra"
            class="form-label">
            RA
        </label>

        <input
            type="number"
            class="form-control"
            id="ra"
            name="ra"
            placeholder="Digite seu RA"
            value="{{ old('ra') }}"
            required>

    </div>
    <div class="mb-3">

        <label
            for="nascimento"
            class="form-label">
            Data de Nascimento
        </label>

        <input
            type="date"
            class="form-control"
            id="nascimento"
            name="nascimento"
            value="{{ old('nascimento') }}"
            required>

    </div>
    <div class="mb-3">

        <label
            for="sala_id"
            class="form-label">Sala</label>

        <select
            class="form-control"
            id="sala_id"
            name="sala_id"
            required>

            <option
                value="">
                Selecione uma sala
            </option>

            @foreach($salas as $sala)

            <option value="{{ $sala->id }}" {{ old('sala_id') == $sala->id ? 'selected' : '' }}>{{ $sala->nome }}</option>

            @endforeach
        </select>

    </div>

    <a class="btn btn-success" href="{{ route('studants.index') }}"> Voltar </a>

    <button class="btn btn-success" type="submit">Enviar</button>
</form>

@endsection
