@extends('layout.master')

@section('content')
<div class="container">

    <h3>Pedidos em Abertos</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Cliente</th>
                <th>Observaçao</th>
                <th>Total</th>
                <th>Data de criação</th>
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
                        <input type="submit" class="btn btn-sm btn-danger"  value="Finalizar">
                    </form>
                </td>
                <td>{{ $order->concluded }}</td>
            </tr>

        @endforeach

        </tbody>
    </table>
</div>
@endsection


