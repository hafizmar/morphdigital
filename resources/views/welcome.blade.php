<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Morph Digital</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    @vite('resources/css/bootstrap/css/bootstrap.css')
    @vite('resources/css/bootstrap/css/bootstrap-grid.css')
    @vite('resources/css/bootstrap/css/bootstrap-form.css')
    @vite('resources/css/bootstrap/css/bootstrap-utilities.min.css')
    @vite('resources/css/bootstrap/css/bootstrap-alert.css')
</head>

<body class="bg-light">
    <div id="app">
    </div>
    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @vite('resources/js/booststrap/js/bootstrap.min.js')
</body>

</html>
