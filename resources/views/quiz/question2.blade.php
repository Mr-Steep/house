@props(['question', 'habitation'])
@if($question['items'])
    @foreach($question['items'] as $item)
        <button
            type="button"
            id="{{$item->id}}"
            onclick="$('#id_part_type_habitation').val({{$item->id}})"
            class="h-12 focus:bg-gray-900 focus:text-white text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-3xl text-sm px-5 py-2.5 text-center m-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
            {{$item->name}}
        </button>
    @endforeach
@endif
<input  id="id_part_type_habitation" name="id_part_type_habitation" type="text"  value="{{$habitation->id_part_type_habitation}}" hidden>
<input  name="column" type="text"  value="id_part_type_habitation" hidden>
