<x-dashboard-layout>
    @php
        $newBooking  = App\View\Components\DashboardLayout::getNewBooking();
        $soonBooking  = App\View\Components\DashboardLayout::getSoonBooking();
        $inHouseBooking  = App\View\Components\DashboardLayout::getInHouseBooking();
        $departureBooking  = App\View\Components\DashboardLayout::getDepartureBooking();
        $archiveBooking  = App\View\Components\DashboardLayout::getArchiveBooking();
        $countNewBooking  = App\View\Components\DashboardLayout::getCountNewBooking();
        $countSoonBooking  = App\View\Components\DashboardLayout::getCountSoonBooking();
        $countInHouseBooking  = App\View\Components\DashboardLayout::getCountInHouseBooking();
        $countDepartureBooking  = App\View\Components\DashboardLayout::getCountDepartureBooking();
        $countArchiveBooking  = App\View\Components\DashboardLayout::getCountArchiveBooking();
    @endphp
    <div class="w-full">
        @if(agent()->isDesktop())
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">

                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500"
                            id="new-orders-tab" data-tabs-target="#new-orders" type="button" role="tab"
                            aria-controls="new-orders"
                            aria-selected="true">Новые заявки

                            <span
                                class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">
                            {{$countNewBooking}}
                    </span>
                        </button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="coming-soon-tab" data-tabs-target="#coming-soon" type="button" role="tab"
                            aria-controls="coming-soon"
                            aria-selected="false">Скоро приедут
                            <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">
                            {{$countSoonBooking}}
                            </span>
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="in-house-tab" data-tabs-target="#in-house" type="button" role="tab"
                            aria-controls="in-house" aria-selected="false">
                            Проживают
                            <span
                                class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">
                         {{$countInHouseBooking}}
                    </span>
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="archive-tab" data-tabs-target="#archive" type="button" role="tab"
                            aria-controls="archive"
                            aria-selected="false">Архив
                            <span
                                class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-red-600 bg-red-200 rounded-full dark:bg-red-900 dark:text-red-200">
                         {{$countArchiveBooking}}
                    </span>
                        </button>
                    </li>

                </ul>
            </div>
            <div id="myTabContent">

                <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="new-orders" role="tabpanel"
                     aria-labelledby="new-orders-tab">
                    @include('dashboard.booking.new-orders')
                </div>
                <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="coming-soon" role="tabpanel"
                     aria-labelledby="coming-soon-tab">
                    @include('dashboard.booking.coming-soon')
                </div>
                <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="in-house" role="tabpanel"
                     aria-labelledby="in-house-tab">
                    @include('dashboard.booking.in-house')
                </div>
                <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="archive" role="tabpanel"
                     aria-labelledby="archive-tab">
                    @include('dashboard.booking.archive')
                </div>
            </div>
        @else
            <div class="flex flex-row  items-center">
                <a href="{{route('dashboard.index')}}" class="py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-tl from-blue-black via-blue-grey to-blue-grey-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Назад
                </a>
            </div>
            <div id="accordion-open" data-accordion="open">
                <h2 id="accordion-open-heading-1">
                    <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                            aria-controls="accordion-open-body-1">
                        <span class="flex items-center">
                            <span
                                class="inline-flex justify-center items-center p-3 mr-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">
                            {{$countNewBooking}}
                            </span>
                            Новые заявки
                        </span>
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                    <div class="font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        @include('dashboard.booking.mobile.new-orders')
                    </div>
                </div>
                <h2 id="accordion-open-heading-2">
                    <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                            aria-controls="accordion-open-body-2">
                        <span class="flex items-center">
                                   <span class="inline-flex justify-center items-center p-3 mr-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">{{$countSoonBooking}}</span>
                            Скоро приедут
                        </span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                    <div class="font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        @include('dashboard.booking.mobile.coming-soon')
                    </div>
                </div>
                <h2 id="accordion-open-heading-3">
                    <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                            aria-controls="accordion-open-body-3">
                       <span class="flex items-center">
                                   <span class="inline-flex justify-center items-center p-3 mr-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">{{$countInHouseBooking}}</span>
                            Проживают
                        </span>

                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                    <div class="font-light border border-t-0 border-gray-200 dark:border-gray-700">
                        @include('dashboard.booking.mobile.in-house')
                    </div>
                </div>

                <h2 id="accordion-open-heading-4">
                    <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-open-body-4" aria-expanded="false"
                            aria-controls="accordion-open-body-4">
                       <span class="flex items-center">
                                  <span
                                      class="inline-flex justify-center items-center p-3 mr-3 w-3 h-3 text-sm font-medium text-red-600 bg-red-200 rounded-full dark:bg-red-900 dark:text-red-200">
                         {{$countArchiveBooking}}
                    </span> Архив
                        </span>

                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-4" class="hidden" aria-labelledby="accordion-open-heading-4">
                    <div class="font-light border border-t-0 border-gray-200 dark:border-gray-700">
                        @include('dashboard.booking.mobile.archive')
                    </div>
                </div>
            </div>

        @endif
    </div>
</x-dashboard-layout>
