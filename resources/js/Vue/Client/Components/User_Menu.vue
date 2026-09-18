<template>
    <Transition
        enter-active-class="transition ease-out duration-150"
        enter-from-class="opacity-0 scale-95 -translate-y-1"
        enter-to-class="opacity-100 scale-100 translate-y-0"
        leave-active-class="transition ease-in duration-100"
        leave-from-class="opacity-100 scale-100"
        leave-to-class="opacity-0 scale-95"
    >
        <div
            v-if="showUserMenu"
            class="w-[300px] fixed md:top-3 top-[60px] md:right-4 right-0 z-100 p-3 flex flex-col bg-white rounded-xl shadow-lg ring-1 ring-black/5 gap-3"
        >
            <!-- USER PROFILE -->
            <div class="w-full flex items-center gap-3 px-1">
                <div class="w-11 h-11 shrink-0 rounded-full flex items-center justify-center font-semibold text-sm"
                    :class="profileColor"
                >
                    {{ initials }}
                </div>
                <div class="flex flex-col leading-tight justify-center min-w-0 flex-1">
                    <span class="font-semibold text-sm text-gray-900 truncate">{{ userName }}</span>
                    <span class="text-xs text-gray-400 truncate">{{ userEmail }}</span>
                </div>

                <!-- CLOSE BUTTON -->
                <button
                    type="button"
                    @click="closeMenu"
                    aria-label="Close menu"
                    class="w-7 h-7 shrink-0 flex items-center justify-center rounded-full text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-colors cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="h-px bg-gray-100" />

            <div class="flex flex-col gap-1">
                <!-- SETTINGS -->
                <button
                    class="px-3 py-2 text-sm text-gray-700 rounded-lg flex items-center gap-2.5 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-colors cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4.5 text-gray-500 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span>Settings</span>
                </button>

                <!-- CHANGE PASSWORD -->
                <button
                    class="px-3 py-2 text-sm text-gray-700 rounded-lg flex items-center gap-2.5 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-colors cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4.5 text-gray-500 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>
                    <span>Change Password</span>
                </button>

                <!-- FEEDBACK -->
                <button
                    class="px-3 py-2 text-sm text-gray-700 rounded-lg flex items-center gap-2.5 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-colors cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4.5 text-gray-500 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                    </svg>
                    <span>Feedback</span>
                </button>
            </div>

            <div class="h-px bg-gray-100" />

            <div class="flex flex-col gap-1">
                <!-- LOGOUT -->
                <button
                    type="button"
                    @click="logout"
                    class="px-3 py-2 text-sm text-red-500 rounded-lg flex items-center gap-2.5 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-100 transition-colors cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4.5 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                    <span>Log out</span>
                </button>
            </div>
        </div>
    </Transition>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    showUserMenu: { type: Boolean, default: true },
    userId: {type: Number, required: true},
    userName: { type: String, required:true },
    userEmail: { type: String, required:true},
    profileColor: { tpye: String, default: 'bg-purple-800 text-white'}
})



const initials = computed(() =>
    props.userName
        .split(' ')
        .map(n => n[0])
        .join('')
        .slice(0, 2)
        .toUpperCase()
)

const emit = defineEmits(['close-user-menu'])

function closeMenu() {
    emit('close-user-menu')
}

async function logoutForm() {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute('content');

    if (!csrfToken) {
        throw new Error('CSRF token not found');
    }

    const response = await fetch('/logout_student', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        credentials: 'same-origin'
    });

    const responseText = await response.text();

    console.log('Logout status:', response.status);
    console.log('Logout response:', responseText);

    if (!response.ok) {
        throw new Error(`Logout failed: ${response.status}`);
    }

    window.location.href = '/';
}

async function logout() {
    try {
        await logoutForm();
    } catch (error) {
        console.error(error);
    }
}

</script>