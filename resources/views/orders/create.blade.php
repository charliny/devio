@extends('layout.master')

@section('content')

<form action="{{ route('orders.store') }}" method="post">
    @csrf
    <!--Main layout-->
    <div class="container wow fadeIn">
        <!-- Heading -->
        <h2 class="my-3 h2 text-center">Faça seu Pedido!</h2>
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-6 mb-4 ">
                <!--Card-->
                <div class="card border-0">
                    <!--Card content-->
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-6 mb-2 pl-5 p-3">
                            <!--firstName-->
                            <div class="md-form ">
                                <label for="name">Seu Nome</label>
                                <input type="text" name="name" class="form-control {{ ($errors->has('name') ? 'is-invalid' : '') }}" placeholder="Digite seu nome" value="{{old('name')}}" required />
                                @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-6 mb-2 pr-5 p-3">
                            <!--firstName-->
                            <div class="md-form ">
                                <label for="publish_at">Data</label>
                                <input type="text" name="publish_at" class="form-control {{ ($errors->has('publish_at') ? 'is-invalid' : '') }}" value="{{ date('d/m/Y H:i') }}" required />
                                @if($errors->has('publish_at'))
                                <div class="invalid-feedback">
                                    {{$errors->first('publish_at')}}
                                </div>
                                @endif
                            </div>
                            @if($errors->has('publish_at'))
                            <div class="invalid-feedback">
                                {{$errors->first('publish_at')}}
                            </div>
                            @endif
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                    <hr>
                    <div class="custom-control custom-checkbox pl-5">
                        <input type="checkbox" class="custom-control-input" id="credit-card">
                        <label class="custom-control-label" for="credit-card">Credit card</label>
                    </div>
                    <div class="custom-control custom-checkbox pl-5">
                        <input type="checkbox" class="custom-control-input" id="debit-card">
                        <label class="custom-control-label" for="debit-card">Debit card</label>
                    </div>
                    <div class="custom-control custom-checkbox pl-5">
                        <input type="checkbox" class="custom-control-input" id="cashe">
                        <label class="custom-control-label" for="cashe">Dinheiro</label>
                    </div>
                    <hr>
                    <!--Observação-->
                    <div class="md-form pl-3 p-2">
                        <label for="description">Observaçao</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Alguma informação no Pedido?"></textarea>
                    </div>
                </div>
                <!--/.Card-->
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-5 mb-4 bg-white text-dark">
                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <spa class="p-3">Produtos</span>
                </h4>
                <!-- Cart -->
                <select id="product" class="form-control mb-3 {{ ($errors->has('product') ? 'is-invalid' : '') }}">
                    <option value="">Selecione um produto</option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name}}: {{ $product->description}} = R$ {{ $product->price}}</option>

                    @endforeach
                </select>
                <br>
                @if($errors->has('product'))
                <div class="invalid-feedback">
                    {{$errors->first('product')}}
                </div>
                @endif
                <button class="btn btn-sm btn-primary add_product" id="adicionar" type="button">Adicionar</button>
                <!-- Cart -->
                <table class="table table-bordered list">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Preço</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <label for="total" class="p-3">Total (R$)</label>
                <input type="text" name="total" id="total" class="form-control mb-3 mask_total_price {{ ($errors->has('total') ? 'is-invalid' : '') }}" value="{{old('total')}}" required />

                @if($errors->has('total'))
                <div class="invalid-feedback">
                    {{$errors->first('total')}}
                </div>
                @endif
            </div>
            <!--Grid column-->
            <button class="btn btn-primary btn-lg btn-block" id="confirmar" type="submit">Confirmar Pedido</button>
        </div>
        <!--Grid row-->
    </div>
</form>

@endsection
