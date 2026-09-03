<template>
    <Transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="opacity-0 translate-x-4"
        enter-to-class="opacity-100 translate-x-0"
        leave-active-class="transition ease-in duration-200"
        leave-from-class="opacity-100 translate-x-0"
        leave-to-class="opacity-0 translate-x-4"
    >
        <div
            v-if="show"
            class="fixed top-5 right-5 z-[1000] w-[320px] rounded-xl overflow-hidden
                bg-white border border-black/5 shadow-lg shadow-black/20"
        >
            <div class="flex items-start gap-3 px-4 py-3.5">
                <div class="shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2.5"
                        stroke="#16A34A"
                        class="size-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m4.5 12.75 6 6 9-13.5"
                        />
                    </svg>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-gray-900">
                        Success
                    </p>

                    <p class="text-xs text-gray-500 mt-0.5">
                        {{ message }}
                    </p>
                </div>

                <button
                    type="button"
                    @click="close"
                    class="shrink-0 text-gray-400 hover:text-gray-700 transition-colors mt-0.5"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="size-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18 18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>

            <div class="h-[3px] w-full bg-green-100">
                <div
                    class="h-full bg-green-500"
                    :class="{ 'transition-none': !cooldownActive }"
                    :style="{
                        width: cooldownActive ? '0%' : '100%',
                        transitionProperty: cooldownActive ? 'width' : 'none',
                        transitionDuration: cooldownActive ? '3000ms' : '0ms',
                        transitionTimingFunction: 'linear'
                    }"
                />
            </div>
        </div>
    </Transition>
</template>

<script setup>
import { watch, ref, nextTick } from 'vue'

const props = defineProps({
    show: Boolean,
    message: String
})

const emit = defineEmits(['close'])

const cooldownActive = ref(false)

function close() {
    emit('close')
}

watch(
    () => props.show,
    async (value) => {
        if (value) {
            cooldownActive.value = false
            await nextTick()
            requestAnimationFrame(() => {
                cooldownActive.value = true
            })

            setTimeout(() => {
                emit('close')
            }, 3000)
        } else {
            cooldownActive.value = false
        }
    }
)
</script>