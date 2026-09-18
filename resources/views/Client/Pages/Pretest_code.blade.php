<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Smart E-Learning</title>
    <link rel="shortcut icon" href="{{ asset('images/Components/Favicon.png') }}" type="image/x-icon">
</head>
<body class="w-screen bg-gray-50 overflow-x-hidden">
    <div id="app" class="w-screen h-screen flex flex-col overflow-hidden">
        <taking-pretest-header></taking-pretest-header>

        <main class="w-full h-[calc(100%-80px)] flex items-start justify-center pt-[30px] px-4 overflow-y-auto scrollbar-thin">
            <pretest-compiler></pretest-compiler>
        </main>
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>