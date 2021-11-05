<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ url(mix('css/style.css')) }}">
    <title>Devio Foods</title>
</head>

<body>

    <!-- <header class="p-3 bg-dark text-white">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 d-flex justify-content-start">
            <li>
                <a href="{{ route('orders.create') }}" class="nav-link px-2 text-white">Cadastrar Pedido</a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}" class="nav-link px-2 text-white">Ver seu Pedido</a>
            </li>
            <li>
        </ul>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 d-flex justify-content-end">
            <a href="{{ route('products.create') }}" class="nav-link px-2 text-white">Cadastrar Produto</a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="nav-link px-2 text-white">Ver Produtos</a>
            </li>
            <li>
                <a href="{{ route('orders.concluded') }}" class="nav-link px-2 text-white">Ver Pedidos</a>
            </li>
        </ul>
    </header> -->

    <!-- @yield('content') -->


    <header id="site-header">
        <div class="container">
            <h1>Burguer Foods
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
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('orders.index') }}">Cozinha</a>
                </li>
            </ul>
        </div>
    </header>

    @yield('content')

    <script src="{{ url(mix('js/jquery.js')) }}"></script>
    <script src="{{ url(mix('js/jquery-ui.js')) }}"></script>
    <!-- <script src="{{ url(mix('js/bootstrap.js')) }}"></script> -->
    <script src="{{ url(mix('js/jquery.mask.js')) }}"></script>
    <script src="{{ url(mix('js/script.js')) }}"></script>
</body>

</html>
