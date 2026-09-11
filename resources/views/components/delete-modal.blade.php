<div
    x-show="showDeleteModal"
    x-cloak
    class="fixed inset-0 z-50 overflow-y-auto"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
    style="display: none;"
>
    <!-- Backdrop Blur & Fade -->
    <div 
        x-show="showDeleteModal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-900/40 backdrop-blur-xs transition-opacity"
        @click="showDeleteModal = false"
    ></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <!-- Modal Card Container -->
        <div 
            x-show="showDeleteModal"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl border border-gray-100 transition-all sm:my-8 sm:w-full sm:max-w-md p-6"
        >
            <div class="flex items-start gap-4">

                <div class="flex-1 min-w-0">
                    <h3 class="font-serif text-lg font-medium text-gray-900 tracking-tight" id="modal-title" x-text="deleteTitle || 'Confirm Deletion'">
                        Confirm Deletion
                    </h3>
                    <p class="text-xs text-gray-500 mt-1.5 leading-relaxed" x-text="deleteMessage || 'Are you sure you want to delete this record? This action cannot be undone.'">
                        Are you sure you want to delete this record? This action cannot be undone.
                    </p>
                </div>
            </div>

            <!-- Modal Action Buttons -->
            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-end gap-2.5">
                <button
                    type="button"
                    @click="showDeleteModal = false"
                    class="px-4 py-2 text-xs font-semibold text-gray-700 bg-white border border-gray-200/80 rounded-xl hover:bg-gray-50 transition shadow-2xs"
                >
                    Cancel
                </button>

                <form :action="deleteUrl" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-semibold text-white bg-rose-600 rounded-xl hover:bg-rose-700 transition shadow-sm hover:shadow"
                    >
                        <span>Delete</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
