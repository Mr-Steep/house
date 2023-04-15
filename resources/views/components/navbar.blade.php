<nav
    class="bg-white rounded-full shadow-lg px-2 sm:px-4 py-2.5 dark:bg-gray-900 p-2 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="flex items-center ">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        <div class="grow justify-center" id="search-bar">
            @include('components.search-bar')
        </div>
        <div class="flex flex-nowrap ">
            <a href="{{route('habitation.create')}}"
               class=" mx-2 sm:flex  md:flex hidden relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-tl from-blue-black  via-blue-grey to-blue-grey-white group-hover:from-orange-600 group-hover:to-orange-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span
                    class="relative px-2 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Сдать жилье
                 </span>
            </a>
            <div class="flex items-center sm:flex hidden ">
                @include('components.button-language')
            </div>
            @if(Auth::user())
                @include('components.dropbox-user')
            @else
                @include('components.dropbox')
            @endif
        </div>
    </div>
</nav>

