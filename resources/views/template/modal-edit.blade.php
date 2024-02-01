<div class="modal fade" id="modalEditLead-{{ $id }}" tabindex="-1" aria-labelledby="modalAddLead"
    aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Lead</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-lead-{{ $id }}">
                    <div id="alerts-update">

                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" name="name" value="{{ $name }}">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="{{ $email }}">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Telefone:</label>
                        <input type="text" class="form-control" name="phone" value="{{ $phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Status:</label>
                        <select class="form-select" name="status" id="">
                            @if ($status == 'pending')
                                <option value="pending" selected>Pendente</option>
                                <option value="failed">Falhou</option>
                                <option value="success">Sucesso</option>
                            @endif
                            @if ($status == 'failed')
                                <option value="pending">Pendente</option>
                                <option value="failed" selected>Falhou</option>
                                <option value="success">Sucesso</option>
                            @endif
                            @if ($status == 'success')
                                <option value="pending">Pendente</option>
                                <option value="failed">Falhou</option>
                                <option value="success" selected>Sucesso</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Resumo:</label>
                        <textarea class="form-control" name="message">{{ $message }}</textarea>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="lead_id" value="{{ $id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-warning edit-lead" value="{{ $id }}">Atualizar</button>

            </div>
        </div>
    </div>
</div>
