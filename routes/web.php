<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('https://clone-dribbble.herokuapp.com/');
});
