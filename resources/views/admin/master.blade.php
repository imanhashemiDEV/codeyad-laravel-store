
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>پنل مدیریت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{url('panel/images/favicon.png')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/perfect-scrollbar.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/style.css')}}" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/animate.css')}}" />
    <script src="{{url('panel/js/perfect-scrollbar.min.js')}}"></script>
    <script defer src="{{url('panel/js/popper.min.js')}}"></script>
    <script defer src="{{url('panel/js/tippy-bundle.umd.min.js')}}"></script>
    <script defer src="{{url('panel/js/sweetalert.min.js')}}"></script>
</head>

<body
    x-data="main"
    class="relative overflow-x-hidden text-sm antialiased font-normal font-vazir font-nunito"
    :class="  [ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme, $store.app.menu, $store.app.layout,$store.app.rtlClass]"
>
<!-- sidebar menu overlay -->
<div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

<!-- screen loader -->
<div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
    <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
        <path
            d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"
        >
            <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
        </path>
        <path
            d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"
        >
            <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
        </path>
    </svg>
</div>

<!-- scroll to top button -->
<div class="fixed z-50 bottom-6 ltr:right-6 rtl:left-6" x-data="scrollToTop">
    <template x-if="showTopButton">
        <button
            type="button"
            class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
            @click="goToTop"
        >
            <svg width="24" height="24" class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    opacity="0.5"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                    fill="currentColor"
                />
                <path
                    d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                    fill="currentColor"
                />
            </svg>
        </button>
    </template>
</div>

<!-- start theme customizer section -->
<div x-data="customizer">
    <div
        class="fixed inset-0 z-[51] hidden bg-[black]/60 px-4 transition-[display]"
        :class="{'!block': showCustomizer}"
        @click="showCustomizer = false"
    ></div>

    <nav
        class="fixed top-0 bottom-0 z-[51] w-full max-w-[400px] bg-white p-4 shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-[right] duration-300 ltr:-right-[400px] rtl:-left-[400px] dark:bg-[#0e1726]"
        :class="{'ltr:!right-0 rtl:!left-0' : showCustomizer}"
    >
        <a
            href="javascript:;"
            class="absolute top-0 bottom-0 flex items-center justify-center w-12 h-10 my-auto text-white cursor-pointer bg-primary ltr:-left-12 ltr:rounded-tl-full ltr:rounded-bl-full rtl:-right-12 rtl:rounded-tr-full rtl:rounded-br-full"
            @click="showCustomizer = !showCustomizer"
        >
            <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 animate-[spin_3s_linear_infinite]"
            >
                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                <path
                    opacity="0.5"
                    d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"
                    stroke="currentColor"
                    stroke-width="1.5"
                />
            </svg>
        </a>
        <div class="h-full overflow-x-hidden overflow-y-auto perfect-scrollbar">
            <div class="relative pb-5 text-center">
                <a
                    href="javascript:;"
                    class="absolute top-0 opacity-30 hover:opacity-100 ltr:right-0 rtl:left-0 dark:text-white"
                    @click="showCustomizer = false"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24px"
                        height="24px"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="w-5 h-5"
                    >
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>
                <h4 class="mb-1 dark:text-white">سفارشی ساز قالب</h4>
                <p class="text-white-dark">تنظیمات برگزیده را تنظیم کنید که برای نمایش پیش نمایش زنده شما آماده می شود.</p>
            </div>
            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">طرح رنگی</h5>
                <p class="text-xs text-white-dark">ارائه کلی روشن یا تاریک.</p>
                <div class="grid grid-cols-3 gap-2 mt-3">
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.theme === 'light' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleTheme('light')"
                    >
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 ltr:mr-2 rtl:ml-2"
                        >
                            <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5"></circle>
                            <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path
                                opacity="0.5"
                                d="M19.7778 4.22266L17.5558 6.25424"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            ></path>
                            <path
                                opacity="0.5"
                                d="M4.22217 4.22266L6.44418 6.25424"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            ></path>
                            <path
                                opacity="0.5"
                                d="M6.44434 17.5557L4.22211 19.7779"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            ></path>
                            <path
                                opacity="0.5"
                                d="M19.7778 19.7773L17.5558 17.5551"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            ></path>
                        </svg>
                        Light
                    </button>
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.theme === 'dark' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleTheme('dark')"
                    >
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 ltr:mr-2 rtl:ml-2"
                        >
                            <path
                                d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                        تاریک
                    </button>
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.theme === 'system' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleTheme('system')"
                    >
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 ltr:mr-2 rtl:ml-2"
                        >
                            <path
                                d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                stroke="currentColor"
                                stroke-width="1.5"
                            ></path>
                            <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                        سیستم
                    </button>
                </div>
            </div>

            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">موقعیت ناوبری</h5>
                <p class="text-xs text-white-dark">طرح ناوبری اولیه را برای برنامه خود انتخاب کنید.</p>
                <div class="grid grid-cols-3 gap-2 mt-3">

                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.menu === 'vertical' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleMenu('vertical')"
                    >
                        عمودی
                    </button>
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.menu === 'collapsible-vertical' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleMenu('collapsible-vertical')"
                    >
                        تاشو
                    </button>
                </div>
                <div class="mt-5 text-primary">
                    <label class="inline-flex mb-0">
                        <input
                            x-model="$store.app.semidark"
                            type="checkbox"
                            :value="true"
                            class="form-checkbox"
                            @change="$store.app.toggleSemidark()"
                        />
                        <span>نیمه تاریک (نوار کناری و هدر)</span>
                    </label>
                </div>
            </div>

            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">جهت</h5>
                <p class="text-xs text-white-dark">جهت برنامه خود را انتخاب کنید.</p>
                <div class="flex gap-2 mt-3">
                    <button
                        type="button"
                        class="flex-auto btn"
                        :class="[$store.app.rtlClass === 'ltr' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleRTL('ltr')"
                    >
                        LTR
                    </button>
                    <button
                        type="button"
                        class="flex-auto btn"
                        :class="[$store.app.rtlClass === 'rtl' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleRTL('rtl')"
                    >
                        RTL
                    </button>
                </div>
            </div>

            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">نوع نوار ناوبری</h5>
                <p class="text-xs text-white-dark">چسبنده یا شناور.</p>
                <div class="flex items-center gap-3 mt-3 text-primary">
                    <label class="inline-flex mb-0">
                        <input x-model="$store.app.navbar" type="radio" value="navbar-sticky" class="form-radio" @change="$store.app.toggleNavbar()" />
                        <span>چسبنده</span>
                    </label>
                    <label class="inline-flex mb-0">
                        <input
                            x-model="$store.app.navbar"
                            type="radio"
                            value="navbar-floating"
                            class="form-radio"
                            @change="$store.app.toggleNavbar()"
                        />
                        <span>شناور</span>
                    </label>
                    <label class="inline-flex mb-0">
                        <input x-model="$store.app.navbar" type="radio" value="navbar-static" class="form-radio" @change="$store.app.toggleNavbar()" />
                        <span>استاتیک</span>
                    </label>
                </div>
            </div>

            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">انتقال روتر</h5>
                <p class="text-xs text-white-dark">انیمیشن محتوای اصلی</p>
                <div class="mt-3">
                    <select x-model="$store.app.animation" class="form-select border-primary text-primary" @change="$store.app.toggleAnimation()">
                        <option value="">انیمیشن را انتخاب کنید</option>
                        <option value="animate__fadeIn">محو</option>
                        <option value="animate__fadeInDown">محو شدن</option>
                        <option value="animate__fadeInUp">محو شدن</option>
                        <option value="animate__fadeInLeft">محو کردن سمت چپ</option>
                        <option value="animate__fadeInRight">محو کردن سمت راست</option>
                        <option value="animate__slideInDown">اسلاید به پایین</option>
                        <option value="animate__slideInLeft">به چپ بکشید</option>
                        <option value="animate__slideInRight">اسلاید به راست</option>
                        <option value="animate__zoomIn">بزرگنمایی</option>
                    </select>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- end theme customizer section -->

