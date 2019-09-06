<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOLPAC</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="https://kit.fontawesome.com/12524fd83c.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
@component('header') @endcomponent
<div style="background-color: whitesmoke; padding: 20px; margin-bottom: 20px">
    <h1>@yield('cabecalho')</h1>
</div>
    <div class="main">
        @yield('conteudo')
    </div>
</body>
</html>


<style>
    .main {
        margin: 0 50px;
    }

</style>

<script>
    $(document).ready(function() {
        $('#money').mask('#.##0,00', {reverse: true});
    });
</script>