@extends('app')
@section('title', 'Editar Sala')
@section('content')

<h2>Editar Sala</h2>

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

<form action="{{ route('classrooms.update', $classroom) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label
            for="nome"
            class="form-label">
            Nome
        </label>

        <input
            value="{{ $classroom->nome }}"
            type="text"
            class="form-control"
            id="nome"
            name="nome"
            placeholder="Digite a Sala">

    </div>

    <a class="btn btn-success" href="{{ route('studants.index') }}"> Voltar </a>

    <button class="btn btn-success" type="submit">Enviar</button>

</form>

@endsection
