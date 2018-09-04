<?php

// src/GeocodeFacade.php

namespace SupportResort\ShortenUrl;

use Illuminate\Support\Facades\Facade;

class ShortenurlFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'support_resort_shorten_url_demo';
    }
}
