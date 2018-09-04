<?php

// src/Http/routes.php

Route::get('shortenurl/test', function () {
    return 'support_resort_shorten_url';
});

Route::get('shortenurl/{url}', function () {
    return Shortenurl::shortenurl($url);
});

Route::get('shortenurl/config', function () {
    return config('config.apikey');
});
