@extends('master')

@section('conteudo')
    <div class="main-home">

        <h1 style="opacity: 0.7; color:#A80456;">Para onde vamos?</h1>

        <div class="items">

            <a href="{{route('list_categories')}}" style="text-decoration: none; color: #1b1e21">
                <div class="center-items">
                    <i class="fas fa-boxes home-icons-size"></i>
                    <h2>Categorias</h2>
                </div>
            </a>

            <a href="{{route('list_products')}}" style="text-decoration: none; color: #1b1e21">
                <div class="center-items">
                    <i class="fas fa-box-open home-icons-size"></i>
                    <h2>Produtos</h2>
                </div>
            </a>

            <a id="report" href="{{route('about')}}" style="text-decoration: none; color: #1b1e21">
                <div class="center-items">
                    <i class="fas fa-users home-icons-size"></i>
                    <h2>Sobre nós</h2>
                </div>

            </a>

        </div>

    </div>

    <style>

        .main-home {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 50px;
        }

        .items {
            display: flex;
            justify-content: space-around;
            flex-direction: row;
            margin: 50px;
        }

        .center-items {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 50px;
            opacity: 0.7;
        }

        .center-items:hover {
            opacity: 1;
            -webkit-transform: scale(1.3);
            -ms-transform: scale(1.3);
            transform: scale(1.3);

        }

        .home-icons-size {
            font-size: 48px;
        }


    </style>


@endsection