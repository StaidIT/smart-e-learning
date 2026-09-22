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

        <taking-pretest-header
            subject-name="{{$subject_name}}"
        ></taking-pretest-header>

        <main class="w-full h-[calc(100%-80px)] flex items-start justify-center pt-[30px] px-4 overflow-y-auto scrollbar-thin">

            <pretest-compiler
            :questions='@json($questions)'
            :saved-codes='@json($saved_codes)'
            :test-case='@json($test_case)'
            :answered-questions='@json($answered_questions ?? [])'
            subject-id="{{ $subject_id }}"
            module-id="{{ $module_id }}"
            subject-name="{{ $subject_name }}"
            module-name="{{ $module_name }}"
        ></pretest-compiler>

        </main>

    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</body>
</html>