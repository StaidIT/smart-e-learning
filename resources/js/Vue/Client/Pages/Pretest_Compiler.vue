<template>

    <form
        @submit.prevent="submitCode"
        class="w-full max-w-2xl mb-[50px] bg-white rounded-2xl shadow-xl shadow-[#4C1D95]/5 border border-gray-100 flex flex-col gap-5 p-6"
    >

        <div v-if="question" class="w-full flex flex-col gap-5">

            <div class="w-full flex flex-col gap-2 pb-4 border-b border-gray-200">

                <div class="flex items-center justify-between">

                    <span class="text-lg font-semibold text-gray-900">
                        Code
                        <span class="text-[#4C1D95]">
                            {{ questionNumber }}
                        </span>
                        <span class="text-gray-400 font-normal">
                            / {{ totalQuestions }}
                        </span>
                    </span>

                    <span class="text-xs font-medium text-[#4C1D95] bg-[#CECBF6]/25 px-2.5 py-1 rounded-full">
                        {{ progressPercentage }}% complete
                    </span>

                </div>

                <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">

                    <div
                        class="h-full bg-gradient-to-r from-[#4C1D95] to-[#8B5CF6] rounded-full transition-all duration-300"
                        :style="{ width: `${progressPercentage}%` }"
                    ></div>

                </div>

            </div>

            <div class="flex">

                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold tracking-wide text-[#4C1D95] bg-[#4C1D95]/8 border border-[#4C1D95]/15"
                >
                    Code
                </span>

            </div>

            <div class="rounded-xl overflow-hidden border border-gray-200">

                <div class="flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-2.5 sm:py-3 border-b border-gray-200 bg-gray-50 min-w-0">

                    <div class="flex items-center justify-center shrink-0 w-8 h-8 sm:w-9 sm:h-9 rounded-md bg-[#F89820]/15 border border-[#F89820]/30">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-4 sm:size-5 text-[#B44D12]"
                        >
                            <path d="M8.851 18.56s-.917.534.653.714c1.902.218 2.874.187 4.969-.211 0 0 .552.346 1.321.646-4.699 2.013-10.633-.118-6.943-1.149M8.276 15.933s-1.028.762.542.924c2.032.209 3.636.227 6.413-.308 0 0 .384.389.987.602-5.679 1.661-12.007.13-7.942-1.218M13.116 11.475c1.158 1.333-.304 2.533-.304 2.533s2.939-1.518 1.589-3.418c-1.261-1.772-2.228-2.652 3.006-5.688 0 0-8.216 2.051-4.291 6.573M19.33 20.504s.679.559-.747.991c-2.712.822-11.288 1.069-13.669.033-.856-.373.75-.89 1.254-.998.527-.114.828-.093.828-.093-.953-.671-6.156 1.317-2.643 1.887 9.58 1.553 17.462-.7 14.977-1.82M9.292 13.21s-4.362 1.036-1.544 1.412c1.189.159 3.561.123 5.77-.062 1.806-.152 3.618-.477 3.618-.477s-.637.273-1.098.587c-4.429 1.166-12.986.623-10.522-.568 2.082-1.006 3.776-.892 3.776-.892M17.116 17.584c4.503-2.34 2.421-4.589.968-4.285-.355.074-.515.138-.515.138s.132-.207.385-.297c2.875-1.011 5.086 2.981-.928 4.562 0 0 .07-.063.09-.118M14.401 23.802c4.323.276 10.966-.153 11.122-2.2 0 0-.302.775-3.573 1.391-3.688.694-8.238.613-10.933.168 0 0 .552.456 3.384.641"/>
                        </svg>

                    </div>

                    <span class="text-xs sm:text-sm font-medium text-gray-700 truncate">
                        {{ fileName }}
                    </span>

                </div>

                <div class="px-3 sm:px-4 py-2.5 sm:py-3 border-b border-gray-200 bg-white">

                    <p class="text-[10px] sm:text-[11px] uppercase tracking-wider font-bold text-gray-600 pb-1.5">
                        Activity
                    </p>

                    <p class="text-[12px] sm:text-[13px] text-gray-900 whitespace-pre-wrap break-words">
                        {{ question.question }}
                    </p>

                </div>

                <div
                    ref="editorContainer"
                    class="w-full h-[160px] sm:h-[190px] md:h-[220px]"
                ></div>

                <div class="flex items-center justify-end gap-3 px-3 sm:px-4 py-2.5 sm:py-3 border-t border-gray-200 bg-gray-50">

                    <button
                        type="button"
                        @click="runCode"
                        :disabled="isRunning || isSubmitting || isSubmitted"
                        class="flex items-center shrink-0 gap-1.5 text-xs sm:text-sm font-semibold text-white bg-gradient-to-r from-emerald-500 to-teal-600 px-3.5 sm:px-4 py-2 rounded-lg hover:brightness-110 transition disabled:opacity-70 disabled:cursor-not-allowed cursor-pointer min-w-[110px] sm:min-w-[140px] justify-center shadow-sm shadow-emerald-500/30"
                    >

                        <svg
                            v-if="isRunning"
                            class="animate-spin size-3.5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                class="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                stroke-width="4"
                            ></circle>

                            <path
                                class="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"
                            ></path>
                        </svg>

                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            class="size-3.5"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                clip-rule="evenodd"
                            />
                        </svg>

                        {{ isRunning ? 'Running Code' : 'Run Code' }}

                    </button>

                    <button
                        v-if="!isSubmitted"
                        type="submit"
                        :disabled="isSubmitting || isRunning"
                        class="flex items-center justify-center gap-2 min-w-[110px] sm:min-w-[140px] px-4 sm:px-5 py-2 rounded-lg text-xs sm:text-sm font-semibold text-white bg-gradient-to-r from-[#4C1D95] to-[#8B5CF6] hover:opacity-90 disabled:opacity-60 disabled:cursor-not-allowed transition-opacity shadow-sm shadow-[#4C1D95]/30 cursor-pointer"
                    >

                        <svg
                            v-if="isSubmitting"
                            class="animate-spin w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                class="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                stroke-width="4"
                            />

                            <path
                                class="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"
                            />
                        </svg>

                        {{ isSubmitting ? 'Submitting...' : 'Submit Code' }}

                    </button>

                    <button
                        v-else-if="availableQuestions.length > 0"
                        type="button"
                        @click="nextQuestion"
                        class="flex items-center justify-center gap-2 min-w-[110px] sm:min-w-[140px] px-4 sm:px-5 py-2 rounded-lg text-xs sm:text-sm font-semibold text-white bg-gradient-to-r from-[#4C1D95] to-[#8B5CF6] hover:opacity-90 transition-opacity shadow-sm shadow-[#4C1D95]/30 cursor-pointer"
                    >
                        Next Question
                    </button>

                    <a
                        v-else
                        :href="`/result/coding/${url(subjectName)}/${subjectId}/${url(moduleName)}/${moduleId}`"
                        class="flex items-center justify-center gap-2 min-w-[110px] sm:min-w-[140px] px-4 sm:px-5 py-2 rounded-lg text-xs sm:text-sm font-semibold text-white bg-gradient-to-r from-[#4C1D95] to-[#8B5CF6] hover:opacity-90 transition-opacity shadow-sm shadow-[#4C1D95]/30"
                    >
                        Finish
                    </a>

                </div>

                <div class="border-t border-gray-200 grid grid-cols-1 sm:grid-cols-2">

                    <div class="px-3 sm:px-4 py-2.5 sm:py-3 border-b sm:border-b-0 sm:border-r border-gray-200 bg-white">

                        <p class="text-[10px] sm:text-[11px] uppercase tracking-wider font-bold text-gray-600 pb-1.5">
                            Expected Output
                        </p>

                        <div class="flex flex-col gap-3">

                            <div
                                v-for="(tc, index) in testCases"
                                :key="tc.id"
                                class="rounded-lg border border-gray-200 bg-gray-50 px-3 py-2"
                            >

                                <p class="text-[10px] sm:text-[11px] font-semibold text-gray-500 pb-1">
                                    Test Case {{ index + 1 }}
                                </p>

                                <p class="text-[12px] sm:text-[13px] font-mono text-gray-900 whitespace-pre-wrap break-words">
                                    {{ tc.expected_output }}
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="px-3 sm:px-4 py-2.5 sm:py-3 bg-white">

    <p class="text-[10px] sm:text-[11px] uppercase tracking-wider font-bold text-gray-600 pb-1.5">
        Output
    </p>

    <div class="flex flex-col gap-3">

        <!-- Error alert (now shown first) -->
        <div
            v-if="error"
            class="flex items-start gap-2 rounded-lg border border-red-200 bg-red-50 px-3 py-2.5"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="size-4 shrink-0 mt-0.5 text-red-500"
            >
                <path
                    fill-rule="evenodd"
                    d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                    clip-rule="evenodd"
                />
            </svg>

            <p class="text-[12px] sm:text-[13px] font-medium text-red-600 whitespace-pre-wrap break-words">
                {{ error }}
            </p>
        </div>

        <!-- General output -->
        <p
            v-if="output"
            class="text-[12px] sm:text-[13px] font-mono text-purple-600 whitespace-pre-wrap break-words"
        >
            {{ output }}
        </p>

        <!-- Status messages -->
        <p
            v-if="isSaving"
            class="text-[12px] sm:text-[13px] font-mono text-gray-500"
        >
            Saving Code...
        </p>

        <p
            v-else-if="isRunning"
            class="text-[12px] sm:text-[13px] font-mono text-gray-500"
        >
            Running Code...
        </p>

        <p
            v-if="isSubmitted"
            class="text-[12px] sm:text-[13px] font-mono text-emerald-600"
        >
            Code submitted successfully.
        </p>

        <!-- Test case results -->
        <div
            v-for="result in results"
            :key="result.test_case_order"
            class="rounded-lg border bg-white overflow-hidden"
            :class="result.passed ? 'border-emerald-200' : 'border-red-200'"
        >

            <div
                class="flex items-center justify-between gap-2 px-3 py-2"
                :class="result.passed ? 'bg-emerald-50' : 'bg-red-50'"
            >

                <div class="flex items-center gap-2 min-w-0">

                    <span class="text-xs sm:text-sm font-semibold text-gray-900 truncate">
                        Test Case {{ result.test_case_order }}
                    </span>

                    <span
                        v-if="result.is_hidden"
                        class="shrink-0 text-[10px] font-semibold text-[#4C1D95] bg-[#CECBF6]/25 border border-[#4C1D95]/15 px-2 py-0.5 rounded-full"
                    >
                        Hidden
                    </span>

                </div>

                <span
                    class="shrink-0 text-xs font-semibold"
                    :class="result.passed ? 'text-emerald-600' : 'text-red-500'"
                >
                    {{ result.passed ? '✓ Passed' : '✗ Failed' }}
                </span>

            </div>

            <div
                v-if="!(result.is_hidden && result.passed)"
                class="flex flex-col gap-3 px-3 py-2.5 border-t"
                :class="result.passed ? 'border-emerald-200' : 'border-red-200'"
            >

                <div>

                    <p class="text-[10px] sm:text-[11px] uppercase tracking-wider font-semibold text-gray-400 pb-1.5">
                        {{ result.passed ? 'Output' : 'Your Output' }}
                    </p>

                    <p class="text-[12px] sm:text-[13px] font-mono text-gray-900 whitespace-pre-wrap break-words">
                        {{ result.output || '(no output)' }}
                    </p>

                </div>

            </div>

        </div>

        <!-- Empty state -->
        <p
            v-if="!output && !error && !isRunning && !isSaving && !results.length && !isSubmitted"
            class="text-[12px] sm:text-[13px] font-mono text-gray-400"
        >
            No output yet. Click "Run Code" to test.
        </p>

    </div>

</div>

                </div>

            </div>

        </div>

        <div
            v-else
            class="text-center py-8 text-gray-600"
        >
            You have completed all available coding questions!
        </div>

    </form>

    <Toast
        :show="showToast"
        :message="message"
        @close="showToast = false"
    />

</template>

<script setup>

import { ref, computed, onMounted, onBeforeUnmount } from 'vue'
import Toast from '../../Admin/components/Toast.vue'
import * as monaco from 'monaco-editor'

const props = defineProps({
    questions: { type: Array, required: true },
    savedCodes: { type: Array, required: true },
    testCase: { type: Array, required: true },
    answeredQuestions: { type: Array, required: true },
    subjectId: { type: String, required: true },
    moduleId: { type: String, required: true },
    subjectName: { type: String, required: true },
    moduleName: { type: String, required: true },
    fileName: { type: String, default: 'Main.java' },
})

const answeredQuestionsIds = ref(
    props.answeredQuestions.map(q =>
        typeof q === 'object' ? q.question_id : q
    )
)

const availableQuestions = computed(() => {
    return props.questions.filter(
        q => !answeredQuestionsIds.value.includes(q.id)
    )
})

const totalQuestions = computed(() => {
    return props.questions.length
})

const questionNumber = ref(
    Math.max(1, answeredQuestionsIds.value.length + 1)
)

const progressPercentage = computed(() => {
    if (totalQuestions.value <= 0) {
        return 0
    }

    return Math.min(
        Math.round(
            ((questionNumber.value - 1) / totalQuestions.value) * 100
        ),
        100
    )
})

function getRandomQuestion() {

    if (availableQuestions.value.length === 0) {
        return null
    }

    const randomIndex = Math.floor(
        Math.random() * availableQuestions.value.length
    )

    return availableQuestions.value[randomIndex]
}

const question = ref(getRandomQuestion())

const testCases = computed(() => {
    return props.testCase.filter(
        tc => tc.question_id === question.value?.id
    )
})

const initialSavedCode = computed(() => {
    return props.savedCodes.find(
        sc => sc.question_id === question.value?.id
    )?.code || ''
})

const code = ref(initialSavedCode.value)

const emit = defineEmits(['submitted'])

let editor = null

const editorContainer = ref(null)

const output = ref('')
const error = ref('')
const results = ref([])

const isRunning = ref(false)
const isSaving = ref(false)
const isSubmitting = ref(false)
const isSubmitted = ref(false)

const showToast = ref(false)
const message = ref('')

function csrfToken() {
    return document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content')
}

function url(value) {
    return value.replace(/\s+/g, '_')
}

const saveCode = async (showNotification = true) => {

    isSaving.value = true

    try {

        const response = await fetch('/saveCode', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken(),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                question_id: question.value?.id,
                code: code.value
            })
        })

        const data = await response.json()

        if (!response.ok || !data.success) {
            throw new Error(data.message || 'Failed to save code.')
        }

        if (showNotification) {
            showToast.value = true
            message.value = data.message || 'Saved successfully.'
        }

        return true

    } catch (err) {

        console.error('Save Code Error:', err)

        if (showNotification) {
            error.value = err.message || 'An error occurred while saving.'
        }

        return false

    } finally {

        isSaving.value = false

    }
}

