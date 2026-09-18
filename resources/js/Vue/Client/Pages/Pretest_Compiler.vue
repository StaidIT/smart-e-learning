<template>
    <form @submit.prevent="submitCode" class="w-full max-w-2xl mb-[50px] bg-white rounded-2xl shadow-xl shadow-[#4C1D95]/5 border border-gray-100 flex flex-col gap-5 p-6">
        <div class="w-full flex flex-col gap-5">
            <div class="w-full flex flex-col gap-2 pb-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold text-gray-900">
                        Code <span class="text-[#4C1D95]">1</span>
                        <span class="text-gray-400 font-normal">/ 3</span>
                    </span>
                    <span class="text-xs font-medium text-[#4C1D95] bg-[#CECBF6]/25 px-2.5 py-1 rounded-full">
                        10% complete
                    </span>
                </div>

                <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-[#4C1D95] to-[#8B5CF6] rounded-full transition-all duration-300"
                        :style="{ width: `0%` }">
                    </div>
                </div>
            </div>

            <div class="flex">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold tracking-wide"
                    :class="question_type === 'code' ? 'text-[#4C1D95] bg-[#4C1D95]/8 border border-[#4C1D95]/15' : 'text-[#8B5CF6] bg-[#8B5CF6]/8 border border-[#8B5CF6]/15'">
                    Code
                </span>
            </div>

            <!-- ===================== Code compiler ===================== -->
            <div class="rounded-xl overflow-hidden border border-gray-200">

                <!-- Header: icon box + filename left, Run button right -->
                <div class="flex items-center justify-between gap-2 px-3 sm:px-4 py-2.5 sm:py-3 border-b border-gray-200 bg-gray-50">
                    <div class="flex items-center gap-2 sm:gap-3 min-w-0">
                        <div class="flex items-center justify-center shrink-0 w-8 h-8 sm:w-9 sm:h-9 rounded-md bg-[#F89820]/15 border border-[#F89820]/30">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 sm:size-5 text-[#B44D12]">
                                <path d="M8.851 18.56s-.917.534.653.714c1.902.218 2.874.187 4.969-.211 0 0 .552.346 1.321.646-4.699 2.013-10.633-.118-6.943-1.149M8.276 15.933s-1.028.762.542.924c2.032.209 3.636.227 6.413-.308 0 0 .384.389.987.602-5.679 1.661-12.007.13-7.942-1.218M13.116 11.475c1.158 1.333-.304 2.533-.304 2.533s2.939-1.518 1.589-3.418c-1.261-1.772-2.228-2.652 3.006-5.688 0 0-8.216 2.051-4.291 6.573M19.33 20.504s.679.559-.747.991c-2.712.822-11.288 1.069-13.669.033-.856-.373.75-.89 1.254-.998.527-.114.828-.093.828-.093-.953-.671-6.156 1.317-2.643 1.887 9.58 1.553 17.462-.7 14.977-1.82M9.292 13.21s-4.362 1.036-1.544 1.412c1.189.159 3.561.123 5.77-.062 1.806-.152 3.618-.477 3.618-.477s-.637.273-1.098.587c-4.429 1.166-12.986.623-10.522-.568 2.082-1.006 3.776-.892 3.776-.892M17.116 17.584c4.503-2.34 2.421-4.589.968-4.285-.355.074-.515.138-.515.138s.132-.207.385-.297c2.875-1.011 5.086 2.981-.928 4.562 0 0 .07-.063.09-.118M14.401 23.802c4.323.276 10.966-.153 11.122-2.2 0 0-.302.775-3.573 1.391-3.688.694-8.238.613-10.933.168 0 0 .552.456 3.384.641"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-medium text-gray-700 truncate">{{ fileName }}</span>
                    </div>

                    <div class="flex items-center shrink-0 gap-2">
                        <button
                            type="button"
                            class="flex items-center shrink-0 gap-1.5 text-xs font-semibold text-gray-700 bg-white border border-gray-300 px-2.5 sm:px-3.5 py-1.5 rounded-md hover:bg-gray-100 transition cursor-pointer justify-center"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-3.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 21a1.5 1.5 0 0 0 1.5-1.5V7.06a1.5 1.5 0 0 0-.44-1.06l-3.06-3.06A1.5 1.5 0 0 0 16.44 2.5H4.5A1.5 1.5 0 0 0 3 4v16.5A1.5 1.5 0 0 0 4.5 22h15Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 2.5V6a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V2.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 22v-7a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v7" />
                            </svg>
                            Save
                        </button>

                        <button
                            type="button"
                            @click="runCode"
                            :disabled="isRunning || isSubmitting"
                            class="flex items-center shrink-0 gap-1.5 text-xs font-semibold text-white bg-gradient-to-r from-[#8B5CF6] to-[#6D28D9] px-2.5 sm:px-3.5 py-1.5 rounded-md hover:brightness-110 transition disabled:opacity-70 disabled:cursor-not-allowed cursor-pointer min-w-[60px] sm:min-w-[72px] justify-center"
                        >
                            <svg
                                v-if="isRunning" class="animate-spin size-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" >
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            <svg
                                v-else xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="size-3.5" >
                                <path fill-rule="evenodd" d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653Z" clip-rule="evenodd" />
                            </svg>
                            {{ isRunning ? 'Running' : 'Run' }}
                        </button>
                    </div>
                </div>

                <!-- Activity -->
                <div class="px-3 sm:px-4 py-2.5 sm:py-3 border-b border-gray-200">
                    <p class="text-[10px] sm:text-[11px] uppercase tracking-wider font-semibold text-gray-400 pb-1.5">Activity</p>
                    <p class="text-[12px] sm:text-[13px] text-gray-700 whitespace-pre-wrap break-words">
                        {{ activity }}
                    </p>
                </div>

                <!-- Expected output -->
                <div class="px-3 sm:px-4 py-2.5 sm:py-3 border-b border-gray-200">
                    <p class="text-[10px] sm:text-[11px] uppercase tracking-wider font-semibold text-gray-400 pb-1.5">Expected Output</p>
                    <p class="text-[12px] sm:text-[13px] font-mono text-gray-700 whitespace-pre-wrap break-words">
                        {{ expectedOutput }}
                    </p>
                </div>

                <!-- Code Editor -->
                <div
                    ref="editorContainer"
                    class="w-full h-[160px] sm:h-[190px] md:h-[220px]"
                ></div>

                <!-- Output -->
                <div class="border-t border-gray-200 bg-gray-50 px-3 sm:px-4 py-2.5 sm:py-3">
                    <p class="text-[10px] sm:text-[11px] uppercase tracking-wider font-semibold text-gray-400 pb-1.5">Output</p>
                    <p
                        v-if="output"
                        class="text-[12px] sm:text-[13px] font-mono text-emerald-600 whitespace-pre-wrap break-words"
                    >
                        {{ output }}
                    </p>

                    <p
                        v-if="error"
                        class="text-[12px] sm:text-[13px] font-mono text-red-500 whitespace-pre-wrap break-words"
                    >
                        {{ error }}
                    </p>

                    <p
                        v-if="isRunning"
                        class="text-[12px] sm:text-[13px] font-mono text-gray-500"
                    >
                        Running...
                    </p>

                    <p
                        v-if="!output && !error && !isRunning"
                        class="text-[12px] sm:text-[13px] font-mono text-gray-400"
                    >
                        No output yet. Click "Run Code" to test.
                    </p>
                </div>

            </div>
            <!-- =================== end code compiler =================== -->

        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 mt-1">

            <button
                type="submit"
                :disabled="isSubmitting || isRunning"
                class="flex items-center justify-center gap-2 min-w-[140px] px-5 py-2 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-[#4C1D95] to-[#8B5CF6] hover:opacity-90 disabled:opacity-60 disabled:cursor-not-allowed transition-opacity shadow-sm shadow-[#4C1D95]/30 cursor-pointer"
            >
                <svg
                    v-if="isSubmitting" class="animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" >
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                </svg>
                {{ isSubmitting ? 'Submitting...' : 'Submit Code' }}
            </button>
        </div>
    </form>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import * as monaco from 'monaco-editor'

const question_type = 'code'

const props = defineProps({
    fileName: { type: String, default: 'Main.java' },
    activity: { type: String, default: 'Write a Java program that prints "Hello, learner!" to the console.' },
    expectedOutput: { type: String, default: 'Hello, learner!' },
    starterCode: {
        type: String,
        default: ''
    }
})

const emit = defineEmits(['submitted'])

let editor = null
const editorContainer = ref(null)

const code = ref(props.starterCode)
const output = ref('')
const error = ref('')
const isRunning = ref(false)
const isSubmitting = ref(false)

function csrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content')
}

const runCode = async () => {
    isRunning.value = true
    output.value = ''
    error.value = ''

    try {
        const response = await fetch('/compiler/run', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken(),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                code: code.value
            })
        })

        const data = await response.json()

        if (data.success) {
            output.value = data.output
        } else {
            error.value = data.output
        }
    } catch (err) {
        error.value = 'Unable to connect to the compiler.'
    } finally {
        isRunning.value = false
    }
}

