<?php

namespace Rosio\PhpToJavascriptVariables\Facades;

use Illuminate\Support\Facades\Facade;

class JSLocalize extends Facade {

    /**
     * Name of the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'JSLocalize';
    }

} 