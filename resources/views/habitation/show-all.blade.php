@props(['habitation'])
@php
    $images = $habitation->images()->get();
@endphp
<x-app-layout>


    <a href="{{route('habitation.show', $habitation)}}" type="button" class="m-5 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
        <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span class="sr-only">Icon description</span>
    </a>

<div class="container">
    @foreach($images as $image)
        <img class="h-auto  mx-auto max-w-xl p-5 transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0" src="{{asset($image->path)}}" alt="image description">
    @endforeach
</div>

</x-app-layout>
