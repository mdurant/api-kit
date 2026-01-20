<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['message' => 'API v2 is working'];
});
