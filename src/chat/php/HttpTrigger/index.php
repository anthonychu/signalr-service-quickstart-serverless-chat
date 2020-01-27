<?
    function run(&$inputs, &$outputs, &$log) {
        $outputs['res'] = "hi";
        return [
            'target' => 'newMessage',
            'arguments' => [
                json_decode($inputs['req']['Body'])
            ]
        ];
    }
?>