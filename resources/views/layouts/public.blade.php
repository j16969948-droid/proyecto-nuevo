<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>@yield('title','Lasso')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')

</head>

<body class="bg-gray-950 text-white">

@include('components.navbar-public')

<main>

@yield('content')

</main>

</body>

</html>