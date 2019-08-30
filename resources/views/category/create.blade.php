@extends('layout')

@section('cabecalho')
    <i class="fas fa-plus-circle mr-3"></i>Nova Categoria
@endsection

@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form method="post">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="name">
                <button class="btn btn-primary mt-2" type="submit"><i class="fas fa-plus-circle mr-3"></i>Adicionar categoria</button>
            </div>
        </form>
@endsection