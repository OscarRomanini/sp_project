@extends('layout')

@section('cabecalho')
    <i class="fas fa-box-open mr-3"></i>Produtos
@endsection

@section('conteudo')

    @if(!empty($message))
        <div class="alert alert-success" id="alert">
            {{$message}}
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                setTimeout(function() {
                    $("#alert").fadeOut().empty();
                }, 5000);
            }, false);
        </script>
    @endif

    @if(count($products) > 0)

    <a href="{{route('addProduct')}}" class="btn btn-dark mb-4"><i class="fas fa-plus-circle"></i> Adicionar Produto</a>

    <div class="categories">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th></th>
            </tr>
            </thead>
            @foreach ($products as $product)
                <tbody>
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->getCategoryById($product->category_id) }}</td>
                        <td>{{ $product->description }}</td>
                        <td>R$ {{ $product->price }}</td>
                        <td>
                            <span class="d-flex">
                                <a href="/produtos/editar/{{$product->id}}" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form method="post" action="/produtos/{{$product->id}}" onsubmit="return confirm('Deseja realmente excluir esse registro?')">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </span>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    @else
        <span class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="m-5">Ainda não há nenhum produto. Que tal criar um?</h1>
            <a href="{{route('addProduct')}}" class="btn btn-dark mb-4"><i class="fas fa-plus-circle"></i> Adicionar produto</a>
        </span>
    @endif

@endsection