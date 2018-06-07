<?php

namespace PhpCans\HttpKernel\Tool;

use TheCodingMachine\Psr15Bridge\Psr15ToSymfonyBridge;

class HttpKernelAnnotationBasedMiddleware extends Psr15ToSymfonyBridge
{
    public function __construct(string $controllerPath, HttpKernelAnnotationBasedFactory $httpKernelFactory = null, HttpFoundationFactoryInterface $httpFoundationFactory = null, HttpMessageFactoryInterface $httpMessageFactory = null)
    {
        $httpKernelFactory = $httpKernelFactory ?: HttpKernelAnnotationBasedFactory::getInstance($controllerPath);
        parent::__construct($httpKernelFactory->createHttpKernel(), $httpFoundationFactory, $httpMessageFactory);
    }
}
