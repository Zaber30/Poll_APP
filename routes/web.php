<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use App\Livewire\CreatePoll;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',CreatePoll::class);
Route::get('/form', [FormController::class, 'showForm']);
Route::post('/form', [FormController::class, 'submit'])->name('form.submit');
// Route::get('/profile',[FormController::class])->middleware('auth')
// ->missing(function(Request $request){
//     return Redirect::route('phots.index');
// });
Route::get('/news', function () {
    $apiKey = 'pub_7083ab7e15434cdc96c374e1785fbbf4';
    $response = Http::get('https://newsdata.io/api/1/latest', [
        'apikey'  => $apiKey,
        'country' => 'us',      // Bangladesh news
        'language'=> 'en',      // Bangla language (optional)
    ]);

    $data = $response->json();
    $articles = $data['results'] ?? [];

    return view('news', compact('articles'));
});
Route::view('/pop','popup');
 Route::domain('myfirst.com')->group(function(){
    Route::get('/sum',function(){
    $sum=app('math')->sum(5,10);
    return $sum;
});
});
