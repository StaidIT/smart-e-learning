<template>

    <header class="fixed top-0 shrink-0 z-10 w-full h-[80px] flex items-center justify-between text-white px-4 sm:px-6 border-b border-[#CECBF6]/15 bg-[#CECBF6]/6 backdrop-blur-lg">
        <button
            type="button"
            @click="goBack"
            aria-label="Go back"
            class="group relative flex items-center justify-center size-10 rounded-full text-white/90 hover:text-white hover:bg-[#CECBF6]/10 active:bg-[#CECBF6]/15 transition-colors duration-150 cursor-pointer"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 transition-transform duration-150 group-active:-translate-x-0.5">
                <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
            </svg>
        </button>

        <div class="flex flex-col items-center justify-center min-w-0 px-2">
            <span class="text-white font-semibold text-sm sm:text-base leading-tight truncate max-w-[60vw] sm:max-w-none">
                Discrete Mathematics
            </span>
            <span class="text-[#CECBF6]/60 text-xs mt-0.5 tracking-wide truncate max-w-[60vw] sm:max-w-none">
                Work through each module in order. Pass a quiz to unlock the next one on the list.
            </span>
        </div>

        <button class="flex items-center justify-center">
            <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold"> JL</div>
        </button>
    </header>

</template>

<script setup>
function goBack(){
    window.history.back();
}
</script>