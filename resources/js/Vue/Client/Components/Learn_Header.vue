<template>

    <div class="shrink-0 bg-[#12081F] w-full h-[60px] border-b-[#2A1B4A] border-b-[1px] flex items-center justify-between text-white px-5">
        <div class="flex items-center">
            <a :href="homeUrl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                </svg>
            </a>
        </div>

        <div class="flex items-center justify-center font-bold text-xl">
            Discrete Mathematics
        </div>

        <button v-if="userMenu"
            type="button"
            
            class="py-2"
        >

            <span
                class="rounded-full w-8 h-8 cursor-pointer flex items-center justify-center font-semibold text-md"
                :class="profileColor"
            >
                {{ initials(userName) }}
            </span>

        </button>
        <button
            v-else
            type="button"
            class="py-2"
        >

            <span
                class="rounded-full w-8 h-8 cursor-pointer flex items-center justify-center font-semibold text-md"
                :class="profileColor"
            >
                {{ initials(userName) }}
            </span>

        </button>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    profileColor: {type: String, required:true},
    homeUrl: {type: String, required: true}
})

const userMenu = ref(false)
const userName = ref("Jimwell Raza")

function initials(name) {
    return name
        .split(' ')
        .filter(Boolean)
        .map(word => word[0])
        .join('')
        .slice(0, 2)
        .toUpperCase()
}

</script>