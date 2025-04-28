<div class="pt-5">
    <div class="grid grid-cols-1 gap-6 mb-6 text-white sm:grid-cols-2 xl:grid-cols-4">
        <!-- Users Visit -->
        <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
            <div class="flex justify-between">
                <div class="font-semibold text-md ltr:mr-1 rtl:ml-1">تعداد کاربران</div>
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
                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{$users_count}}</div>
            </div>
        </div>

        <!-- Sessions -->
        <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
            <div class="flex justify-between">
                <div class="font-semibold text-md ltr:mr-1 rtl:ml-1">سفارش در حال پردازش</div>
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
                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{$in_progress_count}}</div>
            </div>
        </div>

        <!-- Time On-Site -->
        <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
            <div class="flex justify-between">
                <div class="font-semibold text-md ltr:mr-1 rtl:ml-1">سفارش ارسال شده</div>
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
                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{$send_count}}</div>
            </div>
        </div>

        <!-- Bounce Rate -->
        <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
            <div class="flex justify-between">
                <div class="font-semibold text-md ltr:mr-1 rtl:ml-1">سفارش مرجوع شده</div>
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
                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">{{$rejected_count}}</div>
            </div>

        </div>
    </div>

    <div class="bg-white rounded-md">
        <div class="p-4">
            <div id="apex_chart_one" style="height: 400px"></div>
        </div>
    </div>

</div>
@assets
<script src="{{url('panel/js/apexcharts.min.js')}}"></script>
@endassets
@script
<script>
    Apex.chart = {
        fontFamily: 'inherit',
        locales: [{
            "name": "fa",
            "options": {
                "shortDays": ["ی", "د", "س", "چ", "پ", "ج", "ش"],
                "toolbar": {
                    "exportToSVG": "دریافت SVG",
                    "exportToPNG": "دریافت PNG",
                    "menu": "فهرست",
                    "selection": "انتخاب",
                    "selectionZoom": "بزرگنمایی قسمت انتخاب شده",
                    "zoomIn": "بزرگ نمایی",
                    "zoomOut": "کوچک نمایی",
                    "pan": "جا به جایی",
                    "reset": "بازنشانی بزرگ نمایی"
                }
            }
        }],
        defaultLocale: "fa"
    }

    apex_chart_one();



    function apex_chart_one() {
        let options = {
            chart: {
                height: 350,
                type: 'bar'
            },
            title: {
                text: 'تعداد فروش در هر ماه',
                align: 'center',
                floating: true
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'تعداد فروش ها',
                data: [1,2,3,4,5,6,7,8,9,1,2]
            }],
            xaxis: {
                categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']
            },
            yaxis: {
                title: {
                    text: 'تعداد'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + 'مورد';
                    }
                }
            }
        };

        let chart = new ApexCharts(
            document.querySelector("#apex_chart_one"),
            options
        );

        chart.render();
    }


</script>
@endscript
