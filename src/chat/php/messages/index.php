<?php
    function run(
        Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface $input, 
        Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface $output, 
        Psr\Log\LoggerInterface $log
    ): int {
        $log->info('Message received');
        
        $output->set('output', [
            'signalRMessage' => [
                'target' => 'newMessage',
                'arguments' => [
                    json_decode($input->get('request')->getContent())
                ]
            ]
        ]);
        return 0;
    }
?>