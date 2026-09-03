<div id="deleteFeedbackModal" 
    class="absolute w-screen h-screen bg-black/80 z-99 flex items-center justify-center"
    style="display: none;"
    >
    <form action="" method=""
        class="relative w-[30%] min-w-[380px] bg-white rounded-xl shadow-2xl shadow-black/20 flex flex-col p-6 gap-5"
        >

        <button type="button"
            class="deleteFeedbackModalClose absolute right-4 top-4 p-1.5 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="w-full flex flex-col gap-1 pr-6">
            <span class="text-lg font-semibold text-red-900">Delete Feedback?</span>
            <span class="text-sm text-gray-600">Are you sure you want to delete this FeedbacK?</span>
        </div>

        <div class="w-full flex flex-col py-2">
            
            <div class="w-full flex items-end gap-1.5 ">
                <span class="text-sm font-medium text-gray-700">Sender Name: </span>
                <span class="text-xs text-gray-500">Jimwell Raza</span>
            </div>
            <div class="w-full flex items-end gap-1.5 pb-2">
                <span class="text-sm font-medium text-gray-700">Date: </span>
                <span class="text-xs text-gray-500">8-12-26</span>
            </div>
            <div class="w-full flex flex-col gap-1 border-t-[1px] border-t-gray-400 pt-2">
                <span class="text-sm font-medium text-gray-700">Feedback</span>
                <span class="text-xs text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus expedita eius fugit esse beatae doloremque exercitationem! Facilis autem eligendi quibusdam temporibus, deleniti impedit eius aspernatur molestiae similique! Incidunt, culpa necessitatibus.</span>
            </div>
            
        </div>

        <div class="w-full flex gap-3 mt-1">
            <button type="button"
                class="deleteFeedbackModalClose w-1/3 py-2.5 rounded-md text-sm font-medium text-gray-600 border border-gray-400
                    hover:bg-gray-300 transition-colors cursor-pointer">
                Cancel
            </button>
            <button type="submit"
                class="w-2/3 py-2.5 rounded-md text-sm font-medium text-white bg-red-500
                    hover:bg-red-700 active:bg-red-800 transition-colors cursor-pointer">
                Yes, Delete
            </button>
        </div>

    </form>
</div>