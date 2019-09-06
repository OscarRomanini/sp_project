@extends('layout')

@section('cabecalho')
    <i class="fas fa-boxes mr-3"></i>Categorias
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

    @if(count($categories) > 0)
        <a href="{{route('addCategory')}}" class="btn btn-dark mb-4"><i class="fas fa-plus-circle"></i> Adicionar categoria</a>

        <div class="categories">
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-row">
                        {{ $category->name }}
                        <span class="d-flex flex-row">
                            <a href="/categorias/{{$category->id}}" class="btn btn-primary btn-sm mr-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form method="post" action="/categorias/{{$category->id}}" onsubmit="return confirm('Deseja realmente excluir esse registro e todos os registros relacionados a ele?')">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <span class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="m-5">Ainda não há nenhuma categoria. Que tal criar uma?</h1>
            <a href="{{route('addCategory')}}" class="btn btn-dark mb-4"><i class="fas fa-plus-circle"></i> Adicionar categoria</a>
        </span>
    @endif

@endsection