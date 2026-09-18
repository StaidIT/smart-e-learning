<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discrete Mathematics</title>

    <link rel="shortcut icon" href="{{ asset('images/Components/Logo.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css'])

    <style>
        .topics-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .topics-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .topics-scroll::-webkit-scrollbar-thumb {
            background-color: #E5E0F0;
            border-radius: 999px;
        }
        .topics-scroll::-webkit-scrollbar-thumb:hover {
            background-color: #C9BEE8;
        }
        .topics-scroll {
            scrollbar-width: thin;
            scrollbar-color: #E5E0F0 transparent;
        }
    </style>
</head>
<body class="w-screen h-screen overflow-hidden bg-[#12081F]">
    <div id="app" class="flex flex-col h-screen w-screen overflow-hidden">

        <modules-topics-navigation
        :modules='@json($modules)'
        :topics='@json($topics)'
        subject-name="{{$subject_name}}"
        ></modules-topics-navigation>

        <main class="main-bg w-[calc(100%-280px)] h-screen flex flex-col overflow-hidden ml-[280px]">
            {{-- HEADERS --}}
            <learn-header
            profile-color="{{auth()->user()->profile_color}}"
            home-url="{{route('home')}}"
            ></learn-header>

            <section class="flex-1 min-h-0 w-full overflow-y-auto overflow-x-hidden text-white p-5 flex flex-col scrollbar-thin">

                {{-- MODULE 1 --}}
                <div>
                    <h1 class="text-2xl font-bold">
                        Introduction To Discrete Mathematics
                    </h1>

                    {{-- SEPARATOR --}}
                    <div class="w-full h-[1px] flex items-center justify-center pt-[10px]">
                        <div class="bg-gray-600 w-full h-[1px]"></div>
                    </div>

                    {{-- INTRODUCTION --}}
                    <div class="w-full">
                        <h4 class="text-xl font-bold pt-5">
                            What is Discrete Mathematics?
                        </h4>

                        <p class="text-md text-gray-400 px-3 mt-3 leading-relaxed">
                            Discrete Mathematics is the study of mathematical structures that
                            are distinct and countable. It focuses on objects such as sets,
                            logic, relations, functions, graphs, and mathematical proofs.
                        </p>

                        <p class="text-md text-gray-400 px-3 mt-3 leading-relaxed">
                            Discrete Mathematics is an important foundation of computer science.
                            It is used in algorithms, programming, databases, cybersecurity,
                            artificial intelligence, and many other areas of computing.
                        </p>
                    </div>

                    {{-- ============================================================= TOPICS ============================================================= --}}

                    
                    {{-- @if (collect($topics)->contains('slug', 'topic-logic'))
                        @include('Client.Review_Pages.Discrete_Mathematics.Module1.Logic')
                    @endif --}}
                    @foreach($topics as $topic)
                        @switch($topic->slug)

                            @case('topic-logic')

                                {{-- LOGIC --}}
                                @include('Client.Review_Pages.Discrete_Mathematics.Module1.Logic')
                                @break

                            @case('topic-sets-and-set-operation')

                                {{-- SETS AND SET OPERATION --}}
                                @include('Client.Review_Pages.Discrete_Mathematics.Module1.Sets_And_Set_Operation')
                                @break

                            @case('topic-properties-of-set')

                                {{-- PROPERTIES OF SET --}}
                                @include('Client.Review_Pages.Discrete_Mathematics.Module1.Properties_Of_Set')
                                @break

                        @endswitch
                    @endforeach

                    {{-- SUMMARY --}}
                    <div class="bg-[#24123B] border border-[#3A2560] rounded-xl p-6 mt-10">

                        <h2 class="text-xl font-bold">
                            Module 1 Summary
                        </h2>

                        <p class="text-gray-400 mt-3 leading-relaxed">
                            In this module, we introduced the fundamental concepts of
                            Discrete Mathematics. We discussed logic, propositions,
                            logical operators, sets, set operations, and the basic
                            properties of sets.
                        </p>

                    </div>

                </div>

            </section>

        </main>
    </div>

    @vite(['resources/js/app.js'])
</body>
</html>