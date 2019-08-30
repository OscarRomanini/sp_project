@extends('layout')

@section('cabecalho')
    <i class="fas fa-box-open mr-3"></i>Produtos
@endsection

@section('conteudo')

    @if(!empty($message))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif

    <a href="{{route('addProduct')}}" class="btn btn-dark mb-4"><i class="fas fa-plus-circle"></i> Adicionar Produto</a>

    <div class="categories">
        <ul class="list-group">
            @foreach ($products as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Produto: {{ $product->name }}
                    |
                    Categoria {{ $product->category_id }}
                    <form method="post" action="/produtos/{{$product->id}}" onsubmit="return confirm('Deseja realmente excluir esse registro?')">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

@endsection