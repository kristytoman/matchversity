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
        <form method="post" action="{{ route('universities.index') }}">
            @csrf
            <label>Semestr:</label>
            <select>
                <option>Nezáleží</option>
                <option>Zimní</option>
                <option>Letní</option>
            </select>
            <br>
            <fieldset>
                <legend>Kontinent:</legend>
                <input type="checkbox" checked>Afrika</input>
                <input type="checkbox" checked>Asie</input>
                <input type="checkbox" checked>Austrálie a oceánie</input>
                <input type="checkbox" checked>Evropa</input>
                <input type="checkbox" checked>Jižní Amerika</input>
                <input type="checkbox" checked>Severní Amerika</input>
            </fieldset>
            <input type="submit" value="Vyhledat"/>
        </form>
        @include('include.footer')
    </body>
</html>