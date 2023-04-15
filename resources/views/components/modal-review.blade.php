@props(['habitation'])
@php
    $count = count($habitation->reviews);
    $text = match (true) {
                    $count == 1             => 'отзыв' ,
                    $count != 1 && $count<5 => 'отзыва',
                    default                 => 'отзывов'
                };
    $average_value = $count==0 ?4: $habitation->reviews->avg('score');
@endphp
<div class="mt-6">
    <h3 class="sr-only">Reviews</h3>
    <div class="flex items-center">
        <div class="flex items-center text-yellow-300">
            @foreach([0,1,2,3,4] as $el )
                <svg aria-hidden="true" class="w-7 h-7"
                     fill="{{$el>$average_value?'gray':'currentColor'}}"
                     viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            @endforeach
        </div>
        <!-- Modal toggle -->
        <a data-modal-target="modal-review" data-modal-toggle="modal-review"
           class="block text-blue-700  font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
            @if($count)
                {{$count }} {{$text }}
            @else
                Добавить отзыв
            @endif
        </a>

        <!-- Main modal -->
        <div id="modal-review" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-6xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Отзывы
                        </h3>
                        <button type="button" data-modal-toggle="modal-review"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="modal-review">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6 mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">

                        <div class="create tracking-tight text-gray-900 sm:text-3xl">

                            <p class="pb-4"> Добавить Отзыв</p>

                            <div class="message">

                                <form action="{{route('review.store')}}" method="post" id="review">
                                    @csrf
                                    @method('post')
                                    <input hidden id="score" name="score" value="4">
                                    <input hidden id="habitation_id" name="habitation_id" value="{{$habitation->id}}">

                                    <div class="flex items-center mb-4 text-yellow-300">
                                        @foreach([0,1,2,3,4] as $el )
                                            <svg onclick="changeColors({{$el}})" fill="currentColor"
                                                 aria-hidden="true" class="w-10 h-10 stars" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endforeach
                                    </div>
                                    <script>
                                        function changeColors(choose) {
                                            $('#score').val(choose)
                                            let svgElements = document.getElementsByClassName('stars');
                                            for (let i = 0; i < svgElements.length; i++) {
                                                if (i <= choose) {
                                                    svgElements[i].style.fill = 'currentColor';
                                                } else {
                                                    svgElements[i].style.fill = 'gray';
                                                }
                                            }
                                        }
                                    </script>
                                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                            <label for="comment" class="sr-only">Your comment</label>
                                            <textarea name="comment" id="comment" rows="4"
                                                      class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                                      placeholder="Write a comment..." required></textarea>
                                        </div>
                                        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                            <a type="text" id="submit"
                                               class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                                Оставить отзыв
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                <p class="ml-auto text-xs text-gray-500 dark:text-gray-400">Remember, contributions to
                                    this topic should follow our <a href="#"
                                                                    class="text-blue-600 dark:text-blue-500 hover:underline">Community
                                        Guidelines</a>.</p>
                            </div>
                            <script>
                                $('#submit').one('click', function () {
                                    $('#review').submit()
                                })
                            </script>
                        </div>


                        <div class="list lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">

                            @foreach($habitation->reviews->reverse() as $review)
                                <figure class="max-w-screen-md py-3">
                                    <div class="flex items-center mb-4 text-yellow-300">
                                        @foreach([0,1,2,3,4] as $el )
                                            <svg aria-hidden="true" class="w-7 h-7"
                                                 fill="{{$el>$review->score?'gray':'currentColor'}}" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endforeach
                                    </div>


                                    <script>
                                        function changeColors(choose) {
                                            $('#score').val(choose)
                                            let svgElements = document.getElementsByClassName('stars');
                                            for (let i = 0; i < svgElements.length; i++) {
                                                if (i <= choose) {
                                                    svgElements[i].style.fill = 'currentColor';
                                                } else {
                                                    svgElements[i].style.fill = 'gray';
                                                }
                                            }
                                        }
                                    </script>


                                    <blockquote>
                                        <p class="text-xl font-semibold text-gray-900 dark:text-white">{{$review->comment}}</p>
                                    </blockquote>
                                    <figcaption class="flex items-center mt-6 space-x-3">
                                        @if($review->user->image)
                                            <img class="w-6 h-6 rounded-full"
                                                 src="{{$review->user->image}}"
                                                 alt="profile picture">
                                        @else
                                            <svg class="mr-2 w-10 h-10 text-gray-200 dark:text-gray-700"
                                                 aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        @endif

                                        <div class="flex items-center divide-x-2 divide-gray-300 dark:divide-gray-700">
                                            <cite class="pr-3 font-medium text-gray-900 dark:text-white">
                                                {{$review->user->name}}
                                            </cite>
                                            <cite class="pl-3 text-sm text-gray-500 dark:text-gray-400">
                                                {{$review->user->email}}
                                            </cite>
                                        </div>
                                    </figcaption>
                                </figure>
                            @endforeach

                        </div>


                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
