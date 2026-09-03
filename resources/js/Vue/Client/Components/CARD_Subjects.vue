<template>
    <div
        v-for="subject in subjects"
        :key="subject.id"
        class="group relative flex flex-col justify-between p-5 gap-4 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 transition-all duration-300 hover:border-[#CECBF6]/40 hover:bg-[#CECBF6]/10">
        <div class="flex items-start justify-between">
            <div  class="p-2.5 rounded-lg bg-[#CECBF6]/10">
                <!-- Discrete Math -->
                <svg v-if="subject.acronym === 'DM'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#CECBF6]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15a2.25 2.25 0 0 0 2.25-2.25v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                </svg>

                <!-- Intro to Computing -->
                <svg v-else-if="subject.acronym === 'ITC'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#CECBF6]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                </svg>

                <!-- Data Structure and Algorithm -->
                <svg v-else-if="subject.acronym === 'DSA'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#CECBF6]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                </svg>

                <!-- Computer Programming 1&2 -->
                 <svg v-else-if="subject.acronym === 'CP1' || subject.acronym === 'CP2'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#CECBF6]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.25 9.75 3 3-3 3m-4.5 0-3-3 3-3M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                </svg>
            </div>


            <div class="relative size-11 shrink-0">
                <svg class="size-11 -rotate-90" viewBox="0 0 40 40">
                    <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-opacity="0.12" stroke-width="4"/>
                    <circle cx="20" cy="20" r="16" fill="none" stroke="#CECBF6" stroke-width="4" stroke-linecap="round" stroke-dasharray="100.5" :stroke-dashoffset="100.5 - (subject.percent / 100) * 100.5"/>
                </svg>
                <span class="absolute inset-0 flex items-center justify-center text-[10px] font-bold text-[#CECBF6]">{{ subject.percent }}%</span>
            </div>
        </div>
        <div class="flex flex-col gap-1">
            <span class="text-[10px] font-bold tracking-widest text-[#CECBF6]/50">{{ subject.acronym }}</span>
            <h3 class="text-base font-bold leading-snug">{{ subject.name }}</h3>
            <p class="text-xs font-semibold text-gray-500">8 quizzes available</p>
        </div>
        <div  class="flex items-center gap-2 pt-1">
            <a href="" class="flex-1 text-center text-xs font-bold text-[#090014] bg-[#CECBF6] rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/85">Pretest</a>
            <a v-for="link in reviewLinks" :key="link.id" :href="link.name" class="flex-1 text-center text-xs font-bold text-[#CECBF6] border-[1.5px] border-[#CECBF6]/30 rounded-lg py-2.5 transition-colors hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/50">Learn</a>
        </div>
    </div>


</template>

<script setup>


    const subjects = [
        {id: 1, name: "Discrete Mathematics",  acronym: "DM", percent: 62},
        {id: 2, name: "Introduction to Computing", acronym: "ITC", percent: 80},
        {id: 3, name: "Data Structures and Algorithm", acronym: "DSA", percent: 45},
        {id: 4, name: "Computer Programming 1 & 2", acronym : "CP1", percent: 30},
    ]

    defineProps({
        reviewLinks : Array,
    })
</script>