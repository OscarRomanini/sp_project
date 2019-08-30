@extends('layout')

@section('cabecalho')
    <i class="fas fa-plus-circle mr-3"></i>Novo Produto
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

            <label for="name">Nome:</label>
            <input type="text" class="form-control col-md-4" name="name">

            <label class="mt-2" for="category_id">Categoria:</label>
            <select name="category_id" class="form-control col-md-4">
                <option selected>Selecione</option>
                @foreach($categories as $category)
                    <option
                        value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>

            <label for="description" class="mt-2">Descrição:</label>
            <input type="text" class="form-control col-md-4" name="description">

            <label for="price" class="mt-2">Preço:</label>
            <input type="text" class="form-control col-md-4" name="price" placeholder="R$">

            <button class="btn btn-primary mt-5" type="submit">Adicionar produto</button>
        </div>
    </form>
@endsection