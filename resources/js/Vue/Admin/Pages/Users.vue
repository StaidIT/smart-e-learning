<template>
    <div class="w-full flex flex-col gap-4">
        <!-- SEARCH -->
        <div class="w-full flex items-center justify-between">
            <div class="relative w-full sm:w-[320px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="size-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input
                    v-model="searchQuery"
                    type="search"
                    placeholder="Search by ID or Name..."
                    class="w-full h-[36px] pl-10 pr-3 rounded-md text-sm text-white placeholder:text-gray-500
                           bg-[#CECBF6]/6 border-[1.5px] border-[#CECBF6]/15 outline-none
                           focus:border-[#CECBF6]/30 focus:bg-[#CECBF6]/10 transition-all"
                >
            </div>
            <span class="hidden sm:block text-xs text-gray-400">{{ filteredUsers.length }} users</span>
        </div>


    <!-- TABLE -->
    <div
        class="w-full border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6 backdrop-blur-sm rounded-md overflow-hidden"
    >
        <!-- HEADER -->
        <div
            class="grid grid-cols-[120px_1fr_0.5fr_130px_200px] px-4 py-2.5 border-b border-[#CECBF6]/15 text-xs font-semibold text-gray-400"
        >
            <span>ID Number</span>
            <span>Name</span>
            <span>Email</span>
            <span class="md:flex hidden">Role</span>
            <span>Account Control</span>
        </div>

        <!-- ROWS -->
        <ul
            class="overflow-y-auto md:max-h-[290px] max-h-[270px] scrollbar-thin"
        >
            <li
                v-for="user in filteredUsers"
                :key="user.id"
                class="grid items-center px-4 py-3
                    border-b border-[#CECBF6]/10 last:border-b-0
                    hover:bg-[#CECBF6]/5 transition-colors
                    grid-cols-[120px_1fr_0.5fr_130px_200px]"
            >
                <span class="text-xs text-gray-400 font-mono">
                    {{ user.id_number }}
                </span>

                <div class="flex items-center md:gap-3 gap-1 min-w-0">
                    <div
                        class="md:w-8 md:h-8 w-5 h-5 shrink-0 rounded-md flex items-center justify-center md:text-[11px] text-[8px] font-semibold"
                        :class="
                            user.role === 'Admin'
                                ? 'bg-[#E04A4A]/15 border border-[#CECBF6]/15 text-[#F09595]'
                                : 'bg-[#8B5CF6]/15 border border-[#CECBF6]/15 text-[#CECBF6]'
                        "
                    >
                        {{
                            user.name
                                .split(' ')
                                .map(n => n[0])
                                .slice(0, 2)
                                .join('')
                        }}
                    </div>

                    <span class="md:text-sm text-xs text-white truncate"
                        :title="user.name"
                    >
                        {{ user.name }}
                    </span>
                </div>

                <span class="text-xs text-gray-400 font-mono"
                    :title="user.email"
                >
                    {{ user.email }}
                </span>

                <span class="md:flex hidden">
                    <span
                        class="inline-flex px-2 py-1 rounded-md text-[11px] font-medium border"
                        :class="
                            user.role === 'Admin'
                                ? 'bg-[#E04A4A]/10 border-[#E04A4A]/20 text-[#F09595]'
                                : 'bg-white/5 border-white/10 text-gray-300'
                        "
                    >
                        {{ user.role }}
                    </span>
                </span>

                <div class="flex items-center gap-2">
                    <!-- PROMOTE -->
                    <button
                        v-if="user.role === 'Student'"
                        type="button"
                        @click="promoteUser(user.id)"
                        class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-md text-xs font-medium
                            bg-emerald-500/10 border-[1.5px] border-emerald-500/25 text-emerald-300
                            hover:bg-emerald-500/20 hover:border-emerald-500/40
                            active:scale-95 transition-all cursor-pointer"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="size-3.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4.5 15.75l7.5-7.5 7.5 7.5"
                            />
                        </svg>
                        Promote
                    </button>

                    <!-- DEMOTE -->
                    <button
                        v-else
                        type="button"
                        @click="demoteUser(user.id)"
                        class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-md text-xs font-medium
                            bg-[#CECBF6]/5 border-[1.5px] border-[#CECBF6]/15 text-gray-300
                            hover:bg-amber-500/10 hover:border-amber-500/30 hover:text-amber-300
                            active:scale-95 transition-all cursor-pointer"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="size-3.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                            />
                        </svg>
                        Demote
                    </button>

                    <!-- DELETE -->
                    <button
                        type="button"
                        @click="deleteUser(user.id)"
                        class="flex items-center justify-center gap-1.5 px-2.5 py-1.5 rounded-md text-xs font-medium
                            bg-red-500/10 border-[1.5px] border-red-500/25 text-red-300
                            hover:bg-red-500 hover:border-red-500 hover:text-white
                            active:scale-95 transition-all cursor-pointer"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-3.5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.682-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                            />
                        </svg>
                        Delete
                    </button>
                </div>
            </li>

            <!-- NO RESULTS -->
            <li
                v-if="filteredUsers.length === 0"
                class="px-4 py-8 text-center text-sm text-gray-500"
            >
                No users found.
            </li>
        </ul>
    </div>
</div>

<Promote_User
    :show-promote-user="showPromoteUser"
    :user-data="userData"
    @close-promote="closePromote"
/>

<Demote_User
    :show-demote-user="showDemoteUser"
    :user-data="userData"
    @close-demote="closeDemote"
/>

<Delete_User
    :show-delete-user="showDeleteUser"
    :user-data="userData"
    @close-delete="closeDelete"
/>

</template>

<script setup>
import { ref, computed } from 'vue';
import Promote_User from '../Modal/Promote_User.vue';
import Demote_User from '../Modal/Demote_User.vue';
import Delete_User from '../Modal/Delete_User.vue';

const props = defineProps({
    users: {
        type: Array,
        default: () => []
    }
});

const searchQuery = ref('');

const showPromoteUser = ref(false);
const showDemoteUser = ref(false);
const showDeleteUser = ref(false);

const userData = ref(null);

const filteredUsers = computed(() => {
    const search = searchQuery.value.trim().toLowerCase();

    if (!search) {
        return props.users;
    }

    return props.users.filter(user => {
        const name = String(user.name ?? '').toLowerCase();
        const idNumber = String(user.id_number ?? '').toLowerCase();

        return (
            name.includes(search) ||
            idNumber.includes(search)
        );
    });
});

function promoteUser(id) {
    userData.value = props.users.find(user => user.id === id);
    showPromoteUser.value = true;
}

function closePromote() {
    showPromoteUser.value = false;
}

function demoteUser(id) {
    userData.value = props.users.find(user => user.id === id);
    showDemoteUser.value = true;
}

function closeDemote() {
    showDemoteUser.value = false;
}

function deleteUser(id) {
    userData.value = props.users.find(user => user.id === id);
    showDeleteUser.value = true;
}

function closeDelete() {
    showDeleteUser.value = false;
}
</script>
