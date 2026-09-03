<template>

    <template v-for="subject in props.subjects" :key="subject.id">

        <section
            :id="subject.slug"
            class="w-full h-auto min-h-[calc(100dvh-100px)] rounded-xl shrink-0 p-3 text-white my-5"
        >

            <div class="flex items-center justify-between">

                <h1 class="font-bold text-3xl">
                    {{ subject.subject_name }}
                </h1>

                <div class="text-xs font-semibold">

                    <a
                        :href="`/questions/${subject.subject_name.toLowerCase().replace(/\s+/g, '-')}/All/${subject.id}`"
                        class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-md text-xs font-medium
                        bg-[#8B5CF6]/20 border-[1.5px] border-[#8B5CF6]/35 text-[#CECBF6]
                        hover:bg-[#8B5CF6]/30 hover:border-[#8B5CF6]/50
                        active:scale-95 transition-all cursor-pointer"
                    >

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        View All Questions

                    </a>

                </div>

            </div>

            <div class="w-full py-2 ps-2 flex gap-3 text-gray-400 font-semibold">

                <div class="flex items-center gap-1.5">
                    <span>Topics</span>
                    <span>•</span>
                    <span>12</span>
                </div>

                <span class="text-white font-bold">|</span>

                <div class="flex items-center gap-1.5">
                    <span>Questions</span>
                    <span>•</span>
                    <span>50</span>
                </div>

            </div>

            <div class="grid md:grid-cols-2 grid-cols-1 gap-y-3 gap-x-6 py-5">

                <!-- ADD NEW TOPIC -->

                <button
                    type="button"
                    @click="openAddTopic(subject)"
                    :class="[
                        'group flex flex-col items-center justify-center gap-2 text-gray-500 border-dashed border-[1.5px] border-gray-600/60 bg-gray-800/10 rounded-md cursor-pointer p-4 transition-all hover:bg-gray-800/30 hover:border-gray-500 hover:text-gray-300',

                        props.topics.filter(topic => topic.subject_id === subject.id).length === 0
                            ? 'col-span-3 min-h-[300px] text-2xl'
                            : ''
                    ]"
                >

                    <div
                        class="border-dashed p-1.5 border-[1.5px] border-gray-600/60 rounded-lg transition-colors group-hover:border-gray-500"
                    >

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                    </div>

                    <span class="text-xs font-semibold">
                        Add New Topic
                    </span>

                </button>


                <!-- TOPICS -->

                <template
                    v-for="(topic, index) in props.topics.filter(topic => topic.subject_id === subject.id)"
                    :key="topic.id"
                >

                    <div
                        class="group flex flex-col gap-3 border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 backdrop-blur-sm p-4 rounded-md transition-all hover:border-[#CECBF6]/30 hover:bg-[#CECBF6]/10"
                    >

                        <div class="flex items-center justify-between gap-3">

                            <div class="flex flex-col gap-2 min-w-0">

                                <span class="text-white text-base font-bold leading-snug truncate">
                                    {{ index + 1 }}. {{ topic.topic_name }}
                                </span>

                                <template v-if="props.questions.filter(q => q.topic_id === topic.id).length === 0 ">
                                    <div class="flex items-center gap-2 text-[11px] text-gray-400 font-semibold">
                                        <span>No Question Available. </span>
                                    </div>
                                </template>
                                <template v-else-if="props.questions.filter(q => q.topic_id === topic.id).length === 1">
                                    <div class="flex items-center gap-2 text-[11px] text-gray-400 font-semibold">
                                        <span> {{ props.questions.filter(q => q.topic_id === topic.id).length }} Question</span>
                                    </div>
                                </template>

                                <template v-else-if="props.questions.filter(q => q.topic_id === topic.id).length >= 2 ">
                                    <div class="flex items-center gap-2 text-[11px] text-gray-400 font-semibold">
                                        <span> {{ props.questions.filter(q => q.topic_id === topic.id).length }} Questions</span>
                                    </div>
                                </template>

                            </div>

                            <div
                                class="shrink-0 w-8 h-8 bg-[#8B5CF6]/15 border border-[#CECBF6]/15 text-[#CECBF6] flex items-center justify-center rounded-md"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>

                            </div>

                        </div>

                        <div class="w-full h-[1px] bg-[#CECBF6]/10"></div>

                        <div class="flex items-center gap-2">

                            
                            <a    :href="`/questions/${subject.subject_name.toLowerCase().replace(/\s+/g, '-')}/${topic.topic_name.toLowerCase().replace(/\s+/g, '-')}/${topic.id}`"
                                class="flex-1 flex items-center justify-center gap-1.5 text-xs font-semibold px-2.5 py-2 rounded-md
                                bg-[#8B5CF6]/15 border border-[#8B5CF6]/30 text-[#CECBF6]
                                hover:bg-[#8B5CF6]/25 hover:border-[#8B5CF6]/45
                                active:scale-95 transition-all cursor-pointer"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                View Questions

                            </a>

                            <button
                                type="button"
                                @click="openEditTopic(topic)"
                                class="shrink-0 w-9 h-9 flex items-center justify-center rounded-md border-[1.5px] border-[#CECBF6]/15 text-gray-300
                                hover:bg-[#CECBF6]/10 hover:border-[#CECBF6]/30 hover:text-white
                                active:scale-95 transition-all cursor-pointer"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                </svg>

                            </button>

                            <button
                                type="button"
                                @click="openDeleteTopic(topic.topic_name, topic.id, subject.subject_name)"
                                class="shrink-0 w-9 h-9 flex items-center justify-center rounded-md border-[1.5px] border-red-500/20 text-red-400
                                hover:bg-red-500/10 hover:border-red-500/35 hover:text-red-300
                                active:scale-95 transition-all cursor-pointer"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </button>

                        </div>

                    </div>

                </template>

            </div>

        </section>


        <!-- SEPARATOR -->

        <div class="w-full flex items-center justify-center pt-[30px] mt-5 mb-5">

            <div class="bg-gray-600 w-[80%] h-[1px]"></div>

        </div>

    </template>


    <!-- ADD TOPIC MODAL -->

    <Add_Topics
        :show-add-topic="showAddTopic"
        :subject-id="selectedSubjectId"
        :subject-name="selectedSubjectName"
        @close="closeAddTopic"
    />

    <Edit_Topic
        :show-edit-topic="showEditTopic"
        :topic-data="selectedEditTopic"
        @close="closeEditTopic"
    />

    <Delete_Topic
        :show-delete-topic="showDeleteTopic"
        :topic-name="topic_name"
        :total-questions="total_topic_question"
        :topic-id="selectedDeleteTopic_id"
        :subject-name="subject_name"
        @close="closeDeleteTopic"
    />

</template>


<script setup>

import { ref } from 'vue'
import Add_Topics from '../../Modal/Add_Topics.vue'
import Edit_Topic from '../../Modal/Edit_Topic.vue'
import Delete_Topic from '../../Modal/Delete_Topic.vue'


const props = defineProps({
    subjects: {
        type: Array,
        required: true
    },
    topics: {
        type: Array,
        required: true
    },
    questions: {
        type: Array,
        required: true
    }
})

const showAddTopic = ref(false)
const selectedSubjectId = ref(null)
const selectedSubjectName = ref('')

const total_topic_question = ref(0)
const topic_name = ref('')
const subject_name = ref('')
const showEditTopic = ref(false)
const selectedEditTopic = ref(null)

function openAddTopic(subject) {
    selectedSubjectId.value = subject.id
    selectedSubjectName.value = subject.subject_name
    showAddTopic.value = true
}

function closeAddTopic() {
    showAddTopic.value = false
    selectedSubjectId.value = null
    selectedSubjectName.value = ''
}


function openEditTopic(topic) {
    selectedEditTopic.value = topic
    showEditTopic.value = true
}

function closeEditTopic() {
    showEditTopic.value = false
    selectedEditTopic.value = null
}


const showDeleteTopic = ref(false)
const selectedDeleteTopic_id = ref(null)

function openDeleteTopic(topicName, topicId, subjectName) {
    selectedDeleteTopic_id.value = topicId
    topic_name.value = topicName
    subject_name.value = subjectName

    total_topic_question.value = props.questions.filter(
        q => q.topic_id === topicId
    ).length

    showDeleteTopic.value = true
}

function closeDeleteTopic() {
    showDeleteTopic.value = false
    selectedDeleteTopic_id.value = null
    topic_name.value = ''
    total_topic_question.value = 0
}

</script>