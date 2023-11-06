<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $oldFile = 'storage/img/article_img/how_right_eat.jpg';
    $newFile = 'public/img/2.jpg';
    copy($oldFile, $newFile);

})->purpose('Display an inspiring quote');
