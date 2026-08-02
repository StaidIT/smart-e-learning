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

    {{-- SIDE NAVIGATION --}}
<nav class="w-[280px] h-screen fixed top-0 left-0 bg-white border-r border-gray-200 flex flex-col overflow-hidden">

    {{-- Brand (fixed) --}}
    <div class="w-full flex items-center h-[56px] px-5 border-b border-gray-200 shrink-0 bg-gradient-to-r from-[#1A0B2E] to-[#4C1D95]">
        <div class="font-bold text-[15px] tracking-tight text-white">
            Smart <span class="text-purple-300">E-Learning</span>
        </div>
    </div>

    {{-- Course label (fixed) --}}
    <div class="px-5 pt-4 pb-2 shrink-0">
        <div class="text-[10px] font-bold uppercase tracking-wider text-purple-500">Course</div>
        <div class="text-[13px] font-bold text-gray-800 mt-0.5">Discrete Mathematics</div>
    </div>

    <div class="w-full h-px bg-gray-200 shrink-0"></div>

    {{-- Chapter list (scrollable only) --}}
    <ul class="topics-scroll w-full flex-1 min-h-0 overflow-y-auto flex flex-col text-[13px] py-1">

        <li class="px-5 py-[7px]  hover:bg-gray-50 bg-[#4C1D95]/10 text-[#4C1D95] font-semibold  cursor-pointer border-l-[3px] border-transparent">
            <span class="text-purple-400 font-medium mr-1.5">1.</span>Introduction to Discrete Math
        </li>

        <li>
            <div class="px-5 py-[7px] flex items-center justify-between hover:text-[#4C1D95] text-gray-600   border-l-[3px] border-[#4C1D95] cursor-pointer">
                <span><span class="text-gray-400 font-medium mr-1.5">2.</span>Logic (Propositional Logic)</span>
                <svg class="w-3 h-3 shrink-0 rotate-180" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <ul class="flex flex-col bg-[#FBFAFE] border-l-[3px] border-[#4C1D95]">
                <li class="pl-9 pr-5 py-[6px] text-[12.5px] text-gray-500 hover:text-[#4C1D95] cursor-pointer">Statements &amp; Propositions</li>
                <li class="pl-9 pr-5 py-[6px] text-[12.5px] text-gray-500 hover:text-[#4C1D95] cursor-pointer">Logical Operators</li>
                <li class="pl-9 pr-5 py-[6px] text-[12.5px] text-gray-500 hover:text-[#4C1D95] cursor-pointer">Truth Tables</li>
                <li class="pl-9 pr-5 py-[6px] text-[12.5px] text-gray-500 hover:text-[#4C1D95] cursor-pointer">Logical Equivalence</li>
                <li class="pl-9 pr-5 py-[6px] text-[12.5px] text-gray-500 hover:text-[#4C1D95] cursor-pointer">De Morgan's Laws</li>
                <li class="pl-9 pr-5 py-[6px] text-[12.5px] text-gray-500 hover:text-[#4C1D95] cursor-pointer">Predicate Logic &amp; Quantifiers</li>
            </ul>
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">3.</span>Methods of Proof
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">4.</span>Sets
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">5.</span>Relations
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">6.</span>Functions
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">7.</span>Counting Techniques
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">8.</span>Number Theory
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">9.</span>Sequences &amp; Recurrence
        </li>

        <div class="my-1 w-full h-px bg-gray-200"></div>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">10.</span>Graph Theory
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">11.</span>Trees
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">12.</span>Boolean Algebra
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">13.</span>Algorithms
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">14.</span>Probability (Discrete)
        </li>

        <li class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
            <span class="text-gray-400 font-medium mr-1.5">15.</span>Discrete Structures in CS
        </li>

    </ul>

</nav>

    <main class="main-bg w-[calc(100%-280px)] h-full flex flex-col items-center overflow-hidden ml-[280px]">
        <div class="bg-[#12081F] w-full h-[60px] border-b-[#2A1B4A] border-b-[1px] grid grid-cols-[1fr_4fr_1fr] text-white">
            <div class="flex items-center ps-5">
                <a href="">
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

        <section class="w-full h-[calc(100%-60px)] overflow-auto overflow-x-hidden">

        </section>

    </main>

    @vite(['resources/css/app.css'])
</body>
</html>