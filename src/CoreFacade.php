<?php

namespace Riclep\Core;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Riclep\Core\Skeleton\SkeletonClass
 */
class CoreFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'core';
    }
}
