<?php

namespace PhpCans\HttpKernel\Tool;

use Symfony\Component\Config\FileLocator;
use Doctrine\Common\Annotations\Reader;
use Symfony\Component\Routing\Loader\AnnotationClassLoader;
use Symfony\Component\HttpKernel\EventListener\RouterListener;

class HttpKernelAnnotationBasedFactory
{
    protected $dispatcherFactory;
    protected $httpKernelFactory;
    protected $loaderFactory;
    protected $matcherFactory;
    protected $routerListenerFactory;

    public function __construct(DispatcherFactory $dispatcherFactory,
        HttpKernelFactory $httpKernelFactory, LoaderFactory $loaderFactory,
        MatcherFactory $matcherFactory, RouterListenerFactory $routerListenerFactory)
    {
        $this->dispatcherFactory = $dispatcherFactory;
        $this->httpKernelFactory = $httpKernelFactory;
        $this->loaderFactory = $loaderFactory;
        $this->matcherFactory = $matcherFactory;
        $this->routerListenerFactory = $routerListenerFactory;
    }

    public function createHttpKernel(RouteRegistry $routeRegistry = null)
    {
        if (!$routeRegistry) {
            $loader = $this->loaderFactory->createLoader();
            $routeRegistry = new RouteRegistry($loader);
        }
        $matcher = $this->matcherFactory->createMatcher($routeRegistry->getRouteCollection("."));
        $routerLister = $this->routerListenerFactory->createRouterListener($matcher);
        $dispatcher = $this->dispatcherFactory->createDispatcher($routerLister);
        $kernel = $this->httpKernelFactory->createHttpKernel($dispatcher);
        return $kernel;
    }

    public static function getInstance($controllerPath)
    {
        static $instance = null;
        if (!$instance) {
            $fileLocatorFactory = new FileLocatorFactory();
            $annotationClassLoaderFactory = new AnnotationClassLoaderFactory();
            $readerFactory = new AnnotationReaderFactory();
            $loaderFactory = new LoaderFactory($fileLocatorFactory->createFileLocator($controllerPath), $annotationClassLoaderFactory->createAnnotationClassLoader($readerFactory->createAnnotationReader()));
            $instance = new self(
                new DispatcherFactory(),
                new HttpKernelFactory(),
                $loaderFactory,
                new MatcherFactory(),
                new RouterListenerFactory()
            );
        }
        return $instance;
    }
}
