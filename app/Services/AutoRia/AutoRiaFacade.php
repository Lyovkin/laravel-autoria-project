<?php

namespace App\Services\AutoRia;

use Illuminate\Support\Facades\Facade;

/**
 * Class AutoRiaFacade
 * @package App\Services\AutoRia
 */
class AutoRiaFacade extends Facade {

    /**
     * @return AutoRiaService
     */
    protected static function getFacadeAccessor()
    {
        return new AutoRiaService();
    }
}