<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// TEMPORARY: delete after testing. Checks that the ApiResponses trait works.
Route::get('/ping', fn () => (new class {
    use \App\Traits\ApiResponses;

    public function run()
    {
        return $this->ok('API is working');
    }
})->run());
