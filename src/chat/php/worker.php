<?
    class Logger {
        public $messages = [];
        function information($msg) {
            array_push($this->messages, $msg);
        }
    }

    $requestUri = $_SERVER['REQUEST_URI'];
    $requestBody = file_get_contents('php://input');
    $request = json_decode($requestBody, true);

    header("Content-type: application/json");

    require __DIR__ . $requestUri . '/index.php';

    $inputs = $request['Data'];
    $outputs = [ '_none_' => null ];
    $logger = new Logger();
    $returnValue = run($inputs, $outputs, $logger);

    $response = [
        'Outputs' => $outputs,
        'ReturnValue' => $returnValue,
        'Logs' => $logger->messages
    ];

    header("Content-type: application/json");
    echo(json_encode($response));
?>