@extends('layout.master')

@section('content')
<div class="container">

    <h1>Produtos em Estoque</h1>

    <table class="table table-striped products">
        <thead>
            <tr>
                <td>#id</td>
                <td>Nome</td>
                <td>Imagem</td>
                <td>Descrição</td>
                <td>Preço</td>
                <td>Ações</td>
            </tr>
        </thead>

        <tbody>

        @foreach($products as $product)

            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="{{ env('APP_URL') }}/storage/app/images_products/{{ $product->path_image }}" class="product_img">
                </td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-sm btn-warning mb-1">Editar</a>
                    <form action="{{ route('products.destroy', [$product->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-sm btn-danger"  value="Remover">
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
</div>
@endsection
