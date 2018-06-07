<?php

namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;

class MatcherFactory
{
    public function createMatcher(RouteCollection $routes, RequestContext $requestContxt = null)
    {
        return new UrlMatcher($routes, $requestContxt ?: new RequestContext());
    }
}
