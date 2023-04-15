{{--<a href="{{ request()->fullUrlWithQuery(['question' => 'baz'])}}" type="button" class=" fixed--}}
{{--        left-1/2 -translate-x-1/2--}}
{{--        top-1/2 -translate-y-1/2--}}
{{--        text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">--}}
{{--    Начать--}}
{{--</a>--}}
@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
