<template>
  <Transition name="modal-fade">
    <div
      v-if="showAddQuestion"
      id="addQuestion"
      class="fixed inset-0 w-screen h-screen bg-black/60 backdrop-blur-sm z-[99] flex items-center justify-center p-4"
    >
      <Transition name="modal-scale" appear>
        <form
          @submit.prevent="addQuestionForm(topicName, subjectName)"
          class="relative w-[30%] min-w-[380px] max-w-lg bg-white rounded-xl shadow-2xl shadow-black/30 flex flex-col p-6 gap-5 max-h-[90vh] overflow-y-auto scrollbar-thin"
        >
          <!-- CLOSE BUTTON -->
          <button
            type="button"
            @click="closeModal"
            aria-label="Close"
            class="absolute right-4 top-4 p-1.5 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer"
          >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5" >
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>

          <input type="hidden" v-model="topic_id">

          <div class="w-full flex flex-col gap-1 pr-6">
            <div class="flex items-center gap-3">
              <div class="shrink-0 w-10 h-10 rounded-full bg-violet-50 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#8B5CF6" class="size-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </div>
              <div class="flex flex-col gap-0.5">
                <span class="text-lg font-semibold text-gray-900">
                  Add New Question
                </span>
                <span class="text-sm text-gray-500">
                  Create a new question for your Students.
                </span>
              </div>
            </div>

            <div
              class="w-full flex flex-col gap-2 border-b border-gray-100 pb-2 mt-1"
            >
              <span class="font-semibold text-sm text-gray-700">
                Question Details
              </span>

              <div class="w-full flex items-center flex-wrap shrink-0 gap-2">
                <span
                  class="py-1 px-2.5 text-xs font-semibold shrink-0 text-blue-600 rounded-md border border-blue-200 bg-blue-50"
                >
                  {{ subjectName }}
                </span>

                <span
                  class="py-1 px-2.5 text-xs font-semibold shrink-0 text-yellow-600 rounded-md border border-yellow-200 bg-yellow-50"
                >
                  {{ topicName }}
                </span>
              </div>
            </div>

            <!-- QUESTION -->
            <div class="w-full flex flex-col gap-2 mt-3">
              <label
                for="question"
                class="text-sm font-medium text-gray-700"
              >
                Question
              </label>

              <input
                v-model="question"
                type="text"
                id="question"
                placeholder="Enter Question"
                class="w-full border border-gray-300 rounded-md p-2 outline-none text-sm bg-transparent placeholder:text-gray-400 focus:border-[#8B5CF6] focus:ring-2 focus:ring-[#8B5CF6]/20 transition-colors"
              >
            </div>

            <!-- QUESTION TYPE -->
            <div class="flex flex-col gap-1.5 py-3">
              <label
                for="quizType"
                class="text-sm font-medium text-gray-700"
              >
                Question Type
              </label>

              <div class="relative">
                <select
                  id="quizType"
                  v-model="selected_questionType"
                  class="w-full appearance-none rounded-md border border-gray-300 bg-white py-2 pl-3 pr-9 text-sm text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-[#8B5CF6]/40 focus:border-[#8B5CF6]
                    hover:border-gray-400 transition-colors cursor-pointer"
                >
                  <option value="">Select Question Type</option>
                  <option value="multipleChoice">Multiple Choice</option>
                  <option value="TorF">True or False</option>
                  <option value="identification">Identification</option>
                </select>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                </svg>
              </div>
            </div>

            <Transition name="mc-slide">
              <!-- MULTIPLE CHOICE -->
              <div
                v-if="mc"
                class="w-full flex flex-col gap-2 overflow-hidden rounded-lg border border-gray-200 bg-gray-50 p-4"
              >
                <div class="flex items-center justify-between">
                    <label class="text-sm font-medium text-gray-700">Multiple Choice</label>
                    <span class="text-xs text-gray-400">Select the correct answer</span>
                </div>

                <!-- A -->
                <div class="w-full flex flex-col gap-1">
                  <div class="w-full flex items-center gap-2">
                    <label
                      for="correct_a"
                      class="relative flex items-center justify-center w-9 h-9 shrink-0 rounded-md text-xs font-semibold cursor-pointer select-none transition-colors bg-white text-gray-600 border border-gray-300 hover:bg-gray-100 has-[:checked]:bg-[#8B5CF6] has-[:checked]:text-white has-[:checked]:border-[#8B5CF6]"
                    >
                      <input v-model="correct_choice"
                      @input="emptyChoiceAnswer = false"
                      type="radio" name="correct_choice" id="correct_a" value="A" class="sr-only">
                      A
                    </label>

                    <input
                      v-model="choices.A"
                      type="text"
                      placeholder="Enter Choice A"
                      @input="emptyChoices.A = false"
                      :class="[
                        'w-full border rounded-md p-2 outline-none text-sm bg-white placeholder:text-gray-400 focus:ring-2 transition-colors',
                        emptyChoices.A
                          ? 'border-red-400 bg-red-50/60 focus:border-red-400 focus:ring-red-400/20'
                          : 'border-gray-300 focus:border-[#8B5CF6] focus:ring-[#8B5CF6]/20'
                      ]"
                    >
                  </div>
                  <span v-if="emptyChoices.A" class="pl-11 text-xs text-red-500">This choice can't be empty</span>
                </div>

                <!-- B -->
                <div class="w-full flex flex-col gap-1">
                  <div class="w-full flex items-center gap-2">
                    <label
                      for="correct_b"
                      class="relative flex items-center justify-center w-9 h-9 shrink-0 rounded-md text-xs font-semibold cursor-pointer select-none transition-colors bg-white text-gray-600 border border-gray-300 hover:bg-gray-100 has-[:checked]:bg-[#8B5CF6] has-[:checked]:text-white has-[:checked]:border-[#8B5CF6]"
                    >
                      <input v-model="correct_choice" 
                      @input="emptyChoiceAnswer = false"
                      type="radio" name="correct_choice" id="correct_b" value="B" class="sr-only">
                      B
                    </label>

                    <input
                      v-model="choices.B"
                      type="text"
                      placeholder="Enter Choice B"
                      @input="emptyChoices.B = false"
                      :class="[
                        'w-full border rounded-md p-2 outline-none text-sm bg-white placeholder:text-gray-400 focus:ring-2 transition-colors',
                        emptyChoices.B
                          ? 'border-red-400 bg-red-50/60 focus:border-red-400 focus:ring-red-400/20'
                          : 'border-gray-300 focus:border-[#8B5CF6] focus:ring-[#8B5CF6]/20'
                      ]"
                    >
                  </div>
                  <span v-if="emptyChoices.B" class="pl-11 text-xs text-red-500">This choice can't be empty</span>
                </div>

                <!-- C -->
                <div class="w-full flex flex-col gap-1">
                  <div class="w-full flex items-center gap-2">
                    <label
                      for="correct_c"
                      class="relative flex items-center justify-center w-9 h-9 shrink-0 rounded-md text-xs font-semibold cursor-pointer select-none transition-colors bg-white text-gray-600 border border-gray-300 hover:bg-gray-100 has-[:checked]:bg-[#8B5CF6] has-[:checked]:text-white has-[:checked]:border-[#8B5CF6]"
                    >
                      <input v-model="correct_choice" 
                      @input="emptyChoiceAnswer = false"
                      type="radio" name="correct_choice" id="correct_c" value="C" class="sr-only">
                      C
                    </label>

                    <input
                      v-model="choices.C"
                      type="text"
                      placeholder="Enter Choice C"
                      @input="emptyChoices.C = false"
                      :class="[
                        'w-full border rounded-md p-2 outline-none text-sm bg-white placeholder:text-gray-400 focus:ring-2 transition-colors',
                        emptyChoices.C
                          ? 'border-red-400 bg-red-50/60 focus:border-red-400 focus:ring-red-400/20'
                          : 'border-gray-300 focus:border-[#8B5CF6] focus:ring-[#8B5CF6]/20'
                      ]"
                    >
                  </div>
                  <span v-if="emptyChoices.C" class="pl-11 text-xs text-red-500">This choice can't be empty</span>
                </div>

                <!-- D -->
                <div class="w-full flex flex-col gap-1">
                  <div class="w-full flex items-center gap-2">
                    <label
                      for="correct_d"
                      class="relative flex items-center justify-center w-9 h-9 shrink-0 rounded-md text-xs font-semibold cursor-pointer select-none transition-colors bg-white text-gray-600 border border-gray-300 hover:bg-gray-100 has-[:checked]:bg-[#8B5CF6] has-[:checked]:text-white has-[:checked]:border-[#8B5CF6]"
                    >
                      <input v-model="correct_choice" 
                      @input="emptyChoiceAnswer = false"
                      type="radio" name="correct_choice" id="correct_d" value="D" class="sr-only">
                      D
                    </label>

                    <input
                      v-model="choices.D"
                      type="text"
                      placeholder="Enter Choice D"
                      @input="emptyChoices.D = false"
                      :class="[
                        'w-full border rounded-md p-2 outline-none text-sm bg-white placeholder:text-gray-400 focus:ring-2 transition-colors',
                        emptyChoices.D
                          ? 'border-red-400 bg-red-50/60 focus:border-red-400 focus:ring-red-400/20'
                          : 'border-gray-300 focus:border-[#8B5CF6] focus:ring-[#8B5CF6]/20'
                      ]"
                    >
                  </div>
                  <span v-if="emptyChoices.D" class="pl-11 text-xs text-red-500">This choice can't be empty</span>
                </div>

                 <!-- EMPTY CORRECT ANSWER -->
                <div v-if="emptyChoiceAnswer" class="w-full flex items-start gap-2 rounded-md border border-red-200 bg-red-50 px-3 py-2.5 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-red-500 shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-8.99-3.75h.008v.008h-.008V8.25Z" />
                    </svg>
                    <div class="flex flex-col">
                        <span class="text-red-600 font-semibold text-xs">Assign Correct Answer!</span>
                        <span class="text-red-500 text-xs">Please assign the correct answer by choosing A, B, C, or D.</span>
                    </div>
                </div>
              </div>

              <!-- TRUE OR FALSE -->
              <div v-else-if="torf"
                class="w-full flex flex-col gap-2"
              >
                <span class="text-sm font-medium text-gray-700">
                  True or False
                </span>

                <div class="grid grid-cols-2 gap-3">
                  <!-- TRUE -->
                  <label
                    for="answer-true"
                    class="relative flex items-center justify-center h-12 rounded-lg border cursor-pointer select-none transition-colors
                      text-sm font-medium
                      border-gray-300 text-gray-700 hover:border-gray-400
                      has-[:checked]:border-violet-500 has-[:checked]:bg-violet-50 has-[:checked]:text-violet-700"
                  >
                    <input
                      v-model="correct_answer"
                      id="answer-true"
                      type="radio"
                      name="correct-answer"
                      value="True"
                      class="sr-only"
                    >
                    True
                  </label>

                  <!-- FALSE -->
                  <label
                    for="answer-false"
                    class="relative flex items-center justify-center h-12 rounded-lg border cursor-pointer select-none transition-colors
                      text-sm font-medium
                      border-gray-300 text-gray-700 hover:border-gray-400
                      has-[:checked]:border-violet-500 has-[:checked]:bg-violet-50 has-[:checked]:text-violet-700"
                  >
                    <input
                      v-model="correct_answer"
                      id="answer-false"
                      type="radio"
                      name="correct-answer"
                      value="False"
                      class="sr-only"
                    >
                    False
                  </label>
                </div>
              </div>

              <!-- IDENTIFICATION -->
              <div v-else-if="identification"
                class="w-full flex flex-col gap-2"
              >
                <label
                  for="identification"
                  class="text-sm font-medium text-gray-700"
                >
                  Identification
                </label>

                <input
                  v-model="correct_answer"
                  type="text"
                  id="identification"
                  placeholder="Enter Identification Answer"
                  class="w-full border border-gray-300 rounded-md p-2 outline-none text-sm bg-transparent placeholder:text-gray-400 focus:border-[#8B5CF6] focus:ring-2 focus:ring-[#8B5CF6]/20 transition-colors"
                >
              </div>
            </Transition>

          

          </div>

          <!-- BUTTONS -->
          <div class="w-full flex gap-3 mt-0.5">
            <button
              type="button"
              @click="closeModal"
              class="w-1/3 py-2.5 rounded-md text-sm font-medium text-gray-600 border border-gray-300 hover:bg-gray-100 transition-colors cursor-pointer"
            >
              Cancel
            </button>

            <button
              type="submit"
              :disabled="isSubmitting"
              class="w-2/3 py-2.5 rounded-md text-sm font-medium text-white bg-[#8B5CF6] hover:bg-[#7C3AED] active:bg-[#6D28D9] transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed flex items-center justify-center gap-2"
            >
              <svg v-if="isSubmitting" class="animate-spin size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8V0C5.373 0 0 5.373 0 12h4Z"></path>
              </svg>
              {{ isSubmitting ? 'Adding...' : 'Add Question' }}
            </button>
          </div>
        </form>
      </Transition>
    </div>
  </Transition>

  <Toast
        :show="showToast"
        :message="message"
        @close="showToast = false"
    />
