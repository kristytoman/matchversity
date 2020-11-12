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
            <h1>Nový profil univerzity</h1>
            <form id="form_addUni">
                @csrf
                <label for="in_uniName">Název univerzity</label>
                    <input id="in_uniName" type="text"><br>
                @include('include.uniform')
                <input type="submit" value="Vytvořit profil">
            </form>
            @include('include.footer')
    </body>
</html>