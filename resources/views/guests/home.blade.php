<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("{app.name} Frontend", 'Laravel') }}</title>
    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="root"></div>

    {{-- Vue import --}}
    <script src="{{ asset('js/front-office.js') }}"></script>
</body>
</html>