<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function(){
    $rooms = App\Models\Room::all();

    return view('chat', compact('rooms'));
});

Route::get('/chat/{room}/{user}', function(
    App\Models\Room $room,
    App\Models\User $user
){
    return view('chatroom', compact('room', 'user'));
})->name('chat.room');


Route::post('/chat', function(Illuminate\Http\Request $request){
    $message = App\Models\Post::create([
        'room_id'=>$request->input('room_id'),
        'user_id'=>$request->input('user_id'),
        'body'=>$request->input('body')
    ]);

    event(new App\Events\MessageSent($message));

    return response()->json($message);
})->name('chat.store');
