<!doctype html>
<html lang="pt-BR" data-bs-theme="white" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - MyLeads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary h-100">
    <main class="w-100 m-auto form-container">
        <form action="{{ route('login.auth') }}" class="card p-2" method="POST">
            @csrf
            <div class="card-body">

                <div class="header-card">
                    <img src="assets/img/logo2.png" class="m-1" height="70" width="70">
                    <h1 class="h3 mb-3 fw-normal">MyLeads</h1>
                </div>

                <div class="header-card">
                    <h2 class="h5">Informe seus dados acesso.</h2>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('erro'))
                    <div class="alert alert-danger">
                        {{ session('erro') }}
                    </div>
                @endif

                <div class="form-floating mt-1">
                    <input type="email" id="floatingInput" class="form-control auth-email"
                        placeholder="meuemail@gemail.com" name="user">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" id="floatingInput bg-warning" class="form-control auth"
                        placeholder="************" name="password">
                    <label for="floatingInput">Senha</label>
                </div>

                <button id="btn-auth" class="btn btn-warning w-100 my-3 py-2">Entrar</button>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
