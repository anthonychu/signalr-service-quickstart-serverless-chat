<?php
    require __DIR__ . '/vendor/autoload.php';    
    use Symfony\Component\HttpFoundation\{Request, JsonResponse};
    use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
    use Monolog\{Logger, Handler};

    $logger = new Logger(__FILE__);
    $handler = new Handler\TestHandler();
    $logger->pushHandler($handler);
    
    $request = Request::createFromGlobals();
    require __DIR__ . $request->getPathInfo() . '/index.php';

    $input = new ParameterBag([
        'request' => $request
    ]);
    $output = new ParameterBag();
    $returnValue = run($input, $output, $logger);

    $response = new JsonResponse([
        'Outputs' => $output->get('output'),
        'ReturnValue' => $returnValue,
        'Logs' => $handler->getRecords()
    ]);
    $response->send();
?>