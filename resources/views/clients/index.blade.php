@extends('app')
@section('title', 'Lista de Clientes')

@section('content')
<h1>Lista De Clientes</h1>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Endereço</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>
                <a href="{{ route('clients.show', $client) }}">
                    {{ $client->nome }}
                </a>
            </td>
            <td>{{ $client->endereco }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('clients.edit', $client) }}">Editar</a>

                <!-- Botão para abrir o modal -->
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-client-id="{{ $client->id }}" data-client-name="{{ $client->nome }}">
                    Excluir
                </button>

                <!-- Formulário de exclusão (oculto) -->
                <form id="delete-form-{{ $client->id }}" action="{{ route('clients.destroy', $client) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal de confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir o cliente <strong id="client-name"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirm-delete-btn">Excluir</button>
            </div>
        </div>
    </div>
</div>

<a class="btn btn-success mt-3" href="{{ route('clients.create') }}">Novo Cliente</a>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let clientId;
        let clientName;

        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
        var confirmDeleteBtn = document.getElementById('confirm-delete-btn');
        var clientNameElement = document.getElementById('client-name');

        // Evento quando o modal é exibido
        confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Botão que disparou o modal
            clientId = button.getAttribute('data-client-id'); // Obtém o ID do cliente
            clientName = button.getAttribute('data-client-name'); // Obtém o nome do cliente

            // Atualiza o nome do cliente no modal
            clientNameElement.textContent = clientName;
        });

        // Ação de excluir quando o botão de confirmação é clicado
        confirmDeleteBtn.addEventListener('click', function() {
            var form = document.getElementById('delete-form-' + clientId);
            if (form) {
                form.submit(); // Envia o formulário de exclusão
            }
        });
    });
</script>
@endsection
