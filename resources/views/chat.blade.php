<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Websocket</title>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <ul>
        @foreach($rooms as $room)
        <li><a href="{{ route('chat.room', [$room->id, rand(1,3)]) }}">{{ $room->name }}</a></li>
        @endforeach
    </ul>
</body>
</html>