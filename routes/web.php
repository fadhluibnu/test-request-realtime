<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/view', function () {
    return view('view');
});

Route::get('/getJson', function () {
    $event = Storage::get('event.json');
    return json_decode($event, true);
});

Route::get('/addrequest/{id}', function ($id) {
    $event = Storage::get('event.json');
    $decode = json_decode($event, true);
    $contents = $decode;
    $contents[] = [
        "id" => $id, "message" => $id . " say hi"
    ];
    $contents = json_encode($contents);
    Storage::put('event.json', $contents);
    $event2 = Storage::get('event.json');
    echo $event2;
});
Route::get('/delete/{id}', function ($id) {
    $event = Storage::get('event.json');
    $decode = json_decode($event, true);
    $content = [];
    foreach (collect($decode) as $item) {
        if ($item['id'] != $id) {
            $content[] = [
                'id' => $item['id'],
                'message' => $item['message']
            ];
        }
    }
    $contents = json_encode($content);
    Storage::put('event.json', $contents);
});
