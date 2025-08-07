<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Super Gestão - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    <meta charset="utf-8">
</head>

<body>
@include('site.layouts._partials.topo')
@yield('conteudo')
</body>
</html>
