<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discrete Mathematics</title>

    <link rel="shortcut icon" href="{{ asset('images/Components/Logo.png') }}" type="image/x-icon">

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
<body class="w-screen h-screen bg-gray-50 flex flex-col">

    @include('Client.Components.Topics_Navigation.DM')

    <main class="main-bg w-[calc(100%-280px)] h-full flex flex-col overflow-hidden ml-[280px]">
        <div class="bg-[#12081F] w-full h-[60px] border-b-[#2A1B4A] border-b-[1px] grid grid-cols-[1fr_4fr_1fr] text-white">
            <div class="flex items-center ps-5">
                <a href="{{ route('home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                </a>
            </div>

            <div class="flex items-center justify-center font-bold text-xl">
                Discrete Mathematics
            </div>

            <div></div>
        </div>

        <section class="w-full h-[calc(100%-60px)] overflow-auto overflow-x-hidden text-white p-5 flex flex-col">

            <h1 class="text-2xl font-bold">Introduction To Discrete Mathematics</h1>

            {{-- SEPARATOR --}}
            <div class="w-full h-[1x] flex items-center justify-center pt-[10px]">
                <div class="bg-gray-600 w-[100%] h-[1px]"></div>
            </div>
            <div class="w-full">
                <h4 class="text-xl font-bold pt-5">What is Discrete Mathematics?</h4>
                <p class="text-md text-gray-400 w-[70%] px-3 leading-none">
                    - The study of mathematical structures that are countable and distinct, covering sets, logic, proofs, combinatorics, and graph theory.
                    The foundation for algorithms and computer science reasoning.
                </p>
            </div>
            


        </section>

    </main>

    @vite(['resources/css/app.css'])
</body>
</html>