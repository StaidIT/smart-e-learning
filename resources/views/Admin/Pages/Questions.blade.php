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

        

        <navigation 
            active-page="Subjects"
            :id-number="{{auth()->user()->id_number}}"
            user-name="{{auth()->user()->name}}"
            user-email="{{auth()->user()->email}}"
        ></navigation>

        <questions-main 
            :topic-id="{{$topic_id}}"
            :subject-name='@json($subject_name)'
            :subjects='@json($subjects)'
            :topics='@json($topics)'
            :questions='@json($questions)'
            :choices='@json($choices)'
            ></questions-main>
        

    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</body>
</html>