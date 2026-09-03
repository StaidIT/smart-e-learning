<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Topic for a Quiz — Discrete Mathematics</title>
    <link rel="shortcut icon" href="{{ asset('images/Components/Logo.png') }}" type="image/x-icon">
    
</head>
<body class="w-screen min-h-screen bg-gray-50 flex flex-col overflow-x-hidden text-white">

    <div id="app" class="flex flex-col overflow-x-hidden text-white">

    
        {{-- NAV --}}
        <nav class="w-full h-[50px] md:h-[80px] fixed top-0 left-0 z-50 flex items-center justify-center px-4">
            <div class="bg-white/5 backdrop-blur-md border-[1.5px] border-[#CECBF6]/15 w-full max-w-2xl h-[50px] flex items-center justify-between px-4 sm:px-6 md:rounded-full">
                <div class="font-bold text-[15px] tracking-tight text-white">
                    Smart <span class="text-[#CECBF6]">E-Learning</span>
                </div>
                <ul class="hidden md:flex items-center justify-center gap-6 text-[13px] font-semibold text-gray-400">
                    <li><a href="" class="hover:text-[#CECBF6] transition-colors">Home</a></li>
                    <li><a href="" class="text-[#CECBF6] relative">Subjects</a></li>
                </ul>
            </div>
        </nav>

        <main class="w-full pt-[70px] md:pt-[100px] pb-10 px-4 flex flex-col">

            {{-- BREADCRUMB + TITLE --}}
            <section class="w-full flex items-center justify-center flex-col gap-3">
                <p class="text-[11px] font-semibold tracking-widest text-[#CECBF6]/50">SUBJECTS / DISCRETE MATHEMATICS</p>
                <h1 class="text-[28px] sm:text-[34px] md:text-[40px] font-bold text-center leading-tight">
                    Discrete Mathematics
                </h1>
                <p class="text-[13px] font-semibold text-center leading-relaxed text-gray-400 w-full sm:w-[85%] md:w-[70%] lg:w-[55%]">
                    Work through each module in order. Pass a quiz to unlock the next one on the list.
                </p>
            </section>

            {{-- REMINDER NOTE --}}
            <section class="w-full flex items-center justify-center pt-6">
                <div class="flex items-start gap-3 p-4 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 w-full sm:w-[85%] md:w-[70%] lg:w-[60%]">
                    <div class="p-2 rounded-lg bg-[#CECBF6]/10 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-[#CECBF6]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[13px] font-bold">Reminder!</p>
                        <p class="text-[12px] font-semibold text-gray-400 mt-0.5">You must pass a module's quiz before the next one unlocks.</p>
                    </div>
                </div>
            </section>

            {{-- PROGRESS STATS --}}
            <section class="w-full flex items-center justify-center flex-col gap-5 pt-8">
                <div class="pt-2 font-bold text-md text-gray-500">
                    <span class="border-b-[1px] border-b-gray-600">Your Progress in this Subject</span>
                </div>

                <div class="grid grid-cols-3 gap-6 px-5 pb-3 pt-1 lg:w-[60%] w-full">
                    <div class="flex flex-col items-center justify-center p-4 gap-2 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-8 size-6 text-[#CECBF6]/65">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-2xl font-bold">3</span>
                        <p class="md:text-md text-xs font-semibold text-[#CECBF6]/65">PASSED</p>
                    </div>

                    <div class="flex flex-col items-center justify-center p-4 gap-2 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-8 size-6 text-[#CECBF6]/65">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.99 14.993 6-6m6 3.001c0 1.268-.63 2.39-1.593 3.069a3.746 3.746 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043 3.745 3.745 0 0 1-3.068 1.593c-1.268 0-2.39-.63-3.068-1.593a3.745 3.745 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.297 3.746 3.746 0 0 1-1.593-3.068c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 0 1 1.043-3.297 3.745 3.745 0 0 1 3.296-1.042 3.745 3.745 0 0 1 3.068-1.594c1.268 0 2.39.63 3.068 1.593a3.745 3.745 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.297 3.746 3.746 0 0 1 1.593 3.068ZM9.74 9.743h.008v.007H9.74v-.007Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm4.125 4.5h.008v.008h-.008v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="text-2xl font-bold">62%</span>
                        <p class="md:text-md text-xs font-semibold text-[#CECBF6]/65">AVG SCORE</p>
                    </div>

                    <div class="flex flex-col items-center justify-center p-4 gap-2 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-8 size-6 text-[#CECBF6]/65">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        <span class="text-2xl font-bold">5</span>
                        <p class="md:text-md text-xs font-semibold text-[#CECBF6]/65">REMAINING</p>
                    </div>
                </div>
            </section>

            {{-- SEPARATOR --}}
            <div class="w-full h-[1px] flex items-center justify-center pt-[30px]">
                <div class="bg-gray-600 w-[60%] h-[1px]"></div>
            </div>

            {{-- MODULES --}}
            <section class="w-full pt-10 flex flex-col items-center justify-center">
                <div class="flex flex-col items-center gap-1 pb-8">
                    <span class="font-bold text-4xl">MODULES</span>
                    <p class="text-xs font-semibold text-gray-500">Complete them in order to unlock the next</p>
                </div>

                <div class="relative w-[90%] lg:w-[60%] flex flex-col gap-5">
                    {{-- connecting line --}}
                    <div class="absolute left-7 top-7 bottom-7 w-px bg-[#CECBF6]/15"></div>

                    {{-- MODULE 1 — PASSED --}}
                    <div class="relative flex items-center gap-4 z-10">
                        <div class="relative size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014]">
                            <svg class="size-14 -rotate-90 absolute" viewBox="0 0 40 40">
                                <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-opacity="0.12" stroke-width="4"/>
                                <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-width="4" stroke-linecap="round" stroke-dasharray="100.5" stroke-dashoffset="0"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#CECBF6" class="size-5 relative">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <div class="group flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-5 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 hover:border-[#CECBF6]/40 hover:bg-[#CECBF6]/10 transition-all duration-300">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest text-[#CECBF6]/50">CH. 01 · PASSED</span>
                                <h3 class="text-base font-bold leading-snug">Propositional Logic</h3>
                                <p class="text-xs font-semibold text-gray-500">Truth tables, connectives & tautologies · 12 questions</p>
                            </div>
                            <a href="#" class="text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 px-5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50 whitespace-nowrap">Review</a>
                        </div>
                    </div>

                    {{-- MODULE 2 — PASSED --}}
                    <div class="relative flex items-center gap-4 z-10">
                        <div class="relative size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014]">
                            <svg class="size-14 -rotate-90 absolute" viewBox="0 0 40 40">
                                <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-opacity="0.12" stroke-width="4"/>
                                <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-width="4" stroke-linecap="round" stroke-dasharray="100.5" stroke-dashoffset="0"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#CECBF6" class="size-5 relative">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <div class="group flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-5 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 hover:border-[#CECBF6]/40 hover:bg-[#CECBF6]/10 transition-all duration-300">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest text-[#CECBF6]/50">CH. 02 · PASSED</span>
                                <h3 class="text-base font-bold leading-snug">Predicate Logic &amp; Quantifiers</h3>
                                <p class="text-xs font-semibold text-gray-500">∀ and ∃, nested quantifiers · 10 questions</p>
                            </div>
                            <a href="#" class="text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 px-5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50 whitespace-nowrap">Review</a>
                        </div>
                    </div>

                    {{-- MODULE 3 — PASSED --}}
                    <div class="relative flex items-center gap-4 z-10">
                        <div class="relative size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014]">
                            <svg class="size-14 -rotate-90 absolute" viewBox="0 0 40 40">
                                <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-opacity="0.12" stroke-width="4"/>
                                <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-width="4" stroke-linecap="round" stroke-dasharray="100.5" stroke-dashoffset="0"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#CECBF6" class="size-5 relative">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <div class="group flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-5 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 hover:border-[#CECBF6]/40 hover:bg-[#CECBF6]/10 transition-all duration-300">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest text-[#CECBF6]/50">CH. 03 · PASSED</span>
                                <h3 class="text-base font-bold leading-snug">Set Theory</h3>
                                <p class="text-xs font-semibold text-gray-500">Operations, power sets, Venn diagrams · 14 questions</p>
                            </div>
                            <a href="#" class="text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 px-5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50 whitespace-nowrap">Review</a>
                        </div>
                    </div>

                    {{-- MODULE 4 — CURRENT --}}
                    <div class="relative flex items-center gap-4 z-10">
                        <div class="relative size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014]">
                            <span class="absolute inset-0 rounded-full bg-[#CECBF6]/25 animate-ping"></span>
                            <svg class="size-14 -rotate-90 absolute" viewBox="0 0 40 40">
                                <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-opacity="0.12" stroke-width="4"/>
                                <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-width="4" stroke-linecap="round" stroke-dasharray="100.5" stroke-dashoffset="65"/>
                            </svg>
                            <span class="text-[13px] font-bold relative text-[#CECBF6]">04</span>
                        </div>
                        <div class="flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-5 rounded-xl border-[1.5px] border-[#CECBF6]/50 bg-[#CECBF6]/12">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest text-[#CECBF6]">CH. 04 · IN PROGRESS</span>
                                <h3 class="text-base font-bold leading-snug">Relations &amp; Functions</h3>
                                <p class="text-xs font-semibold text-gray-400">Equivalence relations, partial orders · 15 questions</p>
                            </div>
                            <a href="#" class="text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 px-5 transition-colors hover:bg-[#CECBF6]/85 whitespace-nowrap">Continue Quiz</a>
                        </div>
                    </div>

                    {{-- MODULE 5 — LOCKED --}}
                    <div class="relative flex items-center gap-4 z-10">
                        <div class="relative size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014] border-[1.5px] border-[#CECBF6]/10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <div class="flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-5 rounded-xl border-[1.5px] border-[#CECBF6]/10 bg-white/[0.02]">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest text-gray-600">CH. 05 · LOCKED</span>
                                <h3 class="text-base font-bold leading-snug text-gray-500">Combinatorics</h3>
                                <p class="text-xs font-semibold text-gray-600">Pass Ch. 04 to unlock · 12 questions</p>
                            </div>
                            <span class="text-center text-xs font-bold text-gray-600 border-[1.5px] border-gray-700 rounded-lg py-2.5 px-5 whitespace-nowrap">Locked</span>
                        </div>
                    </div>

                    {{-- MODULE 6 — LOCKED --}}
                    <div class="relative flex items-center gap-4 z-10">
                        <div class="relative size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014] border-[1.5px] border-[#CECBF6]/10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <div class="flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-5 rounded-xl border-[1.5px] border-[#CECBF6]/10 bg-white/[0.02]">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest text-gray-600">CH. 06 · LOCKED</span>
                                <h3 class="text-base font-bold leading-snug text-gray-500">Graph Theory</h3>
                                <p class="text-xs font-semibold text-gray-600">Pass Ch. 05 to unlock · 16 questions</p>
                            </div>
                            <span class="text-center text-xs font-bold text-gray-600 border-[1.5px] border-gray-700 rounded-lg py-2.5 px-5 whitespace-nowrap">Locked</span>
                        </div>
                    </div>

                    {{-- MODULE 7 — LOCKED --}}
                    <div class="relative flex items-center gap-4 z-10">
                        <div class="relative size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014] border-[1.5px] border-[#CECBF6]/10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <div class="flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-5 rounded-xl border-[1.5px] border-[#CECBF6]/10 bg-white/[0.02]">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest text-gray-600">CH. 07 · LOCKED</span>
                                <h3 class="text-base font-bold leading-snug text-gray-500">Number Theory</h3>
                                <p class="text-xs font-semibold text-gray-600">Pass Ch. 06 to unlock · 11 questions</p>
                            </div>
                            <span class="text-center text-xs font-bold text-gray-600 border-[1.5px] border-gray-700 rounded-lg py-2.5 px-5 whitespace-nowrap">Locked</span>
                        </div>
                    </div>

                    {{-- MODULE 8 — LOCKED --}}
                    <div class="relative flex items-center gap-4 z-10">
                        <div class="relative size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014] border-[1.5px] border-[#CECBF6]/10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <div class="flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-5 rounded-xl border-[1.5px] border-[#CECBF6]/10 bg-white/[0.02]">
                            <div>
                                <span class="text-[10px] font-bold tracking-widest text-gray-600">CH. 08 · LOCKED</span>
                                <h3 class="text-base font-bold leading-snug text-gray-500">Boolean Algebra</h3>
                                <p class="text-xs font-semibold text-gray-600">Pass Ch. 07 to unlock · 9 questions</p>
                            </div>
                            <span class="text-center text-xs font-bold text-gray-600 border-[1.5px] border-gray-700 rounded-lg py-2.5 px-5 whitespace-nowrap">Locked</span>
                        </div>
                    </div>

                </div>
            </section>

        </main>
    </div>

    @vite(['resources/css/app.css'])
</body>
</html>