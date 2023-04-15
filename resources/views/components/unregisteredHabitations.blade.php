@props(['unregisteredHabitations'])

<div {!! $attributes->merge(['class'=>'h-screen	w-screen flex flex-col overflow-hidden bg-gradient-to-tl from-blue-black  via-blue-grey to-blue-grey-white sm:flex-row']) !!}>


    <div {!! $attributes->merge(['class'=>' basis-1/6 flex items-center justify-center m-5  text-white decoration-sky-500/30 font-semibold  text-2xl	  sm:basis-1/2'])!!}>
        <h3 class="">У Вас есть незавршенные объявления </h3>
    </div>


    <div {!! $attributes->merge(['class'=>'bg-white basis-5/6 rounded-t-2xl flex flex-col   sm:rounded-none  sm:basis-1/2'])!!}>

        <div {!! $attributes->merge(['class'=>'flex-1 flex flex-col  items-center justify-center'])!!}>

            @foreach($unregisteredHabitations as $item)
                <div>
                    <form action="{{route('habitation.edit', $item->id)}}" method="get">
                        @csrf
                        <button type="submit"
                                class="h-12	 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-3xl text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            {{$item->name?? 'Продолжить'}}
                        </button>
                    </form>
                </div>

            @endforeach
        </div>

        <div {!! $attributes->merge(['class'=>'flex-1 flex flex-col  justify-center'])!!}>

            <div {!! $attributes->merge(['class'=>'flex-initial	flex justify-between p-1'])!!}>
                <form action="{{route('habitation-all')}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit"
                            class="h-12	 text-red-900 hover:text-white border border-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-3xl text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-600 dark:text-red-400 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800">
                        Удалить
                    </button>
                </form>

                <form action="/" method="get">
                    @csrf
                    <button type="submit"
                            class="h-12	 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-3xl text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                        Главная страница
                    </button>
                </form>


            </div>
        </div>


    </div>
