<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=no">
    
    @vite('resources/css/app.css')

    <title>HR Application</title>
</head>

<body>
    @include('_partials._header')


    <button class="text-yellow-300">Bouton</button>
    <!-- 
        le style ne s'affiche pas 
        npm run build : compile dans public/build/assets (dans docker)
        les fichiers ne sont pas trouvés : "Failed to load resource: net::ERR_CONNECTION_REFUSED"
    -->

    <main>
        @yield('content')
    </main>
    @include('_partials._footer')

</body>

</html>