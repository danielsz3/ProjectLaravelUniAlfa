@extends('app')
@section('title', 'Detalhes da Sala')
@section('content')

<div class="card">
    <div class="card-header">
        Detalhes do Sala {{ $classrooms->nome }}
    </div>

    <div class="card-body">

        <p><strong>ID:</strong> {{ $classrooms->id }}</p>
        <p><strong>Nome:</strong> {{ $classrooms->nome }}</p>

        <br>
        <a
            class="btn btn-success"
            href="{{ route('classrooms.index') }}">
            Voltar
        </a>
    </div>
</div>

@endsection
