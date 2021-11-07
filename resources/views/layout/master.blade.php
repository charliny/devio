<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url(mix('css/style.css')) }}">
    <title>Devio Foods</title>
</head>

<body>
    <header id="site-header">
        <div class="container">
            <h1>Devio Foods
                <span>
                    [
                </span>
                <em>Teste Fullstack</em>
                <span class="last-span is-open">
                    ]
                </span>
            </h1>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.create') }}">Checkout</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cozinha
                    </a>
                    <div class="dropdown-menu" >
                        <a class="dropdown-item" href="{{ route('orders.index') }}">Pedidos em aberto</a>
                        <a class="dropdown-item" href="{{route('orders.concluded')}}">Pedidos concluídos</a>
                        <a class="dropdown-item" href="{{route('products.create')}}">Cadastrar Produtos</a>
                        <a class="dropdown-item" href="{{route('products.index')}}">Produtos em Estoque</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    @yield('content')


    <!--Footer-->
    <footer class="page-footer text-center font-small mt-4 wow fadeIn ">

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2021 Copyright: Jéssica Ramos
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <script src="{{ url(mix('js/jquery.js')) }}"></script>
    <script src="{{ url(mix('js/jquery-ui.js')) }}"></script>
    <script src="{{ url(mix('js/jquery.mask.js')) }}"></script>
    <script src="{{ url(mix('js/script.js')) }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
