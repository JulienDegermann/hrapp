<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=no">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>HR Application - e-mail</title>
</head>

<body>

    <main>
        <section>
            <div class="container">
                @yield('email_content')
                <p>L'équipe HRApp</p>
            </div>
        </section>
    </main>

</body>

</html>