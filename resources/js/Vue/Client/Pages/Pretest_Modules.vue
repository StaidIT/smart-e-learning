<template>
    <section class="w-full pt-8 sm:pt-10 px-4 flex flex-col items-center justify-center">
        <div class="flex flex-col items-center gap-1 pb-6 sm:pb-8 text-center">
            <span class="font-bold text-3xl sm:text-4xl">MODULES</span>
            <p class="text-xs font-semibold text-gray-500">Complete them in order to unlock the next</p>
        </div>

        <!-- EMPTY STATE  -->
        <div v-if="sorteduserModules.length === 0" class="w-full sm:w-[90%] lg:w-[60%] flex flex-col items-center gap-4 p-6 sm:p-10 rounded-3xl border-[1.5px] border-dashed border-[#CECBF6]/15 bg-[#CECBF6]/[0.03] text-center">
            <div class="size-14 flex items-center justify-center rounded-full bg-[#090014] border-[1.5px] border-[#CECBF6]/20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#CECBF6]/60">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
            </div>
            <div>
                <h3 class="text-base font-bold leading-snug">No modules yet</h3>
                <p class="text-sm font-medium text-gray-500 mt-1">Modules for this subject haven't been added yet. Check back soon.</p>
            </div>
        </div>

        <ul v-else class="relative w-full sm:w-[90%] lg:w-[60%] flex flex-col gap-5">
            <div class="absolute left-6 sm:left-7 top-6 sm:top-7 bottom-6 sm:bottom-7 w-px bg-[#CECBF6]/15"></div>

            <li v-for="(userModule, index) in sorteduserModules" :key="userModule.id" class="relative flex items-center gap-3 sm:gap-4 z-10">


                
                <!-- PASSED -->
                <div v-if="userModule.status === 'passed'" class="relative size-12 sm:size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014] border-2 border-[#CECBF6]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="#CECBF6" class="size-5 sm:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <div v-if="userModule.status === 'passed'" class="flex-1 min-w-0 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 sm:p-5 rounded-2xl sm:rounded-3xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 hover:border-[#CECBF6]/40 hover:bg-[#CECBF6]/10 transition-all duration-300">
                    <div class="min-w-0">
                        <h3 class="text-sm sm:text-base font-bold leading-snug truncate">{{ moduleName(userModule.module_id) }}</h3>
                        {{ cl(moduleQuestionCount(userModule.module_id)) }}
                        <p v-if="moduleQuestionCount(userModule.module_id) > 1" class="text-sm font-medium text-gray-500">{{ moduleQuestionCount(userModule.module_id)  }} {{ moduleQuestionCount(userModule.module_id) <=1 ? 'Question' : 'Questions' }}</p>
                        <p v-else class="text-sm font-medium text-gray-500">No Question Available</p>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <span v-if="hasQuestionType(userModule.module_id) && userModule.questions_type_passed" class="inline-flex items-center gap-1.5 text-center text-xs sm:text-sm font-bold text-[#CECBF6] bg-[#CECBF6]/10 border-[1.5px] border-[#CECBF6]/30 rounded-full py-2 sm:py-2.5 px-4 sm:px-6 whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-3.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            Question Type Passed
                        </span>
                        <span v-if="hasCoding(userModule.module_id) && userModule.coding_passed" class="inline-flex items-center gap-1.5 text-center text-xs sm:text-sm font-bold text-[#CECBF6] bg-[#CECBF6]/10 border-[1.5px] border-[#CECBF6]/30 rounded-full py-2 sm:py-2.5 px-4 sm:px-6 whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-3.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            Coding Passed
                        </span>
                    </div>
                    
                </div>



                <!-- CURRENT -->
                <div v-if="userModule.status === 'current'" class="relative size-12 sm:size-14 shrink-0 flex items-center justify-center rounded-full bg-[#CECBF6]">
                    <span class="text-sm sm:text-[15px] font-bold text-[#090014]">{{ index + 1 }}</span>
                </div>
                <div v-if="userModule.status === 'current'" class="flex-1 min-w-0 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 sm:p-5 rounded-2xl sm:rounded-3xl border-[1.5px] border-[#CECBF6]/50 bg-[#CECBF6]/12">
                    <div class="min-w-0">
                        <h3 class="text-sm sm:text-base font-bold leading-snug truncate">{{ moduleName(userModule.module_id) }}</h3>
                        <p v-if="moduleQuestionCount(userModule.module_id) > 1" class="text-sm font-medium text-gray-400">{{ moduleQuestionCount(userModule.module_id)  }} {{ moduleQuestionCount(userModule.module_id) <=1 ? 'Question' : 'Questions' }}</p>
                        <p v-else class="text-sm font-medium text-gray-400">No Questions Available</p>
                    </div>
                    <div class="flex flex-wrap gap-2">

                        <!-- HAS QUESTION TYPE -->
                        <template v-if="hasQuestionType(userModule.module_id)">
                            <!-- QUeSTION TYPE PASSED -->
                            <span v-if="userModule.questions_type_passed" class="inline-flex items-center gap-1.5 text-center text-xs sm:text-sm font-bold text-[#CECBF6] bg-[#CECBF6]/10 border-[1.5px] border-[#CECBF6]/30 rounded-full py-2 sm:py-2.5 px-4 sm:px-6 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Question Types Passed
                            </span>
                            <!-- QUESTION TPYE ON GOING -->
                            <a 
                                v-else
                                :href="`/takingPretest/${url(subjectName)}/${subjectId}/${url(moduleName(userModule.module_id))}/${userModule.module_id}/`" 
                                class="text-center text-xs sm:text-sm font-bold text-[#090014] bg-[#CECBF6] rounded-full py-2 sm:py-2.5 px-4 sm:px-6 transition-colors hover:bg-[#CECBF6]/85 whitespace-nowrap">
                                {{ linkText(userModule.module_id) === 0 ? 'Start Answering' : 'Continue Answering' }}
                            </a>
                        </template>
                    
                        <!-- HAS CODING -->
                        <template v-else-if="hasCoding(userModule.module_id)">
                            <a
                                v-if="!userModule.has_question_type || userModule.questions_type_passed && !userModule.coding_passed"
                                :href="`/takingPretest/${url(subjectName)}/${subjectId}/${url(moduleName(userModule.module_id))}/${userModule.module_id}/`" 
                                class="text-center text-xs sm:text-sm font-bold text-[#090014] bg-[#CECBF6] rounded-full py-2 sm:py-2.5 px-4 sm:px-6 transition-colors hover:bg-[#CECBF6]/85 whitespace-nowrap">
                                {{ linkText(userModule.module_id) === 0 ? 'Start Coding' : 'Continue Coding' }}
                            </a>

                            <span v-else-if="userModule.coding_passed" class="inline-flex items-center gap-1.5 text-center text-xs sm:text-sm font-bold text-[#CECBF6] bg-[#CECBF6]/10 border-[1.5px] border-[#CECBF6]/30 rounded-full py-2 sm:py-2.5 px-4 sm:px-6 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-3.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Coding Passed
                            </span>

                            <span v-else-if="userModule.has_question_type || !userModule.questions_type_passed" class="inline-flex items-center gap-1.5 text-center text-xs sm:text-sm font-bold text-gray-500 bg-gray-800/40 border-[1.5px] border-gray-700/60 rounded-full py-2 sm:py-2.5 px-4 sm:px-6 whitespace-nowrap cursor-not-allowed">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="5" y="11" width="14" height="10" rx="2"/>
                                    <path d="M8 11V7a4 4 0 0 1 8 0v4"/>
                                </svg>
                                Code Locked
                            </span>

                            
                        </template>

                        <!-- NO QUESTIONS YET -->
                        <template v-else>
                            <span class="inline-flex items-center gap-1.5 text-center text-xs sm:text-sm font-semibold text-gray-500 bg-transparent border-[1.5px] border-dashed border-gray-700/70 rounded-full py-2 sm:py-2.5 px-4 sm:px-6 whitespace-nowrap cursor-default">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3.5 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 8.25a3.75 3.75 0 1 1 5.612 3.257c-.884.505-1.612 1.334-1.612 2.368v.375m0 3.375h.008v.008H12v-.008ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Questions Coming Soon
                            </span>
                        </template>

                        
                        
                    </div>
                </div>

                <!-- LOCKED -->
                <div v-if="userModule.status === 'locked'" class="relative size-12 sm:size-14 shrink-0 flex items-center justify-center rounded-full bg-[#090014] border-[1.5px] border-[#CECBF6]/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sm:size-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                </div>
                <div v-if="userModule.status === 'locked'" class="flex-1 min-w-0 flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 sm:p-5 rounded-2xl sm:rounded-3xl border-[1.5px] border-[#CECBF6]/10 bg-white/[0.02]">
                    <div class="min-w-0">
                        <h3 class="text-sm sm:text-base font-bold leading-snug text-gray-500 truncate">{{ moduleName(userModule.module_id) }}</h3>
                        <p v-if="moduleQuestionCount(userModule.module_id) > 1" class="text-sm font-medium text-gray-600">{{ moduleQuestionCount(userModule.module_id)  }} {{ moduleQuestionCount(userModule.module_id) <=1 ? 'Question' : 'Questions' }}</p>
                        <p v-else class="text-sm font-medium text-gray-600">No Questions Available</p>
                    </div>
                    <span class="text-center text-xs sm:text-sm font-bold text-gray-600 border-[1.5px] border-gray-700 rounded-full py-2 sm:py-2.5 px-4 sm:px-6 whitespace-nowrap self-start sm:self-auto cursor-not-allowed">Locked</span>
                </div>

            </li>
        </ul>
    </section>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    userModules: { type: Array, required: true },
    answeredQuestions: { type: Array, required: true },
    modules: { type: Array, required: true },
    questions: { type: Object, required: true },
    subjectId: { type: String, required: true },
    subjectName: { type: String, required: true }
});

const sorteduserModules = computed(() => {
    return [...props.userModules].sort((a, b) => {
        const indexA = props.modules.findIndex(t => t.id === a.module_id);
        const indexB = props.modules.findIndex(t => t.id === b.module_id);
        return indexA - indexB;
    });
});

function url(url_name) {
    return url_name.replace(/\s+/g, "_");
}

function moduleName(module_id) {
       return props.modules.find(Mname => Mname.id === module_id)?.module_name ?? ''
}

function linkText(M_id) {
    return props.answeredQuestions.filter(
        Aq => Aq.module_id === M_id
    ).length;
}

function hasCoding(M_id){
    return props.modules.find(m => m.id === M_id)?.has_coding;
}

function hasQuestionType(M_id){
    return props.modules.find(m => m.id === M_id)?.has_question_type;
}

function moduleQuestionCount(M_id) {
    return props.questions[M_id]?.length ?? 0;
}
 function cl(d){
    console.log("c: "+ d);
 }
</script>