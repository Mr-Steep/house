<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="text-center py-3">
                Клиент
            </th>
            <th scope="col" class="text-center py-3">
                Жилище
            </th>
            <th scope="col" class="text-center py-3">
                Прибытие
            </th>
            <th scope="col" class="text-center py-3">
                Выезд
            </th>
            <th scope="col" class="text-center py-3">
                Цена
            </th>
            <th scope="col" class="text-center py-3">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($newBooking as $habitation)

            @foreach($habitation->booking as $book)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="text-center py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{route('profile.show', $book->user->id)}}" target="_blank" class="font-medium text-green-600 dark:text-green-500 hover:underline">{{$book->user->name}}</a>
                    </th>
                    <th scope="row" class="text-center py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$habitation->name}}
                    </th>
                    <td class="text-center py-3">
                        {{\Carbon\Carbon::parse($book->arrival)->format('d-m-y')}}
                    </td>
                    <td class="text-center py-3">
                        {{\Carbon\Carbon::parse($book->departure)->format('d-m-y')}}
                    </td>
                    <td class="text-center py-3">
                        {{$habitation->price}}
                    </td>
                    <td class="text-center py-3">
                        @if($book->confirmed == 1)
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Отменить</a>
                        @else
                            <form action="{{route('confirm', $book->id)}}" method="post">
                                @csrf
                                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Подтвердить</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
