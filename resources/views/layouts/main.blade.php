<!DOCTYPE html>
<html lang="en">

<head>
    <title>Royal Apps - @yield('page_title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />

    @vite('resources/css/app.css')
    @yield('css')
</head>

<body class="bg-gray-200 font-sans text-gray-700">
    @yield('content')

    @vite('resources/js/app.js')
    @yield('js')
</body>

</html>
