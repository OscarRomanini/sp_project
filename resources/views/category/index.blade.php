@extends('layout')

@section('cabecalho')
Categorias
@endsection

@section('conteudo')

    @if(!empty($message))
    <div class="alert alert-success">
        {{$message}}
    </div>
    @endif

        <a href="{{route('addCategory')}}" class="btn btn-dark mb-4"> Adicionar categoria</a>

        <div class="categories">
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <form method="post" action="/categorias/{{$category->id}}" onsubmit="return confirm('Deseja realmente excluir esse registro?')">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>

@endsection