const submitCode = async () => {
    if (isSubmitting.value) {
        return
    }

    isSubmitting.value = true
    error.value = ''

    try {
        const response = await fetch('/submitAnswer', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken(),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                code: code.value
            })
        })

        const data = await response.json()

        if (data.success) {
            emit('submitted', data)
        } else {
            error.value = data.message || 'Submission failed.'
        }
    } catch (err) {
        error.value = 'Unable to connect to the server.'
    } finally {
        isSubmitting.value = false
    }
}

onMounted(() => {
    self.MonacoEnvironment = {
        getWorker() {
            return new Worker(
                new URL('../../monaco-editor.worker.js', import.meta.url),
                {
                    type: 'module'
                }
            )
        }
    }
    const isSmallScreen = window.innerWidth < 640

    editor = monaco.editor.create(editorContainer.value, {
        value: code.value,
        language: 'java',
        theme: 'vs',
        automaticLayout: true,
        fontSize: isSmallScreen ? 12 : 13,
        lineHeight: isSmallScreen ? 18 : 20,
        minimap: {
            enabled: false
        },
        padding: {
            top: 16,
            bottom: 16
        },
        scrollBeyondLastLine: false,
        wordWrap: 'on',
        tabSize: 4,
        insertSpaces: true
    })

    editor.onDidChangeModelContent(() => {
        code.value = editor.getValue()
    })
})

onBeforeUnmount(() => {
    if (editor) {
        editor.dispose()
    }
})
</script>