@extends('layout')

@section('cabecalho')
Nova Categoria
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
{{--            evita posts falsos--}}

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="name">
                <button class="btn btn-primary mt-2" type="submit">Adicionar categoria</button>
            </div>
        </form>
@endsection