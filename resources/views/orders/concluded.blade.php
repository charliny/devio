@extends('layout.master')

@section('content')
<div class="container">

    <h1>Pedidos</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#id</th>
                <th>#Nome do Cliente</th>
                <th>#Observaçao</th>
                <th>Total</th>
                <th>Data de criação</th>
                <th>Detalhes</th>
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
                    <form action="{{ route('orders.update', [$order->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <!--<input type="submit" 
                    class="form-control btn btn-sm btn-success mt-2 mb-3" nome="concluded" id="concluded"
                    value="Concluido"
                    /> -->
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
</div>
@endsection