<div class="min-h-screen text-black main-container dark:text-white-dark" :class="[$store.app.navbar]">
    <!-- start sidebar section -->
    <div :class="{'dark text-white-dark' : $store.app.semidark}">
        <nav
            x-data="sidebar"
            class="sidebar fixed top-0 bottom-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300"
        >
            <div class="h-full bg-white dark:bg-[#0e1726]">
                <div class="flex items-center justify-between px-4 py-3">
                    <a href="index.html" class="flex items-center main-logo shrink-0">
                        <img class="ml-[5px] w-8 flex-none" src="{{url('panel')}}/images/logo.svg" alt="image" />
                        <span class="align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">IMO</span>
                    </a>
                    <a
                        href="javascript:;"
                        class="flex items-center w-8 h-8 transition duration-300 rounded-full collapse-icon hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                        @click="$store.app.toggleSidebar()"
                    >
                        <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                opacity="0.5"
                                d="M16.9998 19L10.9998 12L16.9998 5"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </a>
                </div>
                <ul
                    class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                    x-data="{ activeDropdown: 'dashboard' }"
                >
                    <li class="menu nav-item">
                        <button
                            type="button"
                            class="nav-link group"
                            :class="{'active' : activeDropdown === 'dashboard'}"
                            @click="activeDropdown === 'dashboard' ? activeDropdown = null : activeDropdown = 'dashboard'"
                        >
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.5"
                                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                        fill="currentColor"
                                    />
                                </svg>

                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">داشبورد</span>
                            </div>
                            <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'dashboard'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </button>
                        <ul x-cloak x-show="activeDropdown === 'dashboard'" x-collapse class="text-gray-500 sub-menu">
                            <li>
                                <a href="index.html">داشبورد</a>
                            </li>
                            <!-- here -->
                        </ul>
                    </li>


                    <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 py-3 px-7 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                        <svg
                            class="flex-none hidden w-4 h-5"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>رابط کاربر</span>
                    </h2>

                    <li class="menu nav-item">
                        <button
                            type="button"
                            class="nav-link group"
                            :class="{'active' : activeDropdown === 'components'}"
                            @click="activeDropdown === 'components' ? activeDropdown = null : activeDropdown = 'components'"
                        >
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M8.42229 20.6181C10.1779 21.5395 11.0557 22.0001 12 22.0001V12.0001L2.63802 7.07275C2.62423 7.09491 2.6107 7.11727 2.5974 7.13986C2 8.15436 2 9.41678 2 11.9416V12.0586C2 14.5834 2 15.8459 2.5974 16.8604C3.19479 17.8749 4.27063 18.4395 6.42229 19.5686L8.42229 20.6181Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        opacity="0.7"
                                        d="M17.5774 4.43152L15.5774 3.38197C13.8218 2.46066 12.944 2 11.9997 2C11.0554 2 10.1776 2.46066 8.42197 3.38197L6.42197 4.43152C4.31821 5.53552 3.24291 6.09982 2.6377 7.07264L11.9997 12L21.3617 7.07264C20.7564 6.09982 19.6811 5.53552 17.5774 4.43152Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        opacity="0.5"
                                        d="M21.4026 7.13986C21.3893 7.11727 21.3758 7.09491 21.362 7.07275L12 12.0001V22.0001C12.9443 22.0001 13.8221 21.5395 15.5777 20.6181L17.5777 19.5686C19.7294 18.4395 20.8052 17.8749 21.4026 16.8604C22 15.8459 22 14.5834 22 12.0586V11.9416C22 9.41678 22 8.15436 21.4026 7.13986Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">کامپوننت ها</span>
                            </div>
                            <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'components'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </button>
                        <ul x-cloak x-show="activeDropdown === 'components'" x-collapse class="text-gray-500 sub-menu">
                            <li>
                                <a href="components-tabs.html">برگه‌ها</a>
                            </li>
                            <li>
                                <a href="components-accordions.html">آکاردئون</a>
                            </li>
                            <li>
                                <a href="components-modals.html">مدال‌ها</a>
                            </li>
                            <li>
                                <a href="components-countdown.html">شمارش معکوس</a>
                            </li>
                            <li>
                                <a href="components-counter.html">شمارنده</a>
                            </li>
                            <li>
                                <a href="components-sweetalert.html">هشدارهای sweet</a>
                            </li>
                            <li>
                                <a href="components-notifications.html">اعلان‌ها</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu nav-item">
                        <button
                            type="button"
                            class="nav-link group"
                            :class="{'active' : activeDropdown === 'elements'}"
                            @click="activeDropdown === 'elements' ? activeDropdown = null : activeDropdown = 'elements'"
                        >
                            <div class="flex items-center">
                                <svg
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="group-hover:!text-primary"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M8.73167 5.77133L5.66953 9.91436C4.3848 11.6526 3.74244 12.5217 4.09639 13.205C4.10225 13.2164 4.10829 13.2276 4.1145 13.2387C4.48945 13.9117 5.59888 13.9117 7.81775 13.9117C9.05079 13.9117 9.6673 13.9117 10.054 14.2754L10.074 14.2946L13.946 9.72466L13.926 9.70541C13.5474 9.33386 13.5474 8.74151 13.5474 7.55682V7.24712C13.5474 3.96249 13.5474 2.32018 12.6241 2.03721C11.7007 1.75425 10.711 3.09327 8.73167 5.77133Z"
                                        fill="currentColor"
                                    ></path>
                                    <path
                                        opacity="0.5"
                                        d="M10.4527 16.4432L10.4527 16.7528C10.4527 20.0374 10.4527 21.6798 11.376 21.9627C12.2994 22.2457 13.2891 20.9067 15.2685 18.2286L18.3306 14.0856C19.6154 12.3474 20.2577 11.4783 19.9038 10.7949C19.8979 10.7836 19.8919 10.7724 19.8857 10.7613C19.5107 10.0883 18.4013 10.0883 16.1824 10.0883C14.9494 10.0883 14.3329 10.0883 13.9462 9.72461L10.0742 14.2946C10.4528 14.6661 10.4527 15.2585 10.4527 16.4432Z"
                                        fill="currentColor"
                                    ></path>
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">عناصر</span>
                            </div>
                            <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'elements'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </button>
                        <ul x-cloak x-show="activeDropdown === 'elements'" x-collapse class="text-gray-500 sub-menu">
                            <li>
                                <a href="elements-alerts.html">هشدارها</a>
                            </li>
                            <li>
                                <a href="elements-avatar.html">آواتار</a>
                            </li>
                            <li>
                                <a href="elements-badges.html">نشان‌ها</a>
                            </li>
                            <li>
                                <a href="elements-breadcrumbs.html">خردهای نان</a>
                            </li>
                            <li>
                                <a href="elements-buttons.html">دکمه‌ها</a>
                            </li>
                            <li>
                                <a href="elements-color-library.html">کتابخانه رنگ</a>
                            </li>
                            <li>
                                <a href="elements-dropdown.html">کشوئی</a>
                            </li>
                            <li>
                                <a href="elements-loader.html">لودر</a>
                            </li>
                            <li>
                                <a href="elements-pagination.html">صفحه بندی</a>
                            </li>
                            <li>
                                <a href="elements-popovers.html">پاپ آپ</a>
                            </li>
                            <li>
                                <a href="elements-progress-bar.html">نوار پیشرفت</a>
                            </li>
                            <li>
                                <a href="elements-search.html">جستجو</a>
                            </li>
                            <li>
                                <a href="elements-tooltips.html">تولتیپ</a>
                            </li>
                            <li>
                                <a href="elements-treeview.html">نمایش درختی</a>
                            </li>
                            <li>
                                <a href="elements-typography.html">تایپوگرافی</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu nav-item">
                        <a href="charts.html" class="nav-link group">
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.5"
                                        d="M6.22209 4.60105C6.66665 4.304 7.13344 4.04636 7.6171 3.82976C8.98898 3.21539 9.67491 2.9082 10.5875 3.4994C11.5 4.09061 11.5 5.06041 11.5 7.00001V8.50001C11.5 10.3856 11.5 11.3284 12.0858 11.9142C12.6716 12.5 13.6144 12.5 15.5 12.5H17C18.9396 12.5 19.9094 12.5 20.5006 13.4125C21.0918 14.3251 20.7846 15.011 20.1702 16.3829C19.9536 16.8666 19.696 17.3334 19.399 17.7779C18.3551 19.3402 16.8714 20.5578 15.1355 21.2769C13.3996 21.9959 11.4895 22.184 9.64665 21.8175C7.80383 21.4509 6.11109 20.5461 4.78249 19.2175C3.45389 17.8889 2.5491 16.1962 2.18254 14.3534C1.81598 12.5105 2.00412 10.6004 2.72315 8.86451C3.44218 7.12861 4.65982 5.64492 6.22209 4.60105Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M21.446 7.06901C20.6342 5.00831 18.9917 3.36579 16.931 2.55398C15.3895 1.94669 14 3.34316 14 5.00002V9.00002C14 9.5523 14.4477 10 15 10H19C20.6569 10 22.0533 8.61055 21.446 7.06901Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">نمودارها</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="apps-chat.html" class="group">
                            <div class="flex items-center">
                                <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4036 22.4797L10.6787 22.015C11.1195 21.2703 11.3399 20.8979 11.691 20.6902C12.0422 20.4825 12.5001 20.4678 13.4161 20.4385C14.275 20.4111 14.8523 20.3361 15.3458 20.1317C16.385 19.7012 17.2106 18.8756 17.641 17.8365C17.9639 17.0571 17.9639 16.0691 17.9639 14.093V13.2448C17.9639 10.4683 17.9639 9.08006 17.3389 8.06023C16.9892 7.48958 16.5094 7.0098 15.9388 6.66011C14.919 6.03516 13.5307 6.03516 10.7542 6.03516H8.20964C5.43314 6.03516 4.04489 6.03516 3.02507 6.66011C2.45442 7.0098 1.97464 7.48958 1.62495 8.06023C1 9.08006 1 10.4683 1 13.2448V14.093C1 16.0691 1 17.0571 1.32282 17.8365C1.75326 18.8756 2.57886 19.7012 3.61802 20.1317C4.11158 20.3361 4.68882 20.4111 5.5477 20.4385C6.46368 20.4678 6.92167 20.4825 7.27278 20.6902C7.6239 20.8979 7.84431 21.2703 8.28514 22.015L8.5602 22.4797C8.97002 23.1721 9.9938 23.1721 10.4036 22.4797ZM13.1928 14.5171C13.7783 14.5171 14.253 14.0424 14.253 13.4568C14.253 12.8713 13.7783 12.3966 13.1928 12.3966C12.6072 12.3966 12.1325 12.8713 12.1325 13.4568C12.1325 14.0424 12.6072 14.5171 13.1928 14.5171ZM10.5422 13.4568C10.5422 14.0424 10.0675 14.5171 9.48193 14.5171C8.89637 14.5171 8.42169 14.0424 8.42169 13.4568C8.42169 12.8713 8.89637 12.3966 9.48193 12.3966C10.0675 12.3966 10.5422 12.8713 10.5422 13.4568ZM5.77108 14.5171C6.35664 14.5171 6.83133 14.0424 6.83133 13.4568C6.83133 12.8713 6.35664 12.3966 5.77108 12.3966C5.18553 12.3966 4.71084 12.8713 4.71084 13.4568C4.71084 14.0424 5.18553 14.5171 5.77108 14.5171Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M15.486 1C16.7529 0.999992 17.7603 0.999986 18.5683 1.07681C19.3967 1.15558 20.0972 1.32069 20.7212 1.70307C21.3632 2.09648 21.9029 2.63623 22.2963 3.27821C22.6787 3.90219 22.8438 4.60265 22.9226 5.43112C22.9994 6.23907 22.9994 7.24658 22.9994 8.51343V9.37869C22.9994 10.2803 22.9994 10.9975 22.9597 11.579C22.9191 12.174 22.8344 12.6848 22.6362 13.1632C22.152 14.3323 21.2232 15.2611 20.0541 15.7453C20.0249 15.7574 19.9955 15.7691 19.966 15.7804C19.8249 15.8343 19.7039 15.8806 19.5978 15.915H17.9477C17.9639 15.416 17.9639 14.8217 17.9639 14.093V13.2448C17.9639 10.4683 17.9639 9.08006 17.3389 8.06023C16.9892 7.48958 16.5094 7.0098 15.9388 6.66011C14.919 6.03516 13.5307 6.03516 10.7542 6.03516H8.20964C7.22423 6.03516 6.41369 6.03516 5.73242 6.06309V4.4127C5.76513 4.29934 5.80995 4.16941 5.86255 4.0169C5.95202 3.75751 6.06509 3.51219 6.20848 3.27821C6.60188 2.63623 7.14163 2.09648 7.78361 1.70307C8.40759 1.32069 9.10805 1.15558 9.93651 1.07681C10.7445 0.999986 11.7519 0.999992 13.0188 1H15.486Z" fill="currentColor"></path>
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">چت</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu nav-item">
                        <a href="widgets.html" class="nav-link group">
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.5"
                                        d="M13 15.4C13 13.3258 13 12.2887 13.659 11.6444C14.318 11 15.3787 11 17.5 11C19.6213 11 20.682 11 21.341 11.6444C22 12.2887 22 13.3258 22 15.4V17.6C22 19.6742 22 20.7113 21.341 21.3556C20.682 22 19.6213 22 17.5 22C15.3787 22 14.318 22 13.659 21.3556C13 20.7113 13 19.6742 13 17.6V15.4Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M2 8.6C2 10.6742 2 11.7113 2.65901 12.3556C3.31802 13 4.37868 13 6.5 13C8.62132 13 9.68198 13 10.341 12.3556C11 11.7113 11 10.6742 11 8.6V6.4C11 4.32582 11 3.28873 10.341 2.64437C9.68198 2 8.62132 2 6.5 2C4.37868 2 3.31802 2 2.65901 2.64437C2 3.28873 2 4.32582 2 6.4V8.6Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M13 5.5C13 4.4128 13 3.8692 13.1713 3.44041C13.3996 2.86867 13.8376 2.41443 14.389 2.17761C14.8024 2 15.3266 2 16.375 2H18.625C19.6734 2 20.1976 2 20.611 2.17761C21.1624 2.41443 21.6004 2.86867 21.8287 3.44041C22 3.8692 22 4.4128 22 5.5C22 6.5872 22 7.1308 21.8287 7.55959C21.6004 8.13133 21.1624 8.58557 20.611 8.82239C20.1976 9 19.6734 9 18.625 9H16.375C15.3266 9 14.8024 9 14.389 8.82239C13.8376 8.58557 13.3996 8.13133 13.1713 7.55959C13 7.1308 13 6.5872 13 5.5Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        opacity="0.5"
                                        d="M2 18.5C2 19.5872 2 20.1308 2.17127 20.5596C2.39963 21.1313 2.83765 21.5856 3.38896 21.8224C3.80245 22 4.32663 22 5.375 22H7.625C8.67337 22 9.19755 22 9.61104 21.8224C10.1624 21.5856 10.6004 21.1313 10.8287 20.5596C11 20.1308 11 19.5872 11 18.5C11 17.4128 11 16.8692 10.8287 16.4404C10.6004 15.8687 10.1624 15.4144 9.61104 15.1776C9.19755 15 8.67337 15 7.625 15H5.375C4.32663 15 3.80245 15 3.38896 15.1776C2.83765 15.4144 2.39963 15.8687 2.17127 16.4404C2 16.8692 2 17.4128 2 18.5Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">ابزارک ها</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu nav-item">
                        <a href="font-icons.html" class="nav-link group">
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.5"
                                        d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M12 6.75C9.1005 6.75 6.75 9.1005 6.75 12C6.75 14.8995 9.1005 17.25 12 17.25C12.4142 17.25 12.75 17.5858 12.75 18C12.75 18.4142 12.4142 18.75 12 18.75C8.27208 18.75 5.25 15.7279 5.25 12C5.25 8.27208 8.27208 5.25 12 5.25C15.7279 5.25 18.75 8.27208 18.75 12C18.75 12.8103 18.6069 13.5889 18.3439 14.3108C18.211 14.6756 17.9855 14.9732 17.7354 15.204L17.6548 15.2783C16.8451 16.0252 15.6294 16.121 14.7127 15.5099C14.3431 15.2635 14.0557 14.9233 13.8735 14.5325C13.3499 14.9205 12.7017 15.15 12 15.15C10.2603 15.15 8.85 13.7397 8.85 12C8.85 10.2603 10.2603 8.85 12 8.85C13.7397 8.85 15.15 10.2603 15.15 12V13.5241C15.15 13.8206 15.2981 14.0974 15.5448 14.2618C15.8853 14.4888 16.3369 14.4533 16.6377 14.1758L16.7183 14.1015C16.8295 13.9989 16.8991 13.8944 16.9345 13.7973C17.1384 13.2376 17.25 12.6327 17.25 12C17.25 9.1005 14.8995 6.75 12 6.75ZM12 10.35C12.9113 10.35 13.65 11.0887 13.65 12C13.65 12.9113 12.9113 13.65 12 13.65C11.0887 13.65 10.35 12.9113 10.35 12C10.35 11.0887 11.0887 10.35 12 10.35Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark"> فونت آیکون</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu nav-item">
                        <a href="tables.html" class="nav-link group">
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.5"
                                        d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M18.75 8C18.75 8.41421 18.4142 8.75 18 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H18C18.4142 7.25 18.75 7.58579 18.75 8Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M18.75 12C18.75 12.4142 18.4142 12.75 18 12.75H6C5.58579 12.75 5.25 12.4142 5.25 12C5.25 11.5858 5.58579 11.25 6 11.25H18C18.4142 11.25 18.75 11.5858 18.75 12Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M18.75 16C18.75 16.4142 18.4142 16.75 18 16.75H6C5.58579 16.75 5.25 16.4142 5.25 16C5.25 15.5858 5.58579 15.25 6 15.25H18C18.4142 15.25 18.75 15.5858 18.75 16Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">جداول</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu nav-item">
                        <button
                            type="button"
                            class="nav-link group"
                            :class="{'active' : activeDropdown === 'forms'}"
                            @click="activeDropdown === 'forms' ? activeDropdown = null : activeDropdown = 'forms'"
                        >
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.5"
                                        d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M16.5189 16.5013C16.6939 16.3648 16.8526 16.2061 17.1701 15.8886L21.1275 11.9312C21.2231 11.8356 21.1793 11.6708 21.0515 11.6264C20.5844 11.4644 19.9767 11.1601 19.4083 10.5917C18.8399 10.0233 18.5356 9.41561 18.3736 8.94849C18.3292 8.82066 18.1644 8.77687 18.0688 8.87254L14.1114 12.8299C13.7939 13.1474 13.6352 13.3061 13.4987 13.4811C13.3377 13.6876 13.1996 13.9109 13.087 14.1473C12.9915 14.3476 12.9205 14.5606 12.7786 14.9865L12.5951 15.5368L12.3034 16.4118L12.0299 17.2323C11.9601 17.4419 12.0146 17.6729 12.1708 17.8292C12.3271 17.9854 12.5581 18.0399 12.7677 17.9701L13.5882 17.6966L14.4632 17.4049L15.0135 17.2214L15.0136 17.2214C15.4394 17.0795 15.6524 17.0085 15.8527 16.913C16.0891 16.8004 16.3124 16.6623 16.5189 16.5013Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M22.3665 10.6922C23.2112 9.84754 23.2112 8.47812 22.3665 7.63348C21.5219 6.78884 20.1525 6.78884 19.3078 7.63348L19.1806 7.76071C19.0578 7.88348 19.0022 8.05496 19.0329 8.22586C19.0522 8.33336 19.0879 8.49053 19.153 8.67807C19.2831 9.05314 19.5288 9.54549 19.9917 10.0083C20.4545 10.4712 20.9469 10.7169 21.3219 10.847C21.5095 10.9121 21.6666 10.9478 21.7741 10.9671C21.945 10.9978 22.1165 10.9422 22.2393 10.8194L22.3665 10.6922Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M7.25 9C7.25 8.58579 7.58579 8.25 8 8.25H14.5C14.9142 8.25 15.25 8.58579 15.25 9C15.25 9.41421 14.9142 9.75 14.5 9.75H8C7.58579 9.75 7.25 9.41421 7.25 9ZM7.25 13C7.25 12.5858 7.58579 12.25 8 12.25H11C11.4142 12.25 11.75 12.5858 11.75 13C11.75 13.4142 11.4142 13.75 11 13.75H8C7.58579 13.75 7.25 13.4142 7.25 13ZM7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H9.5C9.91421 16.25 10.25 16.5858 10.25 17C10.25 17.4142 9.91421 17.75 9.5 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">فرم ها</span>
                            </div>
                            <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'forms'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </button>
                        <ul x-cloak x-show="activeDropdown === 'forms'" x-collapse class="text-gray-500 sub-menu">
                            <li>
                                <a href="forms-basic.html">پایه</a>
                            </li>

                            <li>
                                <a href="forms-layouts.html">طرح‌بندی‌ها</a>
                            </li>
                            <li>
                                <a href="forms-validation.html"> اعتبار سنجی</a>
                            </li>

                            <li>
                                <a href="forms-select2.html">Select2</a>
                            </li>
                            <li>
                                <a href="forms-touchspin.html">TouchSpin</a>
                            </li>
                            <li>
                                <a href="forms-checkbox-radio.html">جعبه انتخاب و رادیو</a>
                            </li>
                            <li>
                                <a href="forms-switches.html">سوئیچ‌ها</a>
                            </li>
                            <li>
                                <a href="forms-wizards.html">ویزارد</a>
                            </li>
                            <li>
                                <a href="forms-file-upload.html">آپلود فایل</a>
                            </li>

                            <li>
                                <a href="forms-markdown-editor.html">ویرایشگر Markdown</a>
                            </li>
                            <li>
                                <a href="forms-clipboard.html">کلیپ بورد</a>
                            </li>
                        </ul>
                    </li>



                    <li class="menu nav-item">
                        <button
                            type="button"
                            class="nav-link group"
                            :class="{'active' : activeDropdown === 'users'}"
                            @click="activeDropdown === 'users' ? activeDropdown = null : activeDropdown = 'users'"
                        >
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <circle opacity="0.5" cx="15" cy="6" r="3" fill="currentColor" />
                                    <ellipse opacity="0.5" cx="16" cy="17" rx="5" ry="3" fill="currentColor" />
                                    <circle cx="9.00098" cy="6" r="4" fill="currentColor" />
                                    <ellipse cx="9.00098" cy="17.001" rx="7" ry="4" fill="currentColor" />
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">کاربران</span>
                            </div>
                            <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'users'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </button>
                        <ul x-cloak x-show="activeDropdown === 'users'" x-collapse class="text-gray-500 sub-menu">
                            <li>
                                <a href="users-profile.html">پروفایل</a>
                            </li>
                            <li>
                                <a href="users-account-settings.html">تنظیمات حساب</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu nav-item">
                        <button
                            type="button"
                            class="nav-link group"
                            :class="{'active' : activeDropdown === 'authentication'}"
                            @click="activeDropdown === 'authentication' ? activeDropdown = null : activeDropdown = 'authentication'"
                        >
                            <div class="flex items-center">
                                <svg
                                    class="group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.5"
                                        d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M8 17C8.55228 17 9 16.5523 9 16C9 15.4477 8.55228 15 8 15C7.44772 15 7 15.4477 7 16C7 16.5523 7.44772 17 8 17Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M6.75 8C6.75 5.10051 9.10051 2.75 12 2.75C14.8995 2.75 17.25 5.10051 17.25 8V10.0036C17.8174 10.0089 18.3135 10.022 18.75 10.0546V8C18.75 4.27208 15.7279 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8V10.0546C5.68651 10.022 6.18264 10.0089 6.75 10.0036V8Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">احراز هویت</span>
                            </div>
                            <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'authentication'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </button>
                        <ul x-cloak x-show="activeDropdown === 'authentication'" x-collapse class="text-gray-500 sub-menu">
                            <li>
                                <a href="auth-boxed-signin.html" target="_blank">ورود  </a>
                            </li>
                            <li>
                                <a href="auth-boxed-signup.html" target="_blank">ثبت نام  </a>
                            </li>
                            <li>
                                <a href="auth-boxed-lockscreen.html" target="_blank">باز کردن قفل </a>
                            </li>
                            <li>
                                <a href="auth-boxed-password-reset.html" target="_blank">بازیابی ID </a>
                            </li>
                            <li>
                                <a href="auth-cover-login.html" target="_blank">ورود کاور</a>
                            </li>
                            <li>
                                <a href="auth-cover-register.html" target="_blank">ثبت نام کاور</a>
                            </li>
                            <li>
                                <a href="auth-cover-lockscreen.html" target="_blank">باز کردن قفل کاور</a>
                            </li>
                            <li>
                                <a href="auth-cover-password-reset.html" target="_blank">بازیابی شناسه کاور</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
    <!-- end sidebar section -->

    <div class="main-content">
        <!-- start header section -->
        <header :class="{'dark' : $store.app.semidark && $store.app.menu === 'horizontal'}">
            <div class="shadow-sm">
                <div class="relative flex w-full items-center bg-white px-5 py-2.5 dark:bg-[#0e1726]">
                    <div class="flex items-center justify-between horizontal-logo ltr:mr-2 rtl:ml-2 lg:hidden">
                        <a href="index.html" class="flex items-center main-logo shrink-0">
                            <img class="inline w-8 ltr:-ml-1 rtl:-mr-1" src="{{url('panel')}}/images/logo.svg" alt="image" />
                        </a>

                        <a
                            href="javascript:;"
                            class="collapse-icon flex flex-none rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary ltr:ml-2 rtl:mr-2 dark:bg-dark/40 dark:text-[#d0d2d6] dark:hover:bg-dark/60 dark:hover:text-primary lg:hidden"
                            @click="$store.app.toggleSidebar()"
                        >
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </a>
                    </div>

                    <div
                        x-data="header"
                        class="flex items-center space-x-1.5 ltr:ml-auto rtl:mr-auto rtl:space-x-reverse dark:text-[#d0d2d6] sm:flex-1 ltr:sm:ml-0 sm:rtl:mr-0 lg:space-x-2"
                    >
                        <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }" @click.outside="search = false">
                            <form
                                class="absolute inset-x-0 z-10 hidden mx-4 -translate-y-1/2 top-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0"
                                :class="{'!block' : search}"
                                @submit.prevent="search = false"
                            >
                                <div class="relative">
                                    <input
                                        type="text"
                                        class="bg-gray-100 peer form-input placeholder:tracking-widest ltr:pl-9 ltr:pr-9 rtl:pr-9 rtl:pl-9 sm:bg-transparent ltr:sm:pr-4 rtl:sm:pl-4"
                                        placeholder="جستجو"
                                    />
                                    <button
                                        type="button"
                                        class="absolute inset-0 appearance-none h-9 w-9 peer-focus:text-primary ltr:right-auto rtl:left-auto"
                                    >
                                        <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        class="absolute block -translate-y-1/2 top-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden"
                                        @click="search = false"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                            <path
                                                d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <button
                                type="button"
                                class="p-2 rounded-full search_btn bg-white-light/40 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                                @click="search = ! search"
                            >
                                <svg
                                    class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                    <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <a
                                href="javascript:;"
                                x-cloak
                                x-show="$store.app.theme === 'light'"
                                href="javascript:;"
                                class="flex items-center p-2 rounded-full bg-white-light/40 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('dark')"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        opacity="0.5"
                                        d="M19.7778 4.22266L17.5558 6.25424"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path
                                        opacity="0.5"
                                        d="M4.22217 4.22266L6.44418 6.25424"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path
                                        opacity="0.5"
                                        d="M6.44434 17.5557L4.22211 19.7779"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path
                                        opacity="0.5"
                                        d="M19.7778 19.7773L17.5558 17.5551"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                </svg>
                            </a>
                            <a
                                href="javascript:;"
                                x-cloak
                                x-show="$store.app.theme === 'dark'"
                                href="javascript:;"
                                class="flex items-center p-2 rounded-full bg-white-light/40 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('system')"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </a>
                            <a
                                href="javascript:;"
                                x-cloak
                                x-show="$store.app.theme === 'system'"
                                href="javascript:;"
                                class="flex items-center p-2 rounded-full bg-white-light/40 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('light')"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    />
                                    <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </a>
                        </div>

                        <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                            <a
                                href="javascript:;"
                                class="relative block p-2 rounded-full bg-white-light/40 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="toggle"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    />
                                    <path
                                        d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>

                                <span class="absolute top-0 flex w-3 h-3 ltr:right-0 rtl:left-0">
                                            <span
                                                class="absolute -top-[3px] inline-flex h-full w-full animate-ping rounded-full bg-success/50 opacity-75 ltr:-left-[3px] rtl:-right-[3px]"
                                            ></span>
                                            <span class="relative inline-flex h-[6px] w-[6px] rounded-full bg-success"></span>
                                        </span>
                            </a>
                            <ul
                                x-cloak
                                x-show="open"
                                x-transition
                                x-transition.duration.300ms
                                class="top-11 w-[300px] divide-y !py-0 text-dark ltr:-right-2 rtl:-left-2 dark:divide-white/10 dark:text-white-dark sm:w-[350px]"
                            >
                                <li>
                                    <div class="flex items-center justify-between px-4 py-2 font-semibold hover:!bg-transparent">
                                        <h4 class="text-lg">نوتیفیکیشن</h4>
                                        <template x-if="notifications.length">
                                            <span class="badge bg-primary/80" x-text="notifications.length + 'New'"></span>
                                        </template>
                                    </div>
                                </li>
                                <template x-for="notification in notifications">
                                    <li class="dark:text-white-light/90">
                                        <div class="flex items-center px-4 py-2 group" @click.self="toggle">
                                            <div class="grid rounded place-content-center">
                                                <div class="relative w-12 h-12">
                                                    <img
                                                        class="object-cover w-12 h-12 rounded-full"
                                                        :src="`{{url('panel')}}/images/${notification.profile}`"
                                                        alt="image"
                                                    />
                                                    <span class="absolute right-[6px] bottom-0 block h-2 w-2 rounded-full bg-success"></span>
                                                </div>
                                            </div>
                                            <div class="flex flex-auto ltr:pl-3 rtl:pr-3">
                                                <div class="ltr:pr-3 rtl:pl-3">
                                                    <h6 x-html="notification.message"></h6>
                                                    <span class="block text-xs font-normal dark:text-gray-500" x-text="notification.time"></span>
                                                </div>
                                                <button
                                                    type="button"
                                                    class="opacity-0 text-neutral-300 hover:text-danger group-hover:opacity-100 ltr:ml-auto rtl:mr-auto"
                                                    @click="removeNotification(notification.id)"
                                                >
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                                        <path
                                                            d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                            stroke="currentColor"
                                                            stroke-width="1.5"
                                                            stroke-linecap="round"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </template>
                                <template x-if="notifications.length">
                                    <li>
                                        <div class="p-4">
                                            <button class="block w-full btn btn-primary btn-small" @click="toggle">همه نوتیفیکیشن ها را بخوانید</button>
                                        </div>
                                    </li>
                                </template>
                                <template x-if="!notifications.length">
                                    <li>
                                        <div class="!grid min-h-[200px] place-content-center text-lg hover:!bg-transparent">
                                            <div class="mx-auto mb-4 rounded-full text-primary ring-4 ring-primary/30">
                                                <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        opacity="0.5"
                                                        d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                            </div>
                                            اطلاعاتی موجود نیست.
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        <div class="flex-shrink-0 dropdown" x-data="dropdown" @click.outside="open = false">
                            <a href="javascript:;" class="relative group" @click="toggle()">
                                        <span
                                        ><img
                                                class="object-cover rounded-full h-9 w-9 saturate-50 group-hover:saturate-100"
                                                src="{{url('panel')}}/images/user-profile.jpeg"
                                                alt="image"
                                            /></span>
                            </a>
                            <ul
                                x-cloak
                                x-show="open"
                                x-transition
                                x-transition.duration.300ms
                                class="top-11 w-[230px] !py-0 font-semibold text-dark ltr:right-0 rtl:left-0 dark:text-white-dark dark:text-white-light/90"
                            >
                                <li>
                                    <div class="flex items-center px-4 py-4">
                                        <div class="flex-none">
                                            <img class="object-cover w-10 h-10 rounded-md" src="{{url('panel')}}/images/user-profile.jpeg" alt="image" />
                                        </div>
                                        <div class="ltr:pl-4 rtl:pr-4">
                                            <h4 class="text-base">
                                                جان دو<span class="px-1 text-xs rounded bg-success-light text-success ltr:ml-2 rtl:ml-2">Pro</span>
                                            </h4>
                                            <a
                                                class="text-black/60 hover:text-primary dark:text-dark-light/60 dark:hover:text-white"
                                                href="javascript:;"
                                            >johndoe@gmail.com</a
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="users-profile.html" class="dark:hover:text-white" @click="toggle">
                                        <svg
                                            class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                                            <path
                                                opacity="0.5"
                                                d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            />
                                        </svg>
                                        پروفایل</a
                                    >
                                </li>
                                <li>
                                    <a href="apps-mailbox.html" class="dark:hover:text-white" @click="toggle">
                                        <svg
                                            class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                opacity="0.5"
                                                d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            />
                                            <path
                                                d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                        صندوق ورودی</a
                                    >
                                </li>
                                <li>
                                    <a href="auth-boxed-lockscreen.html" class="dark:hover:text-white" @click="toggle">
                                        <svg
                                            class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            />
                                            <path
                                                opacity="0.5"
                                                d="M6 10V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V10"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <g opacity="0.5">
                                                <path
                                                    d="M9 16C9 16.5523 8.55228 17 8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16Z"
                                                    fill="currentColor"
                                                />
                                                <path
                                                    d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z"
                                                    fill="currentColor"
                                                />
                                                <path
                                                    d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z"
                                                    fill="currentColor"
                                                />
                                            </g>
                                        </svg>
                                        صفحه قفل</a
                                    >
                                </li>
                                <li class="border-t border-white-light dark:border-white-light/10">
                                    <a href="auth-boxed-signin.html" class="!py-3 text-danger" @click="toggle">
                                        <svg
                                            class="h-4.5 w-4.5 rotate-90 ltr:mr-2 rtl:ml-2"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                opacity="0.5"
                                                d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                        خروج از سیستم
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </header>
        <!-- end header section -->
         {{$slot}}
    </div>
