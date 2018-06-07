<?php

namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\Routing\RouteCollection;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\EventListener\RouterListener;

class DispatcherFactory
{
    public function createDispatcher(RouterListener $routerListener)
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addSubscriber($routerListener);
        return $dispatcher;
    }
}
