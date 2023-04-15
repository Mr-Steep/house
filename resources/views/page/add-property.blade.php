<x-app-layout>


    <div class="sm:p-0 md:p-5 lg:p-5 xl:p-5">


        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
            <div class="bg-purple-600 h-2.5 rounded-full dark:bg-purple-500" style="width: {{$question['percent']}}%"></div>
        </div>



        @include('quiz.btn-start')


    </div>
</x-app-layout>