const runCode = async () => {

    if (isRunning.value || isSubmitting.value || isSubmitted.value) {
        return false
    }

    isRunning.value = true

    output.value = ''
    error.value = ''
    results.value = []

    const savedSuccessfully = await saveCode(false)

    if (!savedSuccessfully) {
        isRunning.value = false
        return false
    }

    try {

        const response = await fetch('/compiler/runPretest', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken(),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                question_id: question.value?.id,
                code: code.value
            })
        })

        const data = await response.json()

        if (!response.ok) {
            throw new Error(
                data.message || 'Execution failed on server.'
            )
        }

        results.value = data.results || []

        if (!data.success && results.value.length === 0) {
            error.value = data.message || 'Execution failed.'
        }

        const allPassed =
            results.value.length > 0 &&
            results.value.every(result => result.passed === true)

        return allPassed

    } catch (err) {

        console.error('Run Code Error:', err)

        error.value =
            err.message || 'Unable to connect to the compiler.'

        return false

    } finally {

        isRunning.value = false

    }
}

const submitCode = async () => {
    if (isSubmitting.value || isRunning.value || isSubmitted.value) {
        return
    }

        error.value = ''

    const allPassed =
        results.value.length > 0 &&
        results.value.every(result => result.passed === true)

    if (!allPassed) {
        if (results.value.length > 0) {
            error.value = 'All test cases must pass before submitting.'
        } else {
            error.value = 'Please run your code before submitting.'
        }

        return
    }

    isSubmitting.value = true

    try {
        const response = await fetch('/submitCode', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken(),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                question_id: question.value?.id,
                module_id: props.moduleId,
                subject_id: props.subjectId
            })
        })

        const data = await response.json()

        if (!response.ok || !data.success) {
            throw new Error(data.message || 'Submission failed.')
        }

        isSubmitted.value = true

        if (Array.isArray(data.answered_questions)) {
            answeredQuestionsIds.value = data.answered_questions.map(
                q => typeof q === 'object' ? q.question_id : q
            )
        } else if (!answeredQuestionsIds.value.includes(question.value.id)) {
            answeredQuestionsIds.value.push(question.value.id)
        }

        emit('submitted', data)
    } catch (err) {
        console.error('Submit Code Error:', err)
        error.value = err.message || 'Unable to submit code.'
    } finally {
        isSubmitting.value = false
    }
}

function nextQuestion() {

    output.value = ''
    error.value = ''
    results.value = []
    isSubmitted.value = false

    const next = getRandomQuestion()

    if (!next) {
        question.value = null
        return
    }

    questionNumber.value++

    question.value = next

    const savedCode =
        props.savedCodes.find(
            sc => sc.question_id === next.id
        )?.code || ''

    code.value = savedCode

    if (editor) {
        editor.setValue(code.value)
    }

}

onMounted(() => {

    self.MonacoEnvironment = {

        getWorker() {

            const workerUrl = new URL(
                '../../../monaco.worker.js',
                import.meta.url
            )

            const blob = new Blob(
                [`import(${JSON.stringify(workerUrl.href)})`],
                { type: 'text/javascript' }
            )

            return new Worker(
                URL.createObjectURL(blob),
                { type: 'module' }
            )
        }

    }

    const isSmallScreen = window.innerWidth < 640

    editor = monaco.editor.create(
        editorContainer.value,
        {
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
        }
    )

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