<button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
        class="inline-flex bg-transparent	 items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-transparent dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        type="button">
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
    </svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownDots"
     class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
        <li>
            <a href="{{route('login')}}"
               class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Войти</a>
        </li>
        <li>
            <a href="{{route('register')}}"
               class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Зарегистрироваться</a>
        </li>
        <li>
            <a href="{{route('habitation.create')}}"
               class=" flex sm:hidden block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    Сдать жилье
            </a>
        </li>

    </ul>
    <div class="py-1">
{{--        <a href="#"--}}
{{--           class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">--}}
{{--            Пиздатая Кнопка--}}
{{--        </a>--}}
    </div>
</div>
