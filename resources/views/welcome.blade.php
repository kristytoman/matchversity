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
        <div class="title">
            <h1>Matchversity</h1>
            <div>Pomocník při vyhledávání zahraniční univerzity.</div>
            <a href="matcher" role="button">Vyhledat univerzity</a>
            <a href="{{ route('mobilities.index') }}" role="button">Ohodnotit výjezd</a>
        </div>
        <div class="about">
            <h2>O Matchversity</h2>
            <span>
                <p>
                    Aplikace umožňuje studentům UTB prohlížet uskutečněné výjezdy na zahraniční studijní pobyt.
                    Abychom usnadnili proces vyhledávávání zahraničních předmětů ke spárování s předměty domácími,
                    zpřístupnili jsme pro vás informace o předchozích spárování. 
                </p>
                <p>
                    Studenti, kteří se již výjezdu účastnili, mají možnost poskytnout feedback k absolvovaným
                    předmětům, a tím pomoct s rozhodováním zájemcům.
                </p>
            </span>
        </div>
        @include('include.footer')
    </body>
</html>
