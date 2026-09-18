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

        <main class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#090014] via-[#1A0B2E] to-[#4C1D95] px-4">

            <pretest-result
                subject-name="{{ $subject_name }}"
                topic-name="{{ $topic_name }}"
                subject-id="{{$subject_id}}"
                topic-id="{{$topic_id}}"
                :score-percent="{{ $score_percent }}"
                message="{{ $message }}"
                status="{{ $status }}"
                home-url="{{ route('home') }}"
            ></pretest-result>

        </main>
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>