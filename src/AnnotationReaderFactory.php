<?php

namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\Config\FileLocator;
use Doctrine\Common\Annotations\Reader;
use Symfony\Component\Routing\Loader\AnnotationClassLoader;

use Doctrine\Common\Annotations\AnnotationReader;

class AnnotationReaderFactory
{
    public function createAnnotationReader(): Reader
    {
        return new AnnotationReader();
    }
}
