<div class="fixed inset-0 z-[999]  overflow-y-auto bg-[black]/60 hidden" wire:loading.attribute="block">
    <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
        <div x-show="open" x-transition="" x-transition.duration.300="" class="w-full max-w-lg p-0 my-8 bg-transparent overflow-hidden border-0 rounded-lg panel">
            <div class="p-5 flex justify-center">
                <button type="button" class="btn btn-secondary btn-lg">
                    <span class="inline-block w-3 h-3 bg-white rounded-full animate-ping ltr:mr-4 rtl:ml-4"></span>
                    در حال دریافت اطلاعات
                </button>
            </div>
        </div>
    </div>
</div>
