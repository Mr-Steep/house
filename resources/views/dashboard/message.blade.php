<x-dashboard-layout>
    <audio id ="new_message" src="{{asset('storage/sound/new_message.m4a')}}"></audio>

    <div class="flex h-screen antialiased w-full text-gray-800">

        <div class="flex flex-row h-full w-full overflow-x-hidden">
            @if(request()->is('dashboard/message'))
                <div class="flex flex-col py-8 px-6 bg-white flex-shrink-0 w-full">
                    @if (request()->is('dashboard/message'))
                        <div class="flex flex-row  items-center">
                            <a href="{{route('dashboard.index')}}"
                               class="py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-tl from-blue-black via-blue-grey to-blue-grey-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Назад
                            </a>
                        </div>

                        <script>screen.width < 400 ? $('aside').hide() : ''</script>
                    @endif
                    <div class="flex flex-row items-center justify-center h-12 w-full">
                        <div
                            class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"></path>
                            </svg>
                        </div>
                        <div class="ml-2 font-bold text-2xl">Чат</div>
                    </div>

                    <div class="flex flex-col mt-8">
                        <div class="flex flex-row items-center justify-between text-xs">
                            <span class="font-bold">Последние чаты</span>
                            <span
                                class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full">
                            {{$chats->count()}}
                        </span
                        >
                        </div>

                        <div class="flex flex-col space-y-1 mt-4 -mx-2 h-full overflow-y-auto">
                            @foreach ($chats as $chat)
                                @if($chat->chatFrom->id == auth()->user()->id)
                                    <a href="{{route('dashboard.dialog', $chat->chatTo->id)}}"
                                       class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                                        <div
                                            class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                            {{Str::limit($chat->chatTo->name, 1, '')}}
                                        </div>
                                        <div class="flex grow ml-2 text-sm font-semibold">{{$chat->chatTo->name}}</div>
                                        <span class="flex items-center text-xs justify-center bg-gray-300 h-4 w-4 rounded-full">
                                        {{$chat->countMessage()}}
                                        </span>
                                    </a>
                                @else()
                                    <a href="{{route('dashboard.dialog', $chat->chatFrom->id)}}"
                                       class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                                        <div
                                            class="flex  items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                            {{Str::limit($chat->chatFrom->name, 1, '')}}
                                        </div>
                                        <div class="flex grow  ml-2 text-sm font-semibold">{{$chat->chatFrom->name}}</div>
                                        <span class="flex items-center text-xs justify-center bg-gray-300 h-4 w-4 rounded-full">
                                        {{$chat->countMessage()}}
                                        </span>
                                    </a>
                                @endif
                            @endforeach

                        </div>
                        <div class="flex flex-row items-center justify-between text-xs mt-6">
                            <span class="font-bold">Архив</span>
                            <span
                                class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full"
                            >0</span
                            >
                        </div>
                    </div>
                </div>
            @endif
            @if(request()->is('dashboard/message/*'))
                <div class="flex flex-col flex-auto h-full p-0 sm:p-6">
                    @if (request()->is('dashboard/message/*'))
                        <div class="flex flex-row justify-between items-center">
                            <a href="{{route('dashboard.message')}}"
                               class="py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-tl from-blue-black via-blue-grey to-blue-grey-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Назад</a>
                            <div class="">
                                {{@$messages[0]->chatFrom->name}}
                            </div>
                            <a href="#">
                                @if(@$messages[0]->chatFrom->user_image)
                                    <img class="w-8 h-8 rounded-full"
                                         src="{{asset($messages[0]->chatFrom->user_image)}}" alt="user photo">
                                @else
                                    <svg class=" w-10 h-10 text-gray-200 dark:text-gray-700" aria-hidden="true"
                                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </a>
                        </div>
                        <script>screen.width < 400 ? $('aside').hide() : ''</script>
                    @endif
                    <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-90 p-0 sm:p-4">
                        <div class="flex flex-col h-full overflow-x-auto mb-4">
                            <div class="flex flex-col h-full">
                                <div id="area-messages" class="grid grid-cols-12 gap-y-2 overflow-y-auto snap-end">
                                    @if(@$messages)
                                        @foreach($messages as $message)

                                            @if($message->from_user_id == auth()->user()->id)
                                                <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                                    <div class="flex items-center justify-start flex-row-reverse">
                                                        <div
                                                            class="relative text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                            <div>{{$message->chat_message}}</div>
                                                            <div
                                                                class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500">
                                                                {{--                                                            Seen--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                                    <div class="flex flex-row items-center">
                                                        <div
                                                            class="relative text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                            <div>{{$message->chat_message}}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif

                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                            <div>
                                <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                    <input
                                        id="message_area"
                                        type="text"
                                        class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                                    />
                                    <button
                                        class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600"
                                    >
                                        <svg
                                            class="w-6 h-6"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                            ></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="ml-4">
                                <button
                                    id="send_button"
                                    onclick="send_chat_message()"
                                    class="flex items-center justify-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-tl from-blue-black via-blue-grey to-blue-grey-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex-shrink-0">
                                    <span class="">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round"
                                                                                      strokeLinejoin="round"
                                                                                      strokeWidth={2}
                                                                                      d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if(request()->is('dashboard/message/*'))

    <script>

        function sound_new_message(){
            var audio = new Audio('{{asset('storage/sound/new_message.m4a')}}');
            var playPromise = audio.play();

        }


        let area_mess = $('#area-messages')
        let host = window.location.host
        let from_user_id = "{{ Auth::user()->id }}";
        let to_user_id = "";
        let conn = new WebSocket(`wss://${host}/wss2?id=${from_user_id}`);
        scroll_top()
        conn.onopen = function (e) {

            console.log("Connection established!");

            read_unread_message_user(from_user_id);

            load_unconnected_user(from_user_id);

            load_unread_notification(from_user_id);

            load_connected_chat_user(from_user_id);

        };

        conn.onmessage = function (e) {

            let data = JSON.parse(e.data);
            console.log(data)
            if (data.image_link) {
                document.getElementById('message_area').innerHTML = `<img src="{{ asset('images/`+data.image_link+`') }}" class="img-thumbnail img-fluid" />`;
            }

            if (data.type == 'send_message' && from_user_id == data.to_user_id) {
                create_message_from(data.message)
                sound_new_message()
            }

            if (data.status) {
                var online_status_icon = document.getElementsByClassName('online_status_icon');

                for (var count = 0; count < online_status_icon.length; count++) {
                    if (online_status_icon[count].id == 'status_' + data.id) {
                        if (data.status == 'Online') {
                            online_status_icon[count].classList.add('text-success');

                            online_status_icon[count].classList.remove('text-danger');

                            document.getElementById('last_seen_' + data.id + '').innerHTML = 'Online';
                        } else {
                            online_status_icon[count].classList.add('text-danger');

                            online_status_icon[count].classList.remove('text-success');

                            document.getElementById('last_seen_' + data.id + '').innerHTML = data.last_seen;
                        }
                    }
                }
            }


            if (data.chat_history) {
                var html = '';

                for (var count = 0; count < data.chat_history.length; count++) {
                    if (data.chat_history[count].from_user_id == from_user_id) {
                        var icon_style = '';

                        if (data.chat_history[count].message_status == 'Not Send') {
                            icon_style = '<span id="chat_status_' + data.chat_history[count].id + '" class="float-end"><i class="fas fa-check text-muted"></i></span>';
                        }

                        if (data.chat_history[count].message_status == 'Send') {
                            icon_style = '<span id="chat_status_' + data.chat_history[count].id + '" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
                        }

                        if (data.chat_history[count].message_status == 'Read') {
                            icon_style = '<span class="text-primary float-end" id="chat_status_' + data.chat_history[count].id + '"><i class="fas fa-check-double"></i></span>';
                        }

                        html += `
				<div class="row">
					<div class="col col-3">&nbsp;</div>
					<div class="col col-9 alert alert-success text-dark shadow-sm">
					` + data.chat_history[count].chat_message + icon_style + `
					</div>
				</div>
				`;


                    } else {
                        if (data.chat_history[count].message_status != 'Read') {
                            update_message_status(data.chat_history[count].id, data.chat_history[count].from_user_id, data.chat_history[count].to_user_id, 'Read');
                        }

                        html += `
				<div class="row">
					<div class="col col-9 alert alert-light text-dark shadow-sm">
					` + data.chat_history[count].chat_message + `
					</div>
				</div>
				`;

                        var count_unread_message_element = document.getElementById('user_unread_message_' + data.chat_history[count].from_user_id + '');

                        if (count_unread_message_element) {
                            count_unread_message_element.innerHTML = '';
                        }
                    }
                }

                document.querySelector('#chat_history').innerHTML = html;

                scroll_top();
            }

            if (data.update_message_status) {
                var chat_status_element = document.querySelector('#chat_status_' + data.chat_message_id + '');

                if (chat_status_element) {
                    if (data.update_message_status == 'Read') {
                        chat_status_element.innerHTML = '<i class="fas fa-check-double text-primary"></i>';
                    }
                    if (data.update_message_status == 'Send') {
                        chat_status_element.innerHTML = '<i class="fas fa-check-double text-muted"></i>';
                    }
                }

                if (data.unread_msg) {
                    var count_unread_message_element = document.getElementById('user_unread_message_' + data.from_user_id + '');

                    if (count_unread_message_element) {
                        var count_unread_message = count_unread_message_element.textContent;

                        if (count_unread_message == '') {
                            count_unread_message = parseInt(0) + 1;
                        } else {
                            count_unread_message = parseInt(count_unread_message) + 1;
                        }

                        count_unread_message_element.innerHTML = '<span class="badge bg-danger rounded-pill">' + count_unread_message + '</span>';
                    }
                }
            }
        };

        function scroll_top() {
            document.querySelector('#area-messages').scrollTop = document.querySelector('#area-messages').scrollHeight;
        }

        function read_unread_message_user(to_user_id) {
            var data = {
                to_user_id: to_user_id,
                type: 'read_unread_message_user'
            };
            conn.send(JSON.stringify(data));
        }

        function load_unconnected_user(from_user_id) {
            var data = {
                from_user_id: from_user_id,
                type: 'request_load_unconnected_user'
            };

            conn.send(JSON.stringify(data));
        }

        function search_user(from_user_id, search_query) {
            if (search_query.length > 0) {
                var data = {
                    from_user_id: from_user_id,
                    search_query: search_query,
                    type: 'request_search_user'
                };

                conn.send(JSON.stringify(data));
            } else {
                load_unconnected_user(from_user_id);
            }
        }

        function send_request(element, from_user_id, to_user_id) {
            var data = {
                from_user_id: from_user_id,
                to_user_id: to_user_id,
                type: 'request_chat_user'
            };

            element.disabled = true;

            conn.send(JSON.stringify(data));
        }

        function load_unread_notification(user_id) {
            var data = {
                user_id: user_id,
                type: 'request_load_unread_notification'
            };

            conn.send(JSON.stringify(data));

        }


        function process_chat_request(chat_request_id, from_user_id, to_user_id, action) {
            var data = {
                chat_request_id: chat_request_id,
                from_user_id: from_user_id,
                to_user_id: to_user_id,
                action: action,
                type: 'request_process_chat_request'
            };

            conn.send(JSON.stringify(data));
        }

        function load_connected_chat_user(from_user_id) {
            var data = {
                from_user_id: from_user_id,
                type: 'request_connected_chat_user'
            };

            conn.send(JSON.stringify(data));
        }

        function make_chat_area(user_id, to_user_name) {
            var html = `
	<div id="chat_history"></div>
	<div class="input-group mb-3">
		<div id="message_area" class="form-control" contenteditable style="min-height:125px; border:1px solid #ccc; border-radius:5px;"></div>
		<label class="btn btn-warning" style="line-height:125px;">
			<i class="fas fa-upload"></i> <input type="file" id="browse_image" onchange="upload_image()" hidden />
		</label>
		<button type="button" class="btn btn-success" id="send_button" onclick="send_chat_message()"><i class="fas fa-paper-plane"></i></button>
	</div>
	`;

            document.getElementById('chat_area').innerHTML = html;

            document.getElementById('chat_header').innerHTML = 'Chat with <b>' + to_user_name + '</b>';

            document.getElementById('close_chat_area').innerHTML = '<button type="button" id="close_chat" class="btn btn-danger btn-sm float-end" onclick="close_chat();"><i class="fas fa-times"></i></button>';

            to_user_id = user_id;
        }

        function close_chat() {
            document.getElementById('chat_header').innerHTML = 'Chat Area';

            document.getElementById('close_chat_area').innerHTML = '';

            document.getElementById('chat_area').innerHTML = '';

            to_user_id = '';
        }


        $(document).ready(function () {
            $('#message_area').keydown(function (e) {
                if (e.keyCode === 13) {
                    send_chat_message()
                }
            });
        });

        function send_chat_message() {
            document.querySelector('#send_button').disabled = true;

            let message_area = $('#message_area');
            if (!message_area.val().trim()) {
                return 0;
            }
            let message = message_area.val()
            if ('{{@$user_id}}'.length > 0) {
                let data = {
                    message: message,
                    from_user_id: {{auth()->user()->id}},
                    to_user_id: '{{@$user_id}}',
                    type: 'request_send_message'
                };
                conn.send(JSON.stringify(data));
                create_message(message)
            }

            message_area.val('')
            document.querySelector('#send_button').disabled = false;

        }

        function create_message(__TEXT__) {
            let $message = `<div class="col-start-6 col-end-13 p-3 rounded-lg">
                                                <div class="flex items-center justify-start flex-row-reverse">

                                                    <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                        <div>${__TEXT__}</div>
                                                        <div class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`
            $('#area-messages').append($message);
            scroll_top()
        }

        function create_message_from(__TEXT__) {
            let $message = `<div class="col-start-1 col-end-8 p-3 rounded-lg">
                                                    <div class="flex flex-row items-center">
                                                        <div class="relative  text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                            <div>${__TEXT__}</div>
                                                        </div>
                                                    </div>
                                                </div>`
            $('#area-messages').append($message);
            scroll_top()
        }


        function load_chat_data(from_user_id, to_user_id) {
            var data = {
                from_user_id: from_user_id,
                to_user_id: to_user_id,
                type: 'request_chat_history'
            };

            conn.send(JSON.stringify(data));
        }

        function update_message_status(chat_message_id, from_user_id, to_user_id, chat_message_status) {
            var data = {
                chat_message_id: chat_message_id,
                from_user_id: from_user_id,
                to_user_id: to_user_id,
                chat_message_status: chat_message_status,
                type: 'update_chat_status'
            };

            conn.send(JSON.stringify(data));
        }

        function check_unread_message() {
            var unread_element = document.getElementsByClassName('user_unread_message');

            for (var count = 0; count < unread_element.length; count++) {
                var temp_user_id = unread_element[count].dataset.id;

                var data = {
                    from_user_id: from_user_id,
                    to_user_id: to_user_id,
                    type: 'check_unread_message'
                };

                conn.send(JSON.stringify(data));
            }
        }

        function upload_image() {
            var file_element = document.getElementById('browse_image').files[0];

            var file_name = file_element.name;

            var file_extension = file_name.split('.').pop().toLowerCase();

            var allowed_extension = ['png', 'jpg'];

            if (allowed_extension.indexOf(file_extension) == -1) {
                alert("Invalid Image File");

                return false;
            }

            var file_reader = new FileReader();

            var file_raw_data = new ArrayBuffer();

            file_reader.loadend = function () {

            }

            file_reader.onload = function (event) {

                file_raw_data = event.target.result;

                conn.send(file_raw_data);
            }

            file_reader.readAsArrayBuffer(file_element);
        }

    </script>
    @endif
</x-dashboard-layout>
