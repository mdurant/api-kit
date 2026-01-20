<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['message' => 'API v3 is working'];
});
