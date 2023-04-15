<style>

    @media (max-width: 1200px) {

        .start,
        .end,
        .country-city {
            width: 180px;
        }
    }

    @media (max-width: 1100px) {

        .start,
        .end,
        .country-city {
            width: 150px;
        }
    }

    @media (max-width: 950px) {

        .start,
        .end,
        .country-city {
            width: 100px;
        }
    }

    @media (max-width: 767px) {
        .start,
        .end,
        .country-city {
            width: 85px;
        }

        .icon-cal div {
            display: none;
        }

        .icon-cal input {
            padding: 0.5rem;
        }
    }

    @media (max-width: 400px) {
        .start {
            width: 80px;
            font-size:11px ;
        }

        .end {
            width: 80px;
            font-size:11px ;
        }

        .country-city {
            width: 80px;
            font-size:11px ;
        }

        .icon-cal div {
            display: none;
        }

        .icon-cal input {
            padding: 0.5rem;
        }

        .country-city:focus {
            width: 200px;
        }
        .country-city:focus .start {
            display: none;
        }
        .country-city:focus .end {
            display: none;
        }
    }
</style>

<form action="{{request()->url()}}" method="get" >
    <div class="flex justify-center  rounded-md " role="group">
        <x-suggest-yandex-search class="mb-4 "/>
        <div date-rangepicker id="dateRangePickerSearch" class="flex items-center">
            <div class="relative icon-cal">
                <div class="flex  absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                              clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input name="start" type="text" value="{{request('start')}}"
                       class="border-l-0 start py-2 pl-10 w-auto px-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 "
                       placeholder="Прибытие">
            </div>
            <div class="relative icon-cal">
                <div class="flex absolute   inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                              clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input name="end" type="text" value="{{request('end')}}"
                       class="end border-l-0 py-2 pl-10 px-4 w-auto text-sm font-medium text-gray-900 bg-white border border-gray-200  "
                       placeholder="Выезд">
            </div>
        </div>


        <button type="submit"
                class="border-l-0  py-2 px-2 text-sm font-medium text-white bg-gradient-to-tl border-gray-300 from-blue-black via-blue-grey to-blue-grey-white rounded-r-lg border">
            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <span class="sr-only">Search</span>
        </button>
    </div>

</form>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        const dateRangePickerEl = document.getElementById('dateRangePickerSearch');

        new DateRangePicker(dateRangePickerEl, {
            minDate: '{{\Carbon\Carbon::today()}}',
            firstDay: 1,
            language: 'ru',
        });
    });
</script>


{{--    <script>--}}
{{--        // set the dropdown menu element--}}
{{--        const targetEl = document.getElementById('dropdownCountry');--}}
{{--        const $targetEl = $('#dropdownCountry');--}}


{{--        // set the element that trigger the dropdown menu on click--}}
{{--        const triggerEl = document.getElementById('dropdownButtonCountry');--}}
{{--        const $triggerEl = $('#dropdownButtonCountry');--}}

{{--        // options with default values--}}
{{--        const options = {--}}
{{--            placement: 'bottom',--}}
{{--            onHide: () => {--}}
{{--                console.log('dropdown has been hidden');--}}
{{--                $targetEl.show()--}}

{{--            },--}}
{{--            onShow: () => {--}}
{{--                console.log('dropdown has been show');--}}
{{--                $targetEl.show()--}}
{{--            }--}}
{{--        };--}}
{{--        const dropdown = new Dropdown(targetEl, triggerEl, options);--}}

{{--        $('ul li div').on('click', function(){--}}
{{--           $country = $(this).find('label').text()--}}
{{--            $triggerEl.text($country)--}}
{{--            $targetEl.hide()--}}
{{--        } )--}}


{{--    </script>--}}


{{--    <div class="flex">--}}
{{--        <button id="dropdown-button" data-dropdown-toggle="dropdown"--}}
{{--                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"--}}
{{--                type="button"><label class="sm:flex hidden">#</label>--}}
{{--            <svg aria-hidden="true" class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"--}}
{{--                 xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path fill-rule="evenodd"--}}
{{--                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"--}}
{{--                      clip-rule="evenodd"></path>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"--}}
{{--             data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"--}}
{{--             style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">--}}
{{--            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">--}}
{{--                <li>--}}
{{--                    <button type="button"--}}
{{--                            class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">--}}
{{--                        #рядом со мной--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <button type="button"--}}
{{--                            class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">--}}
{{--                         #свободные--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <button type="button"--}}
{{--                            class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">--}}
{{--                         #в ближайшее время--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <button type="button"--}}
{{--                            class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">--}}
{{--                        #с завтраком--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div date-rangepicker="" id="dateRangePickerSearch" class="flex items-center">--}}
{{--                        <div class="relative">--}}
{{--                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">--}}
{{--                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>--}}
{{--                            </div>--}}
{{--                            <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date start">--}}
{{--                        </div>--}}
{{--                        <div class="relative">--}}
{{--                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">--}}
{{--                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>--}}
{{--                            </div>--}}
{{--                            <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date end">--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <script>--}}
{{--                        document.addEventListener("DOMContentLoaded", function (event) {--}}
{{--                            const dateRangePickerEl = document.getElementById('dateRangePickerSearch');--}}

{{--                            new DateRangePicker(dateRangePickerEl, {--}}
{{--                                minDate: {{\Carbon\Carbon::today()->format('Y-m-d')}},--}}
{{--                                firstDay: 1,--}}
{{--                                language: 'ru',--}}
{{--                                // beforeShowDay: function (t) {--}}
{{--                                //     let ts = Date.parse(t)--}}
{{--                                //     let cell = $(`span[data-date="${ts}"]`)--}}
{{--                                //     let tres = new Date(t);--}}
{{--                                //     for (const i in elem) {--}}
{{--                                //         let arrival = elem[i].arrival--}}
{{--                                //         let departure = elem[i].departure--}}
{{--                                //         let _arrival = new Date(arrival);--}}
{{--                                //         let _departure = new Date(departure);--}}
{{--                                //         if (tres >= _arrival && tres <= _departure) {--}}
{{--                                //             cell.addClass('text-red-600	line-through cursor-not-allowed')--}}
{{--                                //             return []--}}
{{--                                //         }--}}
{{--                                //     }--}}
{{--                                //     return true;--}}
{{--                                // }--}}

{{--                            });--}}
{{--                        });--}}
{{--                    </script>--}}

{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}


{{--        <div class="relative w-full">--}}
{{--            <input type="search" id="search-dropdown"--}}
{{--                   class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"--}}
{{--                   placeholder="Search Mockups, Logos, Design Templates..." required>--}}
{{--            <button type="submit"--}}
{{--                    class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-gradient-to-tl border-gray-300 from-yellow-300  via-amber-500 to-orange-600 rounded-r-lg border  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">--}}
{{--                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"--}}
{{--                     xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>--}}
{{--                </svg>--}}
{{--                <span class="sr-only">Search</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}


