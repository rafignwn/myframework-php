<?php
    require __DIR__ . 'vendor/autoload.php';
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\RouteCollection;
    use Symfony\Component\Routing\Route;
    use Symfony\Component\Routing\RequestContext;
    use Symfony\Component\Routing\UrlMatcher;
    use Symfony\Component\Routing\ResourceNotFoundExeption;

    $request = Request::createFormGlobals();
    // $path = $request->getPathInfo();

    $routes = new RouteCollection();

    $routes->add('hallo', new Route('/hallo'));
    $routes->add('greating', new Route('/greating/(nama)'), ['nama']=>'Rafi gunawan');
    $context = new RequestContext();
    $context->formRequest($response);

    $matcher = new UrlMatcher($routes, $context);
    try{
        $response = new Response();
        extract($matcher->match()$request->getPathInfo());
        include sprintf('%s.php', $_route);
    }catch(ResourceNotFoundExeption $e){
        $response = new Response('Halaman Tidak ditemukan', Response::HTTP_NOT_FOUND);
    }

    // $response = new Response();

    // $route = ['/hallo' => 'hallo.php', '/greating' => 'greating.php'];

    //     if (isset($route[$path])){
    //         include $route[$path];
    //     } else{
    //         $response->setContent('Halaman Tidak ditemukan');
    //         $response->setStatusCode(Response::HTTP_NOT_FOUND);
    //     }

    $response->send();

    // Cara Lama
    // if ('/hallo' === $_SERVER['REQUEST_URI']){
    //     require 'hallo.php';
    // }
    // if (false !== strpos($_SERVER['REQUEST_URI'], '/greating')){
    //     require 'greating.php';
    // }
?>