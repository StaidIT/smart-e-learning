<template>
    <nav class="w-[280px] h-screen fixed top-0 left-0 bg-white border-r border-gray-200 flex flex-col overflow-hidden">

        <!-- Brand (fixed) -->
        <div class="w-full flex items-center h-[60px] px-5 border-b border-gray-200 shrink-0 bg-gradient-to-r from-[#1A0B2E] to-[#4C1D95]">

            <div class="font-bold text-[15px] tracking-tight text-white">
                Smart <span class="text-purple-300">E-Learning</span>
            </div>

        </div>

        <!-- Course label (fixed) -->
        <div class="px-5 pt-4 pb-2 shrink-0">

            <div class="text-[10px] font-bold uppercase tracking-wider text-purple-500">Course</div>
            <div class="text-[13px] font-bold text-gray-800 mt-0.5">{{ subjectName }}</div>

        </div>

        <div class="w-full h-px bg-gray-200 shrink-0"></div>

        <!-- Chapter list (scrollable only) -->
        <ul class="topics-scroll w-full flex-1 min-h-0 overflow-y-auto flex flex-col text-[13px] py-1">

            <template v-for="module in modules" :key="module.id">

                <!-- ACTIVE / EXPANDED MODULE (SHOW TOPICS) -->
                <li v-if="module.order === expandedModuleOrder" class="cursor-pointer">

                    <div @click="toggleModule(module.order)" class="px-5 py-[7px] flex items-center justify-between bg-[#4C1D95]/10 text-[#4C1D95] font-semibold border-l-[3px] border-[#4C1D95]">

                        <span>
                            <span class="text-purple-400 font-medium mr-1.5">
                                {{ module.order }}.
                            </span>
                            {{ module.module_name }}
                        </span>

                        <svg class="w-3 h-3 shrink-0 rotate-180" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>

                    </div>

                    <ul class="flex flex-col bg-[#FBFAFE] border-l-[3px] border-[#4C1D95]">

                        <template v-for="topic in topics.filter(topic => topic.module_id === module.id)" :key="topic.id">

                            <li
                                @click="scrollToTopic(topic.slug)"
                                :class="[
                                    'pl-9 pr-5 py-[6px] text-[12.5px] cursor-pointer transition-colors flex items-center gap-2',
                                    topic.slug === activeTopicSlug
                                        ? 'text-[#4C1D95] font-semibold'
                                        : 'text-gray-500 hover:text-[#4C1D95]'
                                ]"
                            >

                                <span :class="[
                                    'w-1 h-1 rounded-full shrink-0 transition-colors',
                                    topic.slug === activeTopicSlug
                                        ? 'bg-[#4C1D95]'
                                        : 'bg-transparent'
                                ]"></span>

                                {{ topic.topic_name }}

                            </li>

                        </template>

                    </ul>

                </li>

                <!-- COLLAPSED MODULE (HEADER ONLY) -->
                <li v-else class="cursor-pointer">

                    <div
                        @click="toggleModule(module.order)"
                        :class="[
                            'px-5 py-[7px] flex items-center justify-between border-l-[3px]',
                            module.order === activeModuleOrder
                                ? 'text-[#4C1D95] font-semibold border-transparent bg-[#4C1D95]/5'
                                : 'text-gray-600 hover:bg-gray-50 hover:text-[#4C1D95] border-transparent'
                        ]"
                    >

                        <span>
                            <span :class="module.order === activeModuleOrder ? 'text-purple-400' : 'text-gray-400'" class="font-medium mr-1.5">
                                {{ module.order }}.
                            </span>
                            {{ module.module_name }}
                        </span>

                        <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>

                    </div>

                </li>

            </template>

        </ul>

    </nav>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

const props = defineProps({
    modules: {
        type: Array,
        required: true
    },
    topics: {
        type: Array,
        required: true
    },
    subjectName: {
        type: String,
        required: true
    }
})

const firstTopic = props.topics[0] ?? null
const firstModule = firstTopic ? props.modules.find(module => module.id === firstTopic.module_id) : props.modules[0] ?? null
const activeTopicSlug = ref(firstTopic?.slug ?? null)
const activeModuleOrder = ref(firstModule?.order ?? null)
const expandedModuleOrder = ref(firstModule?.order ?? null)

let observer = null
let suppressObserver = false

function getScrollRoot() {
    return document.querySelector('main')
}

function getModuleFromTopic(topic) {
    if (!topic) return null
    return props.modules.find(module => module.id === topic.module_id) ?? null
}

function scrollToTopic(slug) {
    const el = document.getElementById(slug)
    const root = getScrollRoot()

    if (!el || !root) return

    const match = props.topics.find(topic => topic.slug === slug)

    if (match) {
        const module = getModuleFromTopic(match)
        activeTopicSlug.value = match.slug
        activeModuleOrder.value = module?.order ?? null
        expandedModuleOrder.value = module?.order ?? null
    }

    suppressObserver = true

    el.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    })

    window.clearTimeout(scrollToTopic._t)
    scrollToTopic._t = window.setTimeout(() => {
        suppressObserver = false
    }, 700)
}

function toggleModule(moduleOrder) {
    if (expandedModuleOrder.value === moduleOrder) {
        expandedModuleOrder.value = null
        return
    }

    expandedModuleOrder.value = moduleOrder

    const module = props.modules.find(module => module.order === moduleOrder)

    if (!module) return

    const first = props.topics.find(topic => topic.module_id === module.id)

    if (first) {
        scrollToTopic(first.slug)
    }
}

onMounted(() => {
    const scrollRoot = getScrollRoot()

    if (!scrollRoot) return

    observer = new IntersectionObserver(
        entries => {
            if (suppressObserver) return

            const visible = entries
                .filter(entry => entry.isIntersecting)
                .sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top)

            if (visible.length > 0) {
                const match = props.topics.find(topic => topic.slug === visible[0].target.id)

                if (match) {
                    const module = getModuleFromTopic(match)
                    activeTopicSlug.value = match.slug
                    activeModuleOrder.value = module?.order ?? null
                    expandedModuleOrder.value = module?.order ?? null
                }
            }
        },
        {
            root: scrollRoot,
            rootMargin: '-10% 0px -70% 0px',
            threshold: 0
        }
    )

    props.topics.forEach(topic => {
        const el = document.getElementById(topic.slug)

        if (el) {
            observer.observe(el)
        }
    })
})

onBeforeUnmount(() => {
    if (observer) {
        observer.disconnect()
    }
})
</script>