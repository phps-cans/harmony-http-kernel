<?php
namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Loader\AnnotationClassLoader as Acl;

class AnnotationClassLoader extends Acl
{
    protected function configureRoute(Route $route, \ReflectionClass $class, \ReflectionMethod $method, $annot)
    {
        $route->setDefaults(array("_controller" => [$class->getName(), $method->getName()]));
        return $route;
    }
}
