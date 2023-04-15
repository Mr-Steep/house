@props(['question', 'habitation'])

<div class="overflow-auto	">
    @if($question['items'])
        @foreach($question['items'] as $item)
            <button type="button"
                    id="bt_{{$item->id}}"
                    data-id="{{$item->id}}"
                    onclick="_click('bt_{{$item->id}}')"
                    class="h-12 text-gray-900 border border-gray-800   font-medium rounded-3xl text-sm px-5 py-2.5 text-center m-2 mb-2 ">
                {{$item->name}}
            </button>
        @endforeach
    @endif
    <input type="text" hidden name="ids_advantages[]" id="ids_advantages">
</div>
<style>
[touch]{
    background: linear-gradient(45deg, rgba(4,16,42,1) 0%, rgba(45,57,77,1) 71%, rgba(59,73,94,1) 100%);
    color: white;
}
</style>
<script>
    $('#back-white').css('height', 'auto')
    $('#back-white').css('overflow', 'auto')
    function _click(id) {
        let $el = $(`#${id}`);
        let touch = $el.attr('touch')

        if (($('#ids_advantages').val()).split(',').length > 4 && !touch){
            return 0;
        }


        if(!touch){
            $el.attr('touch', true)
        }else{
            $el.removeAttr('touch')
        }
        updateIndex()
    }


    function updateIndex(){
        let ids = [];
        if(ids.length >4){}
        $('button[touch="true"]').each(function(){
            ids.push($(this).data('id'))
        });
        $('#ids_advantages').val(ids)
    }

</script>
