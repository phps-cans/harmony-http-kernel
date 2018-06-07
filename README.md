## What is this package

This package intend to make an easy use of the symfony 4 router with annotation outside symfony. It provide two ways to do this: Retrieve the http kernel OR retrive a PSR 15 compilant middleware for routing purpose.

## How to use

You must register your annotation yourself: 
```

$classLoader = require("../vendor/autoload.php");
use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader([$classLoader, 'loadClass']);
```

- You can create a http kernel via the factory:
```
use PhpCans\HttpKernel\Tool\HttpKernelAnnotationBasedFactory;
$factory = HttpKernelAnnotationBasedFactory::getInstance(PATH_TO_CONTROLLER_DIRECTORY);
$kernel = $factory->createHttpKernel();
```

- You can create a PSR 15 compilant middleware:
```
use PhpCans\HttpKernel\Tool\HttpKernelAnnotationBasedMiddleware;
$middleware = new HttpKernelAnnotationBasedMiddleware($controllerPath);
```

You can easily configure the kernel, by configuring the factory and creating your own factory:

```
$myLoaderFactory = new MyLoaderFactory();

 $factory = new HttpKernelAnnotationBasedFactory(
                new DispatcherFactory(),
                new HttpKernelFactory(),
                $myLoaderFactory,
                new MatcherFactory(),
                new RouterListenerFactory()
            );

// Alternativly, if you want to configure the middleware
$middleware = new HttpKernelAnnotationBasedMiddleware($controllerPath, $factory);
```

You can use the same tactic to configure other behavior.

## What is does

- This package provide

  - A simple implementation of AnnotationClassLoader
  - RouteRegistry: It enable you to not using The loader and to give a routecollection directly
  - A list of factory
  - The http kernel factory

## Parameters:

- `HttpKernelAnnotationBasedFactory::getInstance($controllerPath)` : Return a factory for http kernel. `$controllerPath` is the path of your controller directory
- `HttpKernelAnnotationBasedFactory::createHttpKernel($routeRegistry = null)` return an instance of the http kernel. `$routeRegistry` is the registry of your route
- `HttpKernelAnnotationBasedMiddleware::__construct($controllerPath);`. `$controllerPath` is the path of your controller's directory

### TODO

 - Document all factory