</div>

{{--<script src="{{url('panel/js/alpine-collaspe.min.js')}}"></script>--}}
{{--<script src="{{url('panel/js/alpine-persist.min.js')}}"></script>--}}
{{--<script defer src="{{url('panel/js/alpine-ui.min.js')}}"></script>--}}
{{--<script defer src="{{url('panel/js/alpine-focus.min.js')}}"></script>--}}
{{--<script defer src="{{url('panel/js/alpine.min.js')}}"></script>--}}
<script src="{{url('panel/js/custom.js')}}"></script>
<script defer src="{{url('panel/js/apexcharts.js')}}"></script>
<script>
    // main section
    document.addEventListener('alpine:init', () => {
        Alpine.data('scrollToTop', () => ({
            showTopButton: false,
            init() {
                window.onscroll = () => {
                    this.scrollFunction();
                };
            },

            scrollFunction() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    this.showTopButton = true;
                } else {
                    this.showTopButton = false;
                }
            },

            goToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
        }));
        // theme customization
        Alpine.data('customizer', () => ({
            showCustomizer: false,
        }));
        // sidebar section
        Alpine.data('sidebar', () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));
        // header section
        Alpine.data('header', () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [
                {
                    id: 1,
                    profile: 'user-profile.jpeg',
                    message: '<strong class="mr-1 text-sm">جان دو</strong>شما را به <strong>نمونه سازی اولیه</strong> دعوت می کند',
                    time: '45 min ago',
                },
                {
                    id: 2,
                    profile: 'profile-34.jpeg',
                    message: '<strong class="mr-1 text-sm">آدام نولان</strong>از شما در <strong>مبانی UX</strong> نام برد',
                    time: '9h Ago',
                },
                {
                    id: 3,
                    profile: 'profile-16.jpeg',
                    message: '<strong class="mr-1 text-sm">آنا مورگان</strong>آپلود یک فایل',
                    time: '9h Ago',
                },
            ],

            messages: [
                {
                    id: 1,
                    image: '<span class="grid rounded-full place-content-center w-9 h-9 bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                    title: 'تبریک می گویم!',
                    message: 'سیستم عامل شما به روز شده است.',
                    time: '1hr',
                },
                {
                    id: 2,
                    image: '<span class="grid rounded-full place-content-center w-9 h-9 bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                    title: 'آیا می دانستی؟',
                    message: 'می توانید بین تابلوهای هنری جابجا شوید.',
                    time: '2hr',
                },
                {
                    id: 3,
                    image: '<span class="grid rounded-full place-content-center w-9 h-9 bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                    title: 'مشکلی پیش آمد!',
                    message: 'ارسال گزارش',
                    time: '2days',
                },
                {
                    id: 4,
                    image: '<span class="grid rounded-full place-content-center w-9 h-9 bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                    title: 'هشدار',
                    message: 'قدرت رمز عبور شما کم است.',
                    time: '5days',
                },
            ],

            languages: [
                {
                    id: 1,
                    key: 'Chinese',
                    value: 'zh',
                },
                {
                    id: 2,
                    key: 'Danish',
                    value: 'da',
                },
                {
                    id: 3,
                    key: 'English',
                    value: 'en',
                },
                {
                    id: 4,
                    key: 'French',
                    value: 'fr',
                },
                {
                    id: 5,
                    key: 'German',
                    value: 'de',
                },
                {
                    id: 6,
                    key: 'Greek',
                    value: 'el',
                },
                {
                    id: 7,
                    key: 'Hungarian',
                    value: 'hu',
                },
                {
                    id: 8,
                    key: 'Italian',
                    value: 'it',
                },
                {
                    id: 9,
                    key: 'Japanese',
                    value: 'ja',
                },
                {
                    id: 10,
                    key: 'Polish',
                    value: 'pl',
                },
                {
                    id: 11,
                    key: 'Portuguese',
                    value: 'pt',
                },
                {
                    id: 12,
                    key: 'Russian',
                    value: 'ru',
                },
                {
                    id: 13,
                    key: 'Spanish',
                    value: 'es',
                },
                {
                    id: 14,
                    key: 'Swedish',
                    value: 'sv',
                },
                {
                    id: 15,
                    key: 'Turkish',
                    value: 'tr',
                },
            ],

            removeNotification(value) {
                this.notifications = this.notifications.filter((d) => d.id !== value);
            },

            removeMessage(value) {
                this.messages = this.messages.filter((d) => d.id !== value);
            },
        }));
    });
</script>
</body>
</html>
