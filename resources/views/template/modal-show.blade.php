<div class="modal fade" id="showLead-{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Verificar Lead</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="card">
                    <div class="mb-2">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <b>Nome: </b>{{ $name }}
                            </li>
                            <li class="list-group-item">
                                <b>Email: </b>{{ $email }}
                            </li>
                            <li class="list-group-item">
                                <b>Telefone: </b>{{ $phone }}
                            </li>
                            <li class="list-group-item">
                                <b>Data de Cadastro: </b>{{ $created_at->format('d/m/Y H:m:i') }}
                            </li>
                            <li class="list-group-item">
                                <b>Último Contato: </b>{{ $last_contact }}
                            </li>
                            <li class="list-group-item">
                                <b>Status: </b>
                                @if ($status == 'pending')
                                    <span class="badge text-bg-warning">Pendente</span>
                                @elseif ($status == 'failed')
                                    <span class="badge text-bg-danger">Falhou</span>
                                @elseif ($status == 'success')
                                    <span class="badge text-bg-success">Sucesso</span>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <p class="form-control px-3 py-3">
                                    {{ $message }}
                                </p>
                            </li>
                        </ul>
                    </div>
                    <hr class="hr">
                    <div class="mb-3 text-center">
                        <h5 class="h5">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample">Histórico de Contatos</button>

                            <div class="collapse m-2" id="collapseExample">
                                <div class="card card-body">
                                        @foreach ($contact_histories as $contact)
                                            <p class="list-group-tem">
                                                <p>Data: {{ $contact->contact_date->format('d/m/Y H:m:i') }}</p>
                                                <p>Resumo: {{ $contact->resume }}</p>
                                            </p>
                                        @endforeach
                                </div>
                            </div>
                        </h5>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
