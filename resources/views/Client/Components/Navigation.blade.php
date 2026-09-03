<nav class="w-full h-[60px] md:h-[80px] fixed top-0 left-0 z-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-2xl h-[50px] flex items-center justify-between px-4 sm:px-6 md:rounded-full shadow-xs shadow-gray-200">

        <div class="font-bold text-[15px] tracking-tight">
            Smart <span class="text-blue-600">E-Learning</span>
        </div>

        {{-- Desktop menu --}}
        <ul class="hidden md:flex items-center justify-center gap-4 text-[13px] font-semibold text-gray-600">
            <li>
                <a href="" class="text-blue-600 relative">
                    Home
                </a>
            </li>
            <li>
                <a href="" class="hover:text-blue-600 transition-colors">Subjects</a>
            </li>
            <li>
                <a href="" class="hover:text-blue-600 transition-colors">Code</a>
            </li>
            <li>
                <a href="" class="hover:text-blue-600 transition-colors">Leaderboard</a>
            </li>
            
            <button 
                type="button"
                id="logout"
                class="py-2">
                <span class="bg-purple-800 rounded-full w-8 h-8 cursor-pointer flex items-center justify-center font-semibold text-lg text-white">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
            </button>
        </ul>

    </div>
</nav>