<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart E-Learning</title>
    <link rel="shortcut icon" href="{{ asset('images/Components/Logo.png') }}" type="image/x-icon">
</head>
<body class="w-screen bg-gray-50 flex flex-col overflow-x-hidden" >

    @include('Client.Components.Navigation')

    <main class="w-full text-white pt-[70px] md:pt-[100px] pb-10 px-4 flex flex-col ">
        {{-- HERO SECTION --}}
        <section class="w-full flex items-center justify-center flex-col gap-5">
            <div class="flex flex-col items-center justify-center w-full sm:w-[85%] md:w-[70%] lg:w-[60%] gap-3">
                <h1 class="text-[28px] sm:text-[34px] md:text-[40px] font-bold text-center leading-tight">
                    Review Smarter. Quiz Better.
                </h1>
                <p class="text-[13px] font-semibold text-center leading-relaxed">
                    Review lessons and take quizzes across foundational computing subjects like
                    Discrete Mathematics, Introduction to Computing, Data Structures and Algorithms, and Computer Programming 1 & 2. All in one place,
                    built for students across IT, Computer Science, and related courses.
                </p>
            </div>

            <div class="pt-2 font-bold text-md text-gray-500">
                <span class="border-b-[1px] border-b-gray-600">Performance Summary</span>
            </div>

            <div class="grid grid-cols-3 gap-6 px-5 pb-3 pt-1 lg:w-[60%] w-full ">
                
                {{-- TOTAL SCORE --}}
                <div class=" flex flex-col items-center justify-center p-4 gap-2 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-8 size-6 text-[#CECBF6]/65">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                    </svg>

                    <span class="text-2xl font-bold">12</span>

                    <p class="md:text-md text-xs font-semibold text-[#CECBF6]/65">TOTAL SCORE</p>
                </div>

                {{-- TOTAL SCORE --}}
                <div class=" flex flex-col items-center justify-center p-4 gap-2 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-8 size-6 text-[#CECBF6]/65">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.99 14.993 6-6m6 3.001c0 1.268-.63 2.39-1.593 3.069a3.746 3.746 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043 3.745 3.745 0 0 1-3.068 1.593c-1.268 0-2.39-.63-3.068-1.593a3.745 3.745 0 0 1-3.296-1.043 3.746 3.746 0 0 1-1.043-3.297 3.746 3.746 0 0 1-1.593-3.068c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 0 1 1.043-3.297 3.745 3.745 0 0 1 3.296-1.042 3.745 3.745 0 0 1 3.068-1.594c1.268 0 2.39.63 3.068 1.593a3.745 3.745 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.297 3.746 3.746 0 0 1 1.593 3.068ZM9.74 9.743h.008v.007H9.74v-.007Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm4.125 4.5h.008v.008h-.008v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>

                    <span class="text-2xl font-bold">50%</span>

                    <p class="md:text-md text-xs font-semibold text-[#CECBF6]/65">ACCURACY</p>
                </div>

                {{-- TOTAL SCORE --}}
                <div class=" flex flex-col items-center justify-center p-4 gap-2 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="md:size-8 size-6 text-[#CECBF6]/65">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>

                    <span class="text-2xl font-bold">12</span>

                    <p class="md:text-md text-xs font-semibold text-[#CECBF6]/65">COMPLETED</p>
                </div>



            </div>
        </section>

        @include('Client.Sections.DM')

        @include('Client.Sections.DSA')
        

    </main>

    @vite(['resources/css/app.css'])
</body>
</html>