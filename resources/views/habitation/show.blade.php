@props(['habitation'])
<x-app-layout>
    <div class="min-h-screen bg-gray-100 sm:p-0 md:p-5 lg:p-5 xl:p-5 ">
        @include('components.navbar')
        @method('post')
        <div class="bg-white rounded-3xl">
            <div class="mt-6 pt-6 ">
                @php
                    $images = $habitation->images()->get();
                @endphp
                <div class="lg:hidden ">
                    <x-swiper :images="$habitation->images()->get()"/>

                </div>
                <!-- Image gallery -->

                <div class="relative mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">

                    <div class="aspect-w-3 aspect-h-4 hidden overflow-hidden rounded-lg lg:block bg-cover bg-center"
                         style="background-image: url('{{asset($images[0]->path)}}')">
                    </div>
                    <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                        <div class="aspect-w-3 aspect-h-2 overflow-hidden rounded-lg  bg-cover bg-center"
                             style="background-image: url('{{asset($images[1]->path)}}')">
                        </div>
                        <div class="aspect-w-3 aspect-h-2 overflow-hidden rounded-lg bg-cover bg-center"
                             style="background-image: url('{{asset($images[2]->path)}}')">
                        </div>
                    </div>
                    <div
                            class="aspect-w-3 h-450 aspect-h-4 hidden overflow-hidden rounded-lg lg:block bg-cover bg-center"
                            style="background-image: url('{{asset($images[3]->path)}}')">
                    </div>
                    <div class="absolute bottom-0 right-0 pr-8 hidden lg:block">

                        <a href="{{route('habitation.show-all', $habitation)}}" type="button"
                           class="px-3 py-2 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Показать все фото
                        </a>
                    </div>
                </div>


                <!-- Product info -->
                <div
                        class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
                    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                            {{$habitation->name}}</h1>
                    </div>

                    <!-- Options -->
                    <div class="mt-4 lg:row-span-3 lg:mt-0">
                        <h2 class="sr-only">Product information</h2>
                        <p class="text-3xl tracking-tight text-gray-900">${{$habitation->price}} за ночь</p>

                        <!-- Reviews -->
                        <x-modal-review :habitation="$habitation"></x-modal-review>


                        <form action="{{route('booking.store')}}" method="post">
                            @csrf
                            <!-- Calendar -->
                            <div class="mt-10">
                                <div class="p-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                    <div class="mb-4">

                                        <div date-rangepicker="" id="dateRangePickerId" class="flex items-center">
                                            <div class="relative">
                                                <div
                                                        class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                         class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                         fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input name="start" type="text"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                                                       placeholder="Прибытие" readonly required>
                                            </div>
                                            <span class="mx-2 text-gray-500"></span>
                                            <div class="relative">
                                                <div
                                                        class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                         class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                         fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input name="end" type="text"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                                                       placeholder="Выезд" readonly required>
                                            </div>
                                        </div>

                                        <style>
                                            span.datepicker-cell.disabled {
                                                color: #8c929d;
                                            }
                                        </style>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function (event) {
                                                const dateRangePickerEl = document.getElementById('dateRangePickerId');
                                                let elem = JSON.parse(`{!!json_encode($habitation->booking()->get())!!}`)

                                                new DateRangePicker(dateRangePickerEl, {
                                                    minDate: moment().startOf('day').toDate(),
                                                    defaultTime: moment().startOf('day').toDate(),
                                                    firstDay: 1,
                                                    language: 'ru',
                                                    beforeShowDay: function (t) {
                                                        let ts = Date.parse(t)
                                                        let cell = $(`span[data-date="${ts}"]`)
                                                        let tres = new Date(t);
                                                        for (const i in elem) {
                                                            let arrival = elem[i].arrival
                                                            let departure = elem[i].departure
                                                            let _arrival = new Date(arrival);
                                                            let _departure = new Date(departure);
                                                            if (tres >= _arrival && tres <= _departure) {
                                                                cell.addClass('text-red-600	line-through cursor-not-allowed')
                                                                return []
                                                            }
                                                        }
                                                        return true;
                                                    }

                                                });
                                            });

                                        </script>
                                    </div>

                                    <div class="mb-4 flex flex-row">
                                        {{--                                        <label for="visitors"--}}
                                        {{--                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">--}}
                                        {{--                                            Количество Гостей</label>--}}
                                        <input type="number" name="adult" id="adult" inputmode="numeric"
                                               class="m- bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="Кол-во взрослых" required>
                                        <span class="mx-2 text-gray-500"></span>

                                        <input type="number" name="children" id="children" inputmode="numeric"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="Кол-во детей" required>
                                    </div>


                                    <button type="submit"
                                            class="flex w-full  inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-blue-black via-blue-grey to-blue-grey-white group-hover:from-red-200 group-hover:via-red-300 hover:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                                        <span
                                                class="flex w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                           Забронировать
                                        </span>
                                    </button>
                                    <p class="my-2 font-normal text-center text-gray-700 dark:text-gray-400">
                                        или
                                    </p>
                                    <button type="button" data-modal-toggle="popup-modal"
                                            class=" flex w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br  from-blue-black via-blue-grey to-blue-grey-white hover:text-white group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                                        <span class="flex w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Связаться с Хозяином</span>
                                    </button>
                                </div>
                                <input hidden name="habitation" value="{{$habitation->id}}">
                            </div>
                        </form>
                    </div>


                    <div id="popup-modal" tabindex="-1"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-toggle="popup-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <form method="post" action="{{route('messages.store')}}">
                                    @csrf
                                    @method('post')
                                    <input type="text" hidden name="to_user_id" value="{{$habitation->user_id}}">
                                    <div class="p-6 text-center">
                                        <label for="message"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Связаться
                                            с хозяином</label>
                                        <textarea id="message" name="message" rows="4"
                                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                  placeholder="Добрый день ... Хотелось бы узнать ..."></textarea>

                                        <div class="pt-2">

                                            <button data-modal-toggle="popup-modal" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                Отмена
                                            </button>

                                            <button type="submit"
                                                    class=" flex inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-blue-black via-blue-grey to-blue-grey-white group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                                            <span
                                                    class="flex w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                Отправить
                                            </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                    <div
                            class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pb-16 lg:pr-8">
                        <!-- Description and details -->
                        <div>
                            <h3 class="sr-only">Description</h3>

                            <div class="space-y-6">
                                <p class="text-base text-gray-900">
                                    <span
                                            class="inline-block border-solid border-2 border-gray-200 rounded-full px-5 py-3 text-sm font-semibold text-gray-700 mr-4 mb-4">{!! $habitation->type_habitations()->get()->first()->name !!}</span>
                                    <span
                                            class="inline-block border-solid border-2 border-gray-200 rounded-full px-5 py-3 text-sm font-semibold text-gray-700 mr-4 mb-4">{!! $habitation->type_part_habitations()->get()->first()->name??''!!}</span>
                                </p>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h3 class="text-sm font-medium text-gray-900">Преимущества</h3>

                            <div class="mt-4">
                                <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                    @foreach($habitation->advantages() as $adv)
                                        <span
                                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$adv->name}}</span>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h2 class="text-sm font-medium text-gray-900">Описание</h2>

                            <div class="mt-4 space-y-6">
                                <p class="text-sm text-gray-600">
                                    {{$habitation->description}}
                                </p>
                            </div>
                        </div>
                        <x-map-show :habitation="$habitation"/>
                        <div>

                            {{--                            <x-calendar-show :habitation="$habitation"/>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(session()->get('ok'))
        <div id="toast-top"
             class="bg-white inset-x-0	z-10 dark:bg-gray-800 dark:divide-gray-700 dark:text-gray-400 divide-gray-200 fixed flex items-center max-w-xs mx-auto p-4 rounded-lg shadow text-gray-500 top-5 w-full"
             role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Бронь прошла успешно ждите подтверждения хозяина</div>
            <button type="button"
                    onclick="$('#toast-top').hide()"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif



    @if (session('success'))
        <div id="toast-top"
             class="bg-white inset-x-0 z-10	 dark:bg-gray-800 dark:divide-gray-700 dark:text-gray-400 divide-gray-200 fixed flex items-center max-w-xs mx-auto p-4 rounded-lg shadow text-gray-500 top-5 w-full"
             role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{session('success')}}</div>
            <button type="button"
                    onclick="$('#toast-top').hide()"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $i => $error)
            <div id="toast-top{{$i}}"
                 class="bg-white inset-x-0 z-10	 dark:bg-gray-800 dark:divide-gray-700 dark:text-gray-400 divide-gray-200 fixed flex items-center max-w-xs mx-auto p-4 rounded-lg shadow text-gray-500 top-5 w-full"
                 role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{$error}}</div>
                <button type="button"
                        onclick="$('#toast-top{{$i}}').hide()"
                        class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endforeach

    @endif


</x-app-layout>
