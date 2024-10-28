<div class="pt-5">
    <div class="grid grid-cols-1 gap-6 mb-6 text-white sm:grid-cols-2 xl:grid-cols-4">
        <!-- Users Visit -->
        <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
            <div class="flex justify-between">
                <div class="font-semibold text-md ltr:mr-1 rtl:ml-1">بازدید کاربران</div>
                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                    <a href="javascript:;" @click="toggle">
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 opacity-70 hover:opacity-80"
                        >
                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                    </a>
                    <ul
                        x-cloak
                        x-show="open"
                        x-transition
                        x-transition.duration.300ms
                        class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark"
                    >
                        <li><a href="javascript:;" @click="toggle">مشاهده گزارش</a></li>
                        <li><a href="javascript:;" @click="toggle">ویرایش گزارش</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">$170.46</div>
                <div class="badge bg-white/30">+ 2.35%</div>
            </div>
            <div class="flex items-center mt-5 font-semibold">
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ltr:mr-2 rtl:ml-2"
                >
                    <path
                        opacity="0.5"
                        d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    ></path>
                    <path
                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    ></path>
                </svg>
                هفته گذشته 44,700
            </div>
        </div>

        <!-- Sessions -->
        <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
            <div class="flex justify-between">
                <div class="font-semibold text-md ltr:mr-1 rtl:ml-1">نشست ها</div>
                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                    <a href="javascript:;" @click="toggle">
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 opacity-70 hover:opacity-80"
                        >
                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                    </a>
                    <ul
                        x-cloak
                        x-show="open"
                        x-transition
                        x-transition.duration.300ms
                        class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark"
                    >
                        <li><a href="javascript:;" @click="toggle">مشاهده گزارش</a></li>
                        <li><a href="javascript:;" @click="toggle">ویرایش گزارش</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">74,137</div>
                <div class="badge bg-white/30">- 2.35%</div>
            </div>
            <div class="flex items-center mt-5 font-semibold">
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ltr:mr-2 rtl:ml-2"
                >
                    <path
                        opacity="0.5"
                        d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    ></path>
                    <path
                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    ></path>
                </svg>
                هفته گذشته 84,709
            </div>
        </div>

        <!-- Time On-Site -->
        <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
            <div class="flex justify-between">
                <div class="font-semibold text-md ltr:mr-1 rtl:ml-1">زمان در محل</div>
                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                    <a href="javascript:;" @click="toggle">
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 opacity-70 hover:opacity-80"
                        >
                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                    </a>
                    <ul
                        x-cloak
                        x-show="open"
                        x-transition
                        x-transition.duration.300ms
                        class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark"
                    >
                        <li><a href="javascript:;" @click="toggle">مشاهده گزارش</a></li>
                        <li><a href="javascript:;" @click="toggle">ویرایش گزارش</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">38,085</div>
                <div class="badge bg-white/30">+ 1.35%</div>
            </div>
            <div class="flex items-center mt-5 font-semibold">
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ltr:mr-2 rtl:ml-2"
                >
                    <path
                        opacity="0.5"
                        d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    ></path>
                    <path
                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    ></path>
                </svg>
                هفته گذشته 37,894
            </div>
        </div>

        <!-- Bounce Rate -->
        <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
            <div class="flex justify-between">
                <div class="font-semibold text-md ltr:mr-1 rtl:ml-1">بانس ریت</div>
                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                    <a href="javascript:;" @click="toggle">
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 opacity-70 hover:opacity-80"
                        >
                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                    </a>
                    <ul
                        x-cloak
                        x-show="open"
                        x-transition
                        x-transition.duration.300ms
                        class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark"
                    >
                        <li><a href="javascript:;" @click="toggle">مشاهده گزارش</a></li>
                        <li><a href="javascript:;" @click="toggle">ویرایش گزارش</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">49.10%</div>
                <div class="badge bg-white/30">- 0.35%</div>
            </div>
            <div class="flex items-center mt-5 font-semibold">
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ltr:mr-2 rtl:ml-2"
                >
                    <path
                        opacity="0.5"
                        d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    ></path>
                    <path
                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                    ></path>
                </svg>
                هفته گذشته 50.01%
            </div>
        </div>
    </div>


</div>
