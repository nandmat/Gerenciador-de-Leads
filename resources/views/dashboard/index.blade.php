<!doctype html>
<html lang="pt-BR" data-bs-theme="white" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - MyLeads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body class="">
    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 black-text fs-4 fw-bold text-uppercase border-bottom">
                MyLeads<img src="assets/img/logo2.png" class="m-0" height="70" width="70"></div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
                <a href="{{ route('logout') }}"
                    class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-power-off me-2"></i>
                    Logout
                </a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">{{ $leadsCount->leads_pending }}</h3>
                                <p class="fs-5">Pendentes</p>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">{{ $leadsCount->leads_failed }}</h3>
                                <p class="fs-5">Falhos</p>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">{{ $leadsCount->leads_success }}</h3>
                                <p class="fs-5">Sucesso</p>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div class="text-center">
                                <h3 class="fs-2">{{ $leads->total() }}</h3>
                                <p class="fs-5">Total</p>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Listagem de Leads <a style="color: #ffff;" class="btn btn-success"
                            data-bs-toggle="modal" data-bs-target="#modalAddLead" data-bs-whatever="@mdo">Adicionar</a>
                    </h3>
                    @include('template.modal-add')
                    <div class="table-responsive">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Último Contato</th>
                                    <th scope="col">Data de Cadastro</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leads as $lead)
                                    <tr>
                                        <td>{{ $lead->id }}</td>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->phone }}</td>
                                        <td>
                                            @if ($lead->status == 'pending')
                                                <span class="badge text-bg-warning">Pendente</span>
                                            @elseif ($lead->status == 'failed')
                                                <span class="badge text-bg-danger">Falhou</span>
                                            @elseif ($lead->status == 'success')
                                                <span class="badge text-bg-success">Sucesso</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ is_null($lead->last_contact) ? 'Contato pendente' : $lead->last_contact->format('d/m/Y H:m') }}
                                        </td>
                                        <td>
                                            {{ $lead->created_at->format('d/m/Y H:m:s') }}
                                        </td>
                                        @include('template.modal-edit', [
                                            'email' => $lead->email,
                                            'name' => $lead->name,
                                            'id' => $lead->id,
                                            'status' => $lead->status,
                                            'message' => $lead->message,
                                            'phone' => $lead->phone,
                                        ])

                                        @include('template.modal-destroy', [
                                            'id' => $lead->id,
                                            'name' => $lead->name,
                                        ])

                                        @include('template.modal-show', [
                                            'id' => $lead->id,
                                            'name' => $lead->name,
                                            'email' => $lead->email,
                                            'last_contact' => is_null($lead->last_contact)
                                                ? 'Contato pendente'
                                                : $lead->last_contact->format('d/m/Y H:m'),
                                            'status' => $lead->status,
                                            'phone' => $lead->phone,
                                            'message' => $lead->message,
                                            'created_at' => $lead->created_at,
                                            'contact_histories' => $lead->contactHistories
                                        ])

                                        <td class="text-center justify-content-center">
                                            <div class="btn-group m-1" role="group"
                                                aria-label="Basic mixed styles example">
                                                <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#showLead-{{ $lead->id }}">Verficar</a>
                                                <a class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#destroyLead-{{ $lead->id }}">Deletar</a>
                                                <a class="btn btn-outline-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditLead-{{ $lead->id }}"
                                                    data-bs-whatever="@mdo"
                                                    title="Editar {{ $lead->name }}">Atualizar</a>
                                                <a class="btn btn-outline-success btn-sm">Contato</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-2 text-center">
                        {!! $leads->appends(request()->except('page'))->links('template.paginator') !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/lead.js') }}"></script>
</body>

</html>
