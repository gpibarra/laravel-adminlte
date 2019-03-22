<?php

namespace gpibarra\LaravelAdminLTE;

use Illuminate\Support\Facades\Facade;

class LaravelAdminLTEFacade extends Facade
{
    /**
     * Get the name of the class registered in the Application container.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return LaravelAdminLTEManager::class;
    }
}
