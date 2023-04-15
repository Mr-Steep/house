@props(['question', 'habitation'])
<link href="{{URL::to('cropper/dist/cropper.css')}}" rel="stylesheet">
<script src="{{URL::to('cropper/dist/cropper_old.js')}}"></script>
<div class="overflow-y-auto select-none	upload_images">
    <div class="overflow-auto h-80v">
        @if($habitation->images()->get()->count() < 5)
            <div class="flex justify-center items-center w-full p-5">
                <label for="dropzone-file"
                       class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                class="font-semibold">Загрузите сюда</span>
                            минимум 5 фотографий</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF</p>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="font-semibold">Суммарно максимальный объем 50 MB</span></p>
                    </div>
                    <input id="dropzone-file" type="file" multiple="multiple" class="hidden"/>
                </label>
            </div>

        @else
            <div class="flex justify-center items-center w-full p-5">
                <label for="dropzone-file"
                       class="flex flex-col justify-center w-1/2 items-center bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                    </div>
                    <input id="dropzone-file" type="file" multiple="multiple" class="hidden"/>
                </label>
            </div>

        @endif

        @foreach($habitation->images()->get() as $image)
            <div class="flex w-full p-5">
                <div
                    style="background-image: url({{asset($image->path)}})"
                    class="sm:h-52	 md:h-72 lg:h-96	bg-cover bg-center  flex  flex-row-reverse items-start w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                    <button id="dropdownMenu{{$image->id}}" data-dropdown-toggle="dropdownDots{{$image->id}}"
                            class="inline-flex items-center rounded-3xl bg-gray-100	 p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDots{{$image->id}}"
                         class="hidden rounded z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconButton{{$image->id}}">
                            <li>
                                <a onclick="editor_image({{$image->id}}, '{{asset($image->path)}}')"
                                   data-modal-toggle="defaultModal"
                                   class="editor-image block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white ">
                                    Изменить
                                </a>
                            </li>

                        </ul>
                        <a onclick="removeImage(this)" data-id="{{$image->id}}"
                           class="flex items-center rounded p-3 text-sm font-medium text-red-600 bg-gray-50 border-t border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-red-500 hover:underline">
                            Удалить
                        </a>
                    </div>

                </div>
            </div>

        @endforeach

    </div>
</div>


<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true"
     class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal">
    <div class="relative p-4 w-full max-w-md h-full max-h-screen md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Редактирование Фото
                </h3>
                <button type="button" onclick="clearEditor()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-6">
                <img id="redaction">
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center justify-between p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button type="button" id="delete-image" data-modal-toggle="defaultModal" onclick="removeImage(this)"
                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    Удалить
                </button>
                <button data-modal-toggle="defaultModal" onclick="crop_image()" id="crop" type="button"
                        class="text-white bg-gradient-to-r  from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    Сохранить
                </button>
            </div>
        </div>
    </div>
</div>


<script>


    let cropper
    let $width = 0
    let $height = 0
    let $id

    function removeImage(_this) {
        $('#spinner').show()
        let item = $(_this)
        let id = item.data('id')
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            type: "delete",
            contentType: false,
            url: 'https://yvvdev.site/image-upload/' + id,
            processData: false,
            success: function (res) {
                let _res = JSON.parse(res)
                if (_res.delete) {
                    window.location.reload()
                }
            }
        });
    }

    function clearEditor() {
        let $redaction = $('#redaction')
        $redaction.parent().html($('<img id="redaction">'))
    }

    function editor_image(id, url) {

        $id = id
        let $redaction = $('#redaction')
        let $deleteImage = $('#delete-image')
        $deleteImage.data('id', id)
        $redaction.attr('src', url)

        cropper = new Cropper(document.getElementById('redaction'), {
            aspectRatio: 4 / 4,
            viewMode: 3,
            dragMode: 'move',
            autoCropArea: 1,
            restore: false,
            guides: false,
            cropBoxResizable: false,
            toggleDragModeOnDblclick: false,
            crop: function (event) {
                $width = Math.round(event.detail.width / 4)
                $height = Math.round(event.detail.height / 4)
                console.log($width, $height);
            }
        });
    }

    function crop_image() {
        $('#spinner').show()
        let canvas;
        if (cropper) {
            canvas = cropper.getCroppedCanvas({
                width: $width,
                height: $height,
            });

            canvas.toBlob(function (blob) {
                let formData = new FormData();
                let type = blob.type.split('/')[blob.type.split('/').length - 1] ?? 'jpeg'

                formData.append('files[]', blob, '.' + type);
                formData.append('id', $id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type: "post",
                    contentType: false,
                    url: '{{ route('image.store') }}',
                    data: formData,
                    processData: false,
                    success: function (response) {
                        let _res = JSON.parse(response)
                        if (_res.upload) {
                            window.location.reload()
                        }
                    }
                });

            })
        }
    }

    $(document).ready(function () {

        let $count = '{{$habitation->images()->get()->count()}}'
        console.log($count)
        if ($count < 5) {
            let $btnNext = $('button[type="submit"]')
            $btnNext.css('filter', 'blur(0.6px)')
            $btnNext.css('pointer-events', 'none')
        }


        let $dropZone = $('#dropzone-file');
        $dropZone.on('change', function () {
            $('#spinner').show()
            let postData = new FormData();
            let len = $dropZone[0].files.length;
            for (let x = 0; x < len; x++) {
                postData.append("files[]", $dropZone[0].files[x]);
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: "post",
                contentType: false,
                url: '{{ route('image.store') }}',
                data: postData,
                processData: false,
                success: function (response) {
                    let _res = JSON.parse(response)
                    if (_res.upload) {
                        window.location.reload()
                    }
                }

            });
        });

    });


</script>


{{--<div class="mt-16 sm:mt-20">--}}
{{--    <div class="-my-4 flex justify-center gap-5 overflow-hidden py-4 sm:gap-8">--}}
{{--        <div--}}
{{--            class="relative aspect-[9/10] w-20 flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-72 sm:rounded-2xl rotate-2">--}}
{{--            <img src="/storage/car1.svg" class="swiper-lazy"></div>--}}
{{--        <div--}}
{{--            class="relative aspect-[9/10] w-20 flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-72 sm:rounded-2xl -rotate-2">--}}
{{--            <img src="/storage/car3.svg" class="swiper-lazy"></div>--}}
{{--        <div--}}
{{--            class="relative aspect-[9/10] w-20 flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-72 sm:rounded-2xl rotate-2">--}}
{{--            <img src="/storage/car3.svg" class="swiper-lazy"></div>--}}
{{--        <div--}}
{{--            class="relative aspect-[9/10] w-20 flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-72 sm:rounded-2xl rotate-2">--}}
{{--            <img src="/storage/car1.svg" class="swiper-lazy"></div>--}}
{{--        <div--}}
{{--            class="relative aspect-[9/10] w-20 flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-72 sm:rounded-2xl -rotate-2">--}}
{{--            <img src="/storage/car3.svg" class="swiper-lazy"></div>--}}
{{--        <div--}}
{{--            class="relative aspect-[9/10] w-20 flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-72 sm:rounded-2xl rotate-2">--}}
{{--            <img src="/storage/car3.svg" class="swiper-lazy"></div>--}}
{{--    </div>--}}
{{--</div>--}}
