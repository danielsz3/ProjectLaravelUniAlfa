@extends('app')
@section('title', 'Editar Estudante')
@section('content')

<h2>Editar Estudante</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('studants.update', $studant) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input value="{{ $studant->nome }}" type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu Nome">
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label cpf-mask">CPF</label>

        <input
            type="text"
            class="form-control cpf-mask"
            id="cpf"
            name="cpf"
            placeholder="Digite seu CPF"
            value="{{ $studant->cpf }}"
            required>

    </div>

    <div class="mb-3">
        <label for="ra" class="form-label">RA</label>
        <input value="{{ $studant->ra }}" type="text" class="form-control" id="ra" name="ra" placeholder="Digite seu RA">
    </div>

    <div class="mb-3">
        <label for="nascimento" class="form-label">Data de Nascimento</label>
        <input
            value="{{ $studant->nascimento }}"
            type="text" class="form-control"
            id="nascimento"
            name="nascimento"
            placeholder="Digite sua data de nascimento">
    </div>

    <div class="mb-3">
        <label for="sala_id" class="form-label">Sala</label>
        <select class="form-control" id="sala_id" name="sala_id">
            <option value="">Selecione uma sala</option>
            @foreach($salas as $sala)
            <option value="{{ $sala->id }}" {{ $studant->sala_id == $sala->id ? 'selected' : '' }}>
                {{ $sala->nome }}
            </option>
            @endforeach
        </select>
    </div>

    <a class="btn btn-success" href="{{ route('studants.index') }}"> Voltar </a>

    <button class="btn btn-success" type="submit">Enviar</button>

</form>

@endsection
