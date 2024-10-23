@extends('app')
@section('title', 'Detalhes do Estudante')
@section('content')

<div class="card">
    <div class="card-header">
        Detalhes do Estudante {{ $studant->nome }}
    </div>

    <div class="card-body">
        <p><strong>
                ID:
            </strong>{{ $studant->id }}</p>
        <p><strong>
                Nome:
            </strong>{{ $studant->nome }}</p>
        <p><strong>
                CPF:
            </strong>{{ $studant->cpf }}</p>
        <p><strong>
                RA:
            </strong>{{ $studant->ra }}</p>
        <p><strong>
                Data de Nascimento:
            </strong>{{ $studant->nascimento }}</p>
        <p><strong>
                Sala:
            </strong>{{ $studant->sala_id }}</p>
        <br>
        <a class="btn btn-success" href="{{ route('studants.index') }} ">
            Voltar
        </a>
    </div>
</div>
</div>

@endsection
