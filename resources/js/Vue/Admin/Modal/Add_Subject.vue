<template>


    <div
        v-if="showAddSubject"
        id="addTopic"
        class="fixed inset-0 w-screen h-screen bg-black/60 backdrop-blur-sm z-[99] flex items-center justify-center p-4"
    >
        <form
            @submit.prevent="addSubject"
            class="addSubjectCard relative w-[30%] min-w-[380px] max-w-[440px] bg-white rounded-2xl shadow-2xl shadow-black/30 ring-1 ring-black/5 flex flex-col p-6 gap-5"
        >

            <button
                type="button"
                aria-label="Close"
                @click="closeAdd"
                class="addSubjectClose absolute right-4 top-4 p-1.5 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18 18 6M6 6l12 12"
                    />
                </svg>
            </button>

            <div class="w-full flex items-start gap-3 pr-6">

                <div class="shrink-0 w-10 h-10 rounded-lg bg-[#8B5CF6]/10 flex items-center justify-center">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="#8B5CF6"
                        class="size-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.75a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5v.75h3.75a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75H4.5a.75.75 0 0 1-.75-.75V8.25a.75.75 0 0 1 .75-.75H8.25v-.75a1.5 1.5 0 0 1 1.5-1.5"
                        />
                    </svg>

                </div>

                <div class="flex flex-col gap-0.5">

                    <span class="text-lg font-semibold text-gray-900 leading-tight">
                        Add New Subject
                    </span>

                    <span class="text-sm text-gray-500">
                        Create a new subject for your students.
                    </span>

                </div>

            </div>

            <div class="w-full flex flex-col gap-1.5">
                <label
                    for="subject"
                    class="text-sm font-medium text-gray-700"
                >
                    Subject Name
                </label>

                <input
                    id="subject"
                    type="text"
                    placeholder="e.g. Discrete Mathematics"
                    v-model="subject_name"
                    autocomplete="off"
                    class="w-full px-3 py-2.5 text-sm outline-none border border-gray-300 bg-gray-50 rounded-lg
                        placeholder:text-gray-400 transition-all duration-150
                        focus:border-[#8B5CF6] focus:bg-white focus:ring-4 focus:ring-[#8B5CF6]/15
                        hover:border-gray-400"
                >
            </div>

            <div class="w-full flex gap-3 mt-1">
                <button
                    type="button"
                    @click="closeAdd"
                    class="addSubjectClose w-1/3 py-2.5 rounded-lg text-sm font-medium text-gray-600 border border-gray-300
                        hover:bg-gray-100 hover:border-gray-400 active:bg-gray-200 transition-colors cursor-pointer"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    :disabled="!subject_name.trim() || isSubmitting"
                    class="w-2/3 py-2.5 rounded-lg text-sm font-medium text-white bg-[#8B5CF6]
                        shadow-sm shadow-[#8B5CF6]/30
                        hover:bg-[#7C3AED] active:bg-[#6D28D9] transition-colors cursor-pointer
                        disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-[#8B5CF6]
                        flex items-center justify-center gap-1.5"
                >


                    <svg v-if="isSubmitting" class="animate-spin size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8V0C5.373 0 0 5.373 0 12h4Z"></path>
                    </svg>
                    {{ isSubmitting ? 'Adding...' : 'Add Subject' }}

                </button>
            </div>

        </form>
    </div>

    <Toast
        :show="showToast"
        :message="message"
        @close="showToast = false"
    />
</template>

<script setup>
import { ref } from 'vue'
import Toast from '../components/Toast.vue'

const props = defineProps({
    showAddSubject: { tpye: Boolean, default: false}
})

const subject_name = ref('')
const showToast = ref(false)
const message = ref('')

const isSubmitting = ref(false)

async function addSubject() {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content')

    if(isSubmitting.value) return;

    isSubmitting.value = true;

    try{
        const response = await fetch('/addSubject', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                subject_name: subject_name.value
            })
        })

        const data = await response.json()

        if (data.success) {
            const addSubjectModal = document.getElementById('addSubject')

            if (addSubjectModal) {
                addSubjectModal.style.display = 'none'
            }

            subject_name.value = ''
            message.value = data.message
            showToast.value = true
            emit('close-add')
        }
    }finally{
        isSubmitting.value = false;
    }
}

const emit = defineEmits(['close-add'])
function closeAdd(){
    emit('close-add')
}
</script>


<style scoped>

.addSubjectModal {
    animation: modal-fade-in 0.15s ease;
}

.addSubjectCard {
    animation: modal-pop-in 0.15s ease;
}

@keyframes modal-fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes modal-pop-in {
    from {
        opacity: 0;
        transform: scale(0.96) translateY(4px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

</style>