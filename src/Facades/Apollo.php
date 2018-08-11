<?php

namespace Lackhurt\Apollo\Facades;

use Illuminate\Support\Facades\Facade;

class Apollo extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'apollo';
    }
}