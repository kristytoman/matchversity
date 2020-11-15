<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">
    </head>
    
    <body>
        <div>
            @yield('content')
        </div>

        @include('include.footer')
        
        @yield('scripts')
    </body>
</html>