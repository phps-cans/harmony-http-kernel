<?php

namespace PhpCans\HttpKernel\Tool;

use TheCodingMachine\Psr15Bridge\Psr15ToSymfonyBridge;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\Config\Loader\LoaderInterface;

class RouteRegistry
{
    protected $loader;
    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }
    public function getRouteCollection($ressource)
    {
        return $this->loader->load($ressource);
    }
}
