<template>
    <nav class="w-[280px] h-screen fixed top-0 left-0 bg-white border-r border-gray-200 flex flex-col overflow-hidden">

        <!-- {{-- Brand (fixed) --}} -->
        <div class="w-full flex items-center h-[60px] px-5 border-b border-gray-200 shrink-0 bg-gradient-to-r from-[#1A0B2E] to-[#4C1D95]">
            <div class="font-bold text-[15px] tracking-tight text-white">
                Smart <span class="text-purple-300">E-Learning</span>
            </div>
        </div>

        <!-- {{-- Course label (fixed) --}} -->
        <div class="px-5 pt-4 pb-2 shrink-0">
            <div class="text-[10px] font-bold uppercase tracking-wider text-purple-500">Course</div>
            <div class="text-[13px] font-bold text-gray-800 mt-0.5">{{ subject }}</div>
        </div>

        <div class="w-full h-px bg-gray-200 shrink-0"></div>

        <!-- {{-- Chapter list (scrollable only) --}} -->
        <ul class="topics-scroll w-full flex-1 min-h-0 overflow-y-auto flex flex-col text-[13px] py-1">

            <template
                v-for="link in links.filter(link => link.subjectName === subject)"
                :key="link.id"
            >

                <template v-if="link.nested === false">
                    <li v-if="link.linkName === activePage" class="px-5 py-[7px]  hover:bg-gray-50 bg-[#4C1D95]/10 text-[#4C1D95] font-semibold  cursor-pointer border-l-[3px] border-transparent">
                        <span class="text-purple-400 font-medium mr-1.5">{{ link.number }}.</span>{{ link.linkName }}
                    </li>
                    <li v-else class="px-5 py-[7px] text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] cursor-pointer border-l-[3px] border-transparent">
                        <span class="text-gray-400 font-medium mr-1.5">{{ link.number }}.</span>{{ link.linkName }}
                    </li>
                    
                </template>

                <template v-else>
                    <li>
                        <div class="px-5 py-[7px] flex items-center justify-between hover:text-[#4C1D95] text-gray-600   border-l-[3px] border-[#4C1D95] cursor-pointer">
                            <span><span class="text-gray-400 font-medium mr-1.5">{{ link.number }}.</span>{{ link.linkName }}</span>
                            <svg class="w-3 h-3 shrink-0 rotate-180" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <ul class="flex flex-col bg-[#FBFAFE] border-l-[3px] border-[#4C1D95]">
                            <template v-for="ntd in nested.filter(ntd => ntd.id === link.id)">
                                <li class="pl-9 pr-5 py-[6px] text-[12.5px] text-gray-500 hover:text-[#4C1D95] cursor-pointer">{{ ntd.linkName }}</li>
                                
                            </template>
                        </ul>
                    </li>
                </template>

            </template>
            

        </ul>

    </nav>

</template>

<script setup>

    const links = [
            {id: 1, number: 1, linkName: "Introduction to Discrete Math", subjectName: "Discrete Math", nested: false},
            {id: 2, number: 2, linkName: "Logic (Propositional Logic)", subjectName: "Discrete Math", nested: true},
            {id: 3, number: 3, linkName: "Methods of Proof", subjectName: "Discrete Math", nested: false},
            {id: 4, number: 4, linkName: "Sets", subjectName: "Discrete Math", nested: false},
            {id: 5, number: 5, linkName: "Relations", subjectName: "Discrete Math", nested: false},
            {id: 6, number: 6, linkName: "Functions", subjectName: "Discrete Math", nested: false},
            {id: 7, number: 7, linkName: "Counting Techniques", subjectName: "Discrete Math", nested: false},
            {id: 8, number: 8, linkName: "Number Theory", subjectName: "Discrete Math", nested: false},
    ]

    const nested = [
        {id: 2, linkName: "Statements & Propositions"},
        {id: 2, linkName: "Logic Operators"},
        {id: 2, linkName: "Truth Tables"},
        {id: 2, linkName: "Logical Equivalence"},
    ]

    const activePage = "Introduction to Discrete Math";

    const subject = 'Discrete Math';

</script>