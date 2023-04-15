<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <main class="sm:p-0 md:p-5 lg:p-5 xl:p-5  h-full p-1">
            @include('components.navbar')
            <div class="pt-5">

                @if (session('isMap'))
                    <style>
                        @media (max-width: 768px) {
                            .bar {
                                display: none;
                            }
                        }

                    </style>
                    <a href="/" type="button"
                       class=" z-50 fixed left-1/2 -translate-x-1/2
            text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700
            bottom-10">
                        Аппартаменты
                    </a>
                    <x-yandex-map-black class="mb-4" :habitations="$habitations"/>
                @else

                    <a href="/map"
                       class="z-50 fixed left-1/2 -translate-x-1/2  bottom-10 inset-x-auto place-content-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                       type="button">Карта
                    </a>

                    <div class=" grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">

                        @foreach($habitations as $habitation)
                            <x-card class="mb-4" :habitation="$habitation"/>
                        @endforeach
                    </div>
                @endif
            </div>
        </main>
    </div>
</x-app-layout>
