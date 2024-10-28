@if(session()->has('success'))
    <div class="flex items-center rounded bg-success-light p-3.5 text-success dark:bg-success-dark-light">
        <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">{{session('success')}}</strong>{{session('message')}}</span>
        <button type="button" class="hover:opacity-80 ltr:ml-auto rtl:mr-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
@endif
