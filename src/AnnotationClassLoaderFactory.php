<?php

namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\Config\FileLocator;
use Doctrine\Common\Annotations\Reader;
use Symfony\Component\Routing\Loader\AnnotationClassLoader as Acl;

class AnnotationClassLoaderFactory
{
    public function createAnnotationClassLoader(Reader $reader): Acl
    {
        return new AnnotationClassLoader($reader);
    }
}
