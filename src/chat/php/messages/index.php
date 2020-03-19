<?php
    function run(&$inputs, &$outputs, &$log) {
        $log->information('Message received');
        
        $outputs['signalRMessage'] = [
            'target' => 'newMessage',
            'arguments' => [
                json_decode($inputs['req']['Body'])
            ]
        ];
    }
?>