@extends('app')
@section('title', 'Lista de Estudantes')

@section('content')
<h1>Lista De Estudantes</h1>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>CPF</td>
            <td>RA</td>
            <td>Data de Nascimento</td>
            <td>Sala</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($studants as $studant)
        <tr>

            <td>{{ $studant->id }}</td>
            <td>
                <a href="{{ route('studants.show', $studant) }}">
                    {{ $studant->nome }}
                </a>
            </td>
            <td>{{ $studant->cpf }}</td>
            <td>{{ $studant->ra }}</td>
            <td>{{ $studant->nascimento }}</td>
            <td>{{ $studant->classroom->nome ?? 'Não atribuída' }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('studants.edit', $studant) }}">Editar</a>

                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-studant-id="{{ $studant->id }}" data-studant-name="{{ $studant->nome }}">
                    Excluir
                </button>

                <form id="delete-form-{{ $studant->id }}" action="{{ route('studants.destroy', $studant) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir o Estudante <strong id="studant-name"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirm-delete-btn" data-studant-id="">Excluir</button>
            </div>
        </div>
    </div>
</div>

<a class="btn btn-success mt-3" href="{{ route('studants.create') }}">Novo Estudante</a>

@section('scripts')
<script>
    $('#confirmDeleteModal').on('show.bs.modal', function(event) {
        const {
            relatedTarget
        } = event;
        const {
            studantId,
            studantName
        } = $(relatedTarget).data();

        $(this).find('#studant-name').text(studantName);
        $(this).find('#confirm-delete-btn').data('studant-id', studantId);
    });

    $('#confirm-delete-btn').on('click', function() {
        const studantId = $(this).data('studant-id');
        $(`#delete-form-${studantId}`).submit();
    });
</script>
@endsection

@endsection
