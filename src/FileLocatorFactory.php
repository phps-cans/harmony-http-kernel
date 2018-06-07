<?php

namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\Config\FileLocator;

class FileLocatorFactory
{
    public function createFileLocator(string $path)
    {
        return new FileLocator($path);
    }
}
