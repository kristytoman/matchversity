<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Matchversity | Univerzita Tomáše Bati ve Zlíně</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
            .title {
                text-align: center;
            }
            .about {
                padding-left: 5vw;
            }
        </style>
    </head>
    <body>
    @include('include.header')
    <a href="{{ route('mobilities.create') }}">Přidat výjezd</a>
    @include('include.footer')
    </body>
</html>