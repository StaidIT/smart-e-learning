<template>
    <nav
        class="w-full flex items-center justify-between gap-2 sticky top-0 border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 backdrop-blur-sm z-10 font-semibold text-white py-2.5 px-3 sm:py-3 sm:px-4"
    >
        <ul class="flex-1 min-w-0 flex gap-4 sm:gap-6 overflow-x-auto scrollbar-hidden">
            <li v-for="link in localSubject" :key="link.id" class="shrink-0">
                <a
                    :href="`#${link.slug}`"
                    @click.prevent="scrollToSection(link.slug)"
                    :class="[
                        'block transition-colors duration-200 text-[10px] sm:text-xs whitespace-nowrap',
                        activeSection === link.slug
                            ? 'text-white'
                            : 'text-white/40 hover:text-white'
                    ]"
                >
                    {{ link.subject_name }}
                </a>
            </li>
        </ul>

        <div class="shrink-0 flex items-center">
            <button
                type="button"
                @click="addSubjectOpen()"
                class="flex items-center justify-center gap-1.5 bg-white text-black rounded-md font-bold text-xs whitespace-nowrap cursor-pointer
                    h-8 w-8 sm:h-9 sm:w-auto sm:px-4
                    transition-all duration-200
                    hover:bg-[#CECBF6] hover:text-[#1A0B2E]
                    active:scale-95
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#CECBF6]/60 focus-visible:ring-offset-2 focus-visible:ring-offset-[#090014]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2.5"
                    stroke="currentColor"
                    class="size-3.5 shrink-0"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4.5v15m7.5-7.5h-15"
                    />
                </svg>

                <span class="hidden sm:inline">Add Subject</span>
            </button>
        </div>
    </nav>

    <Add_Subject
    :show-add-subject="addSubject"
    @close-add="closeAdd"
    @new-subject="handleNewSubjects"
    />
</template>

<script setup>
import { ref, nextTick, onMounted, onBeforeUnmount } from 'vue'
import Add_Subject from '../Modal/Add_Subject.vue'

const props = defineProps({
    subjects: {
        type: Array,
        required: true
    }
})

const emit = defineEmits(['subject-added'])

const activeSection = ref('discrete-mathematics')
const localSubject = ref([...props.subjects])
const addSubject = ref(false)

let observer = null
let isClickScrolling = false
let scrollEndTimer = null
let closeButtons = []

function handleNewSubjects(newSubject) {
    if (!newSubject) return

    const exists = localSubject.value.some(
        subject => String(subject.id) === String(newSubject.id)
    )

    if (!exists) {
        localSubject.value.push(newSubject)
    }

    emit('subject-added', newSubject)

    nextTick(() => {
        observeSections()

        if (newSubject.slug) {
            setTimeout(() => {
                scrollToSection(newSubject.slug)
            }, 100)
        }
    })
}

function getScrollParent() {
    return document.querySelector('main.overflow-y-auto') || document.documentElement
}

function scrollToSection(slug) {
    const section = document.getElementById(slug)
    const scrollParent = getScrollParent()

    if (!section || !scrollParent) return

    activeSection.value = slug
    isClickScrolling = true

    const stickyElement = document.querySelector('.sticky')
    const stickyOffset = stickyElement?.offsetHeight || 0

    const parentRect = scrollParent.getBoundingClientRect()
    const sectionRect = section.getBoundingClientRect()

    const targetTop =
        scrollParent.scrollTop +
        (sectionRect.top - parentRect.top) -
        stickyOffset -
        12

    scrollParent.scrollTo({
        top: targetTop,
        behavior: 'smooth'
    })

    clearTimeout(scrollEndTimer)

    scrollEndTimer = setTimeout(() => {
        isClickScrolling = false
    }, 600)
}

function observeSections() {
    observer?.disconnect()

    observer = new IntersectionObserver(
        entries => {
            if (isClickScrolling) return

            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    activeSection.value = entry.target.id
                }
            })
        },
        {
            root: getScrollParent(),
            rootMargin: '-80px 0px -60% 0px',
            threshold: 0
        }
    )

    localSubject.value.forEach(subject => {
        const section = document.getElementById(subject.slug)

        if (section) {
            observer.observe(section)
        }
    })
}

function addSubjectOpen() {
    addSubject.value = true
}

function closeAdd() {
    addSubject.value = false
}

onMounted(() => {
    nextTick(() => {
        observeSections()
    })
})

onBeforeUnmount(() => {
    observer?.disconnect()

    clearTimeout(scrollEndTimer)

    closeButtons.forEach(button => {
        button.replaceWith(button.cloneNode(true))
    })

    closeButtons = []
})
</script>

<style scoped>
.scrollbar-hidden {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.scrollbar-hidden::-webkit-scrollbar {
    display: none;
}
</style>