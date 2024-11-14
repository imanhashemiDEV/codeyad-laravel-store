
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>  {{$title ?? "پنل مدیریت"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{url('panel/images/favicon.png')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/perfect-scrollbar.min.css')}}" />

{{--    <link rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/style.css')}}" />--}}
{{--    <link rel="stylesheet" type="text/css" media="screen" href="{{url('tailwind/assets/app-DL-Qw56t.css')}}" />--}}
     @vite('resources/css/app.css')
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/animate.css')}}" />
    <script src="{{url('panel/js/perfect-scrollbar.min.js')}}"></script>
    <script defer src="{{url('panel/js/popper.min.js')}}"></script>
    <script defer src="{{url('panel/js/tippy-bundle.umd.min.js')}}"></script>
    <script defer src="{{url('panel/js/sweetalert.min.js')}}"></script>
    <wireui:scripts />
</head>

<body
    x-data="main"
    class="relative overflow-x-hidden text-sm antialiased font-normal font-vazir font-nunito"
    :class="  [ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme, $store.app.menu, $store.app.layout,$store.app.rtlClass]"
>
<!-- sidebar menu overlay -->
<div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

<!-- screen loader -->
@include('admin.layouts.loader')

<div class="min-h-screen text-black main-container dark:text-white-dark" :class="[$store.app.navbar]">
    <!--  sidebar section -->
    @include('admin.layouts.sidebar')

    <div class="main-content">
        <!-- start header section -->
        @include('admin.layouts.panel_header')

        <div class="p-6 animate__animated" :class="[$store.app.animation]">
            <div x-data>
                <ul class="flex space-x-2 rtl:space-x-reverse">
                    <li>
                        <a href="{{route('panel')}}" class="text-primary hover:underline">داشبورد</a>
                    </li>
                    <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                        <span>{{$title}}</span>
                    </li>
                </ul>
                {{$slot}}
            </div>
        </div>

    </div>
</div>

{{--<script src="{{url('panel/js/alpine-collaspe.min.js')}}"></script>--}}
{{--<script src="{{url('panel/js/alpine-persist.min.js')}}"></script>--}}
{{--<script defer src="{{url('panel/js/alpine-ui.min.js')}}"></script>--}}
{{--<script defer src="{{url('panel/js/alpine-focus.min.js')}}"></script>--}}
{{--<script defer src="{{url('panel/js/alpine.min.js')}}"></script>--}}
<script src="{{url('panel/js/custom.js')}}"></script>
<script>
    // main section
    document.addEventListener('alpine:init', () => {
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
