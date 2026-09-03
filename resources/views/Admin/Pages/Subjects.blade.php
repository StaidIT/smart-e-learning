<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Subjects | Smart E-Learning</title>
    <link rel="shortcut icon" href="{{ asset('images/Components/Favicon.png') }}" type="image/x-icon">

</head>
<body class="h-screen w-screen bg-gray-50 overflow-hidden">

    <div id="app" class="h-full">

        <add-subject></add-subject>        
        

        <navigation 
            active-page="Subjects"
            :id-number="{{auth()->user()->id_number}}"
            user-name="{{auth()->user()->name}}"
            user-email="{{auth()->user()->email}}"
        ></navigation>

        <main
            class="w-full h-full main-bg md:w-[calc(100%-280px)] flex flex-col md:ml-[280px] ml-0 p-5 overflow-y-auto overflow-hidden scrollbar-thin scroll-smooth"
        >

            <subjects-navigation
                :subjects='@json($subjects)'
            ></subjects-navigation>

            <topics-main
                :subjects='@json($subjects)'
                :topics='@json($topics)'
                :questions='@json($questions)'
            ></topics-main>

        </main>
        

    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</body>
</html>