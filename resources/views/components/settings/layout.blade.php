<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.typekit.net/moi0nby.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Les Pattes Heureuses</title>
</head>
<body class="no-js">
<header class="sticky top-0 z-50">
    <x-client.navigation.main/>
</header>
<main>
    {{ $slot }}
</main>

<x-client.footer/>

</body>
</html>
