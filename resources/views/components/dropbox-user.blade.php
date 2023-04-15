@props(['user'=>Auth::user()])


<button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class=" rounded-full text-sm" type="button">
    <span class="sr-only">Open user menu</span>
    @if($user->image)
        <img class="w-8 h-8 rounded-full" src="{{$user->image}}" alt="user photo">
    @else
        <svg class="mr-2 w-10 h-10 text-gray-200 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
    @endif
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 3865px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
    <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
        <div>{{$user->name}}</div>
        <div class="font-medium truncate">{{$user->email}}</div>
    </div>
    <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
        <li>
            <a href="{{route('dashboard.index')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Кабинет</a>
        </li>
        <li>
            <a href="{{route('habitation.create')}}"
               class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Сдать жилье
            </a>
        </li>
        <li>
            <a href="{{route('dashboard.settings')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Настройки</a>
        </li>
        <li>
            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
        </li>
    </ul>
    <div >
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                {{ __('Выйти') }}
            </x-responsive-nav-link>
        </form>
    </div>
</div>
