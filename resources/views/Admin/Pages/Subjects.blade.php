<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Subjects | Smart E-Learning</title>
    <link rel="shortcut icon" href="{{ asset('images/Components/Favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css'])
</head>
<body class="h-screen w-screen bg-gray-50 overflow-hidden">
    <div id="app" class="h-full">


        <left-navigation
            active-page="Subjects"
            :id-number="{{ auth()->user()->id_number }}"
            user-name="{{ auth()->user()->name }}"
            user-email="{{ auth()->user()->email }}"
        ></left-navigation>

        <main
            class="w-full h-full main-bg md:w-[calc(100%-280px)] flex flex-col md:ml-[280px] ml-0 p-5 overflow-y-auto overflow-hidden scrollbar-thin scroll-smooth"
        >
            <subjects-navigation
                :subjects="subjects"
                @subject-added="handleSubjectAdded"
            ></subjects-navigation>

            <modules-main
                :subjects="subjects"
                :modules='@json($modules)'
                :topics='@json($topics)'
                :questions='@json($questions)'
            ></modules-main>
        </main>

    </div>

    @vite([ 'resources/js/app.js'])

    <script>
        window.initialSubjects = @json($subjects);
    </script>
</body>
</html>