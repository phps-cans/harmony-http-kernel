<?php

namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\HttpKernel;

class HttpKernelFactory
{
    public function createHttpKernel(EventDispatcherInterface $dispatcher, ControllerResolverInterface $controllerResolver = null, RequestStack $requestStack = null, ArgumentResolverInterface $argumentResolver = null)
    {
        $controllerResolver = $controllerResolver ?: new ControllerResolver();
        $argumentResolver = $argumentResolver ?: new ArgumentResolver();
        $requestStack = $requestStack ?: new RequestStack();
        return new HttpKernel($dispatcher, $controllerResolver, $requestStack, $argumentResolver);
    }
}
