{{-- SIDE NAVIGATION --}}
<nav class="w-[280px] h-screen fixed top-0 left-0 bg-white border-r border-gray-200 flex flex-col overflow-hidden">

    {{-- Brand (fixed) --}}
    <div class="w-full flex items-center h-[60px] px-5 border-b border-gray-200 shrink-0 bg-gradient-to-r from-[#1A0B2E] to-[#4C1D95]">
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