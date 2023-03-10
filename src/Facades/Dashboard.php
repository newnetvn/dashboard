<?php

namespace Newnet\Dashboard\Facades;

use Illuminate\Support\Facades\Facade;

class Dashboard extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dashboard';
    }
}
