<?php

namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\Routing\Loader\AnnotationDirectoryLoader;
use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\Routing\Loader\AnnotationClassLoader;

class LoaderFactory
{
    protected $fileLocator;
    protected $classLoader;

    public function __construct(FileLocatorInterface $fileLocator, AnnotationClassLoader $classLoader)
    {
        $this->fileLocator = $fileLocator;
        $this->classLoader = $classLoader;
    }

    public function createLoader()
    {
        return new AnnotationDirectoryLoader($this->fileLocator, $this->classLoader);
    }
}
