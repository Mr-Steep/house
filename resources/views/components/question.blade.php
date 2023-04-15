@props(['question', 'habitation'])
<div role="status" id="spinner" class="hidden fixed w-full">
    <div class="absolute brightness-50 opacity-50	bg-black	 h-screen w-full">
    </div>
    <svg aria-hidden="true" class=" mt-50 z-5 mx-auto w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
</div>

<form id="form" action="{{route('habitation.update', $habitation->id)}}" method="post">

    <div {!! $attributes->merge(['class'=>'h-screen	w-screen flex flex-col overflow-hidden bg-gradient-to-tl from-blue-black  via-blue-grey to-blue-grey-white sm:bg-gradient-to-t sm:flex-row']) !!}>


        <div {!! $attributes->merge(['class'=>' basis-1/6 flex items-center justify-center m-5  text-white decoration-sky-500/30 font-semibold  text-2xl sm:basis-1/2'])!!}>
            <h3 class="">{{$question['name']}}</h3>
        </div>


    @if ($message = Session::get('error'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div {!! $attributes->merge(['class'=>'bg-white basis-5/6 rounded-t-2xl flex flex-col   sm:rounded-none  sm:basis-1/2'])!!}>
            @method('patch')
            @csrf

            <div {!! $attributes->merge(['class'=>'flex-1 flex flex-col  justify-center'])!!}>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <div
                            class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                            role="alert">
                            @foreach ($errors->all() as $error)
                                <p class="font-medium">{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($habitation->question < 10)
                    @include('quiz.question' . $habitation->question)
                @else
                    <span class="justify-center px-5">  Ваше объявление отправлено на модерацию</span>

                @endif
            </div>


            <div {!! $attributes->merge(['class'=>'flex-initial	flex justify-between p-1'])!!}>

                <button
                    id="cancelButton"

                    type="button"
                    class="py-2.5 _submit px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-3xl border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Назад
                </button>

                <button
                    type="submit"
                    class="text-white _submit bg-gradient-to-tl from-blue-black  via-blue-grey to-blue-grey-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-3xl text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    @if($habitation->question < 10)
                         Далее
                    @else
                        Перейти в личный кабинет
                    @endif
                </button>

            </div>

            <div {!! $attributes->merge(['class'=>' w-full bg-white h-2.5 dark:bg-gray-700 pb-24']) !!}>
                <div
                    id="perc"{!! $attributes->merge(['class'=>'  bg-gradient-to-tl from-blue-black  via-blue-grey to-blue-grey-white  h-2.5 dark:bg-purple-500" style="width: '.$question['percent'].'% !important']) !!}>
                </div>
            </div>
        </div>

    </div>
</form>


<script>
    $('#perc').css('width', '{{$question['percent']}}%')


    $('._submit').one('click', function(){
        $(this).attr('disabled', true)
        const form = document.getElementById('form');
        form.submit();
    })

    $('#cancelButton').one('click', function(){
        $(this).attr('disabled', true)
        location.href="{{route('cancel', $habitation->id)}}"
    })

</script>
