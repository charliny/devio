@extends('layout.master')

@section('content')
<div class="container">

    <h2 class="my-3 h2 text-center p-2">Pedidos em Aberto</h2>

    <div class="container-fluid bg-white text-dark">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Cliente</th>
                    <th>Observaçao</th>
                    <th>Total</th>
                    <th>Data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->description }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->publishFmt }}</td>
                    <td>
                        <form action="{{ route('orders.destroy', [$order->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-sm btn-danger" id="finalizar" value="Finalizar">
                        </form>
                    </td>
                    <td>{{ $order->concluded }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
