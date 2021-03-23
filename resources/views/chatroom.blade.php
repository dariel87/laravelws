<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Websocket - {{ $room->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <br><br>
        <h4>Chat Room - {{ $room->name }}<br><small class="text-muted">{{ $user->name }}</small></h4>
        <div id="chat-box">
            <div id="body">
                <ul>
                    @foreach($room->posts as $message)
                    <li>
                        <div id="text-body">
                            {{ $message->body }}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div id="text-input"><input onkeypress="sendOnEnter(event)" type="text" class="form-control" placeholder="enter message here.."></div>
        </div>
    </div>
    <script>
        var room_id = {{ $room->id }},
            user_id = {{ $user->id }};
        function sendOnEnter(e){
            if(e.keyCode == 13){
                var body = e.srcElement.value
                axios.post("{{ route('chat.store') }}", {
                    room_id,
                    user_id,
                    body
                })
                .then(response => {
                    // console.log(response);
                });
            }
        }
    </script>
</body>
</html>