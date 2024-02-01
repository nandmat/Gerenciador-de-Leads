<div class="modal fade" id="modalAddLead" tabindex="-1" aria-labelledby="modalAddLead" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Lead</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-add-lead">
                    <div id="alerts">

                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Telefone:</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Resumo:</label>
                        <textarea class="form-control" name="message"></textarea>
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" id="add-lead" class="btn btn-success">Registrar</button>
            </div>
        </div>
    </div>
</div>
