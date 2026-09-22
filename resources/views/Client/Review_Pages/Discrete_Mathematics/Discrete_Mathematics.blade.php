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

        <main class="main-bg w-[calc(100%-280px)] h-screen flex flex-col overflow-y-auto overflow-x-hidden ml-[280px] topics-scroll">

            {{-- HEADER (stays visible while scrolling) --}}
            <div class="sticky top-0 z-20 shrink-0 bg-[#12081F]">
                <learn-header
                    profile-color="{{ auth()->user()->profile_color }}"
                    home-url="{{ route('home') }}"
                ></learn-header>
            </div>

            {{-- SECTIONS --}}
            @foreach ($modules as $i => $module)

            <section
                id="section-{{ $module->id }}"
                class="shrink-0 w-full text-white p-5 flex flex-col {{ $i > 0 ? 'border-t border-[#3A2560] mt-6 pt-8' : '' }}"
            >

                @switch($module->module_name)

                    @case('Introduction to Discrete Mathematics')
                        @include('Client.Review_Pages.Discrete_Mathematics.Module1.Main')
                        @break

                    @case('Funtions')
                        @break
                    @default
                        
                @endswitch
            </section>
                
            @endforeach

        </main>
    </div>

    @vite(['resources/js/app.js'])
</body>
</html>