</template>

<script setup>
import { ref, computed } from 'vue';
import Toast from '../components/Toast.vue';

const props = defineProps({
  showAddQuestion: {
    type: Boolean,
    default: false
  },

  topicName: {
    type: String,
    default: 'N/A'
  },

  subjectName: {
    type: String,
    default: 'N/A'
  },
  topicId: {
    type: Number,
    default: 1
  }
});

const topic_id = computed(() => props.topicId || 0);
const showToast = ref(false);
const message = ref('');
const isSubmitting = ref(false)

const emptyChoiceAnswer = ref(false);
const emptyChoices = ref({
  A: false,
  B: false,
  C: false,
  D: false
});

const emit = defineEmits(['close-add']);

const question = ref('');
const selected_questionType = ref('');

const correct_choice = ref('');
const correct_answer = ref('');

const choices = ref({
  A: '',
  B: '',
  C: '',
  D: ''
});

const mc = computed(() => {
  return selected_questionType.value === 'multipleChoice';
});

const torf = computed(() => {
  return selected_questionType.value === 'TorF';
});

const identification = computed(() => {
  return selected_questionType.value === 'identification';
});

function closeModal() {
  emit('close-add');
}


async function addQuestionForm(Sname, Tname) {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    emptyChoiceAnswer.value = correct_choice.value === '' && mc.value;

    if (mc.value) {
        emptyChoices.value = {
            A: choices.value.A === '',
            B: choices.value.B === '',
            C: choices.value.C === '',
            D: choices.value.D === ''
        };

        if (Object.values(emptyChoices.value).some(Boolean) || emptyChoiceAnswer.value) {
            return;
        }
    }

    if (isSubmitting.value) return;

    isSubmitting.value = true;
    

    try{
        const response = await fetch('/addQuestion', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                question: question.value,
                question_type: selected_questionType.value,
                correct_choice: correct_choice.value,
                correct_answer: correct_answer.value,
                choice_A: choices.value.A,
                choice_B: choices.value.B,
                choice_C: choices.value.C,
                choice_D: choices.value.D,
                topic_id: topic_id.value,

                subject_name : Sname,
                topic_name: Tname
            })
        });
        const data = await response.json();

        if (!response.ok) {
            console.log('Server errors:', data);
            return;
        }

        if (data.success) {
            showToast.value = true;
            message.value = data.message;
            emit('close-add');
        }

    }finally{
      isSubmitting.value = false
    }

    
}

</script>

<style scoped>
.mc-slide-enter-active,
.mc-slide-leave-active {
  transition: opacity 0.2s ease, max-height 0.25s ease, margin-top 0.25s ease;
  max-height: 260px;
}

.mc-slide-enter-from,
.mc-slide-leave-to {
  opacity: 0;
  max-height: 0;
  margin-top: -8px;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity 0.15s ease;
}
.modal-fade-enter-from,
.modal-fade-leave-to {
    opacity: 0;
}

.modal-scale-enter-active {
    transition: opacity 0.15s ease, transform 0.15s ease;
}
.modal-scale-enter-from {
    opacity: 0;
    transform: scale(0.96) translateY(4px);
}
</style>