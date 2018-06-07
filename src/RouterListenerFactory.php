<?php

namespace PhpCans\HttpKernel\Tool;

use TheCodingMachine\Psr15Bridge\Psr15ToSymfonyBridge;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\EventListener\RouterListener;

class RouterListenerFactory
{
    /**
     * @param UrlMatcherInterface|RequestMatcherInterface $matcher      The Url or Request matcher
     */
    public function createRouterListener($matcher, RequestStack $requestStack = null)
    {
        return new RouterListener($matcher, $requestStack ?: new RequestStack());
    }
}
