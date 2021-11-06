@extends('layout.master')

@section('content')

<div class="container ">

    <h2 class="my-3 h2 text-center">Cadastrar Produtos</h2>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container wow fadeIn bg-white text-dark">

            <div class="row">
                <div class="col-md-6 mb-2 p-3">
                    <!--NameProduct-->
                    <div class="form-group ">
                        <label for="name">Nome do Produto</label>
                        <input type="text" name="name" class="form-control {{ ($errors->has('name') ? 'is-invalid' : '') }}" placeholder="Digite o nome do produto" value="{{old('name')}}" required />
                        @if($errors->has('name'))
                        <div class="retorno invalido">
                            {{$errors->first('name')}}
                        </div>
                        @endif
                    </div>
                </div>
                <!--Image-->
                <div class="col-md-6 mb-2 pl-5 p-3">
                    <div class="form-group">
                        <label for="path_image">Imagem do Produto</label>
                        <input type="file" name="path_image" class="form-control {{ ($errors->has('path_image') ? 'is-invalid' : '') }}" />
                        @if($errors->has('path_image'))
                        <div class="retorno invalido">
                            {{$errors->first('path_image')}}
                        </div>
                        @endif
                        <div id="image_preview" class="mt-2"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-2 p-3">
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3" placeholder="Digite a descrição do produto"></textarea>
                    </div>
                </div>

                <div class="col-md-6 mb-2 p-3">
                    <div class="form-group">
                        <label for="price">Preço</label>
                        <input type="text" name="price" class="form-control mask_price {{ ($errors->has('price') ? 'is-invalid' : '') }}" placeholder="Digite o preço do produto" value="{{old('price')}}" required />
                    </div>
                </div>
                <div class="col-md-6 mb-2 p-3">
                    <button type="submit" class="btn btn-primary" id="cad-product">Cadastrar</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
