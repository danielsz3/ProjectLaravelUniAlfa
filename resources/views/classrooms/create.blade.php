@extends('app')
@section('title', 'Nova Sala')
@section('content')

<h2>Nova Sala</h2>

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


<form action="{{ route('clasrooms.store') }}" method="POST">
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

    </div>

    <a class="btn btn-success" href="{{ route('studants.index') }}"> Voltar </a>

    <button class="btn btn-success" type="submit">Enviar</button>
</form>

@endsection
