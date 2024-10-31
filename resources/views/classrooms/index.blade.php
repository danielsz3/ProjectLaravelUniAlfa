@extends('app')
@section('title', 'Lista de Salas')

@section('content')
<h1>Lista De Salas</h1>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($classrooms as $classroom)
        <tr>
            <td>{{ $classroom->id }}</td>
            <td>
                <a href="{{ route('classrooms.show', $classroom) }}">
                    {{ $classroom->nome }}
                </a>
            </td>
            <td>
                <a
                    class="btn btn-primary"
                    href="{{ route('classrooms.edit', $classroom) }}">
                    Editar
                </a>

                <button
                    class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal"
                    data-classroom-id="{{ $classroom->id }}"
                    data-classroom-name="{{ $classroom->nome }}">
                    Excluir
                </button>

                <form
                    id="delete-form-{{ $classroom->id }}"
                    action="{{ route('classrooms.destroy', $classroom) }}"
                    method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div
    class="modal fade"
    id="confirmDeleteModal"
    tabindex="-1"
    aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5
                    class="modal-title"
                    id="confirmDeleteModalLabel">
                    Confirmação de Exclusão
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir a Sala
                <strong id="classroom-name"></strong>?
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button
                    type="button"
                    class="btn btn-danger"
                    id="confirm-delete-btn"
                    data-classroom-id="">
                    Excluir
                </button>
            </div>
        </div>
    </div>
</div>

<a
    class="btn btn-success mt-3"
    href="{{ route('classrooms.create') }}">
    Nova Sala
</a>

@section('scripts')
<script>
    $('#confirmDeleteModal').on('show.bs.modal', function(event) {
        const {
            classroomId,
            classroomName
        } = $(event.relatedTarget).data();

        $(this).find('#classroom-name').text(classroomName);
        $(this).find('#confirm-delete-btn').data('classroom-id', classroomId);
    });

    $('#confirm-delete-btn').on('click', function() {
        const classroomId = $(this).data('classroom-id');
        $(`#delete-form-${classroomId}`).submit();
    });
</script>
@endsection

@endsection
