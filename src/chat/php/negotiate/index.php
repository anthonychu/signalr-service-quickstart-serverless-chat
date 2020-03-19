<?php
    function run(
        Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface $input, 
        Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface $output, 
        Psr\Log\LoggerInterface $log
    ): int {
        $log->info('Message received');
        
        $output->set('output', [
            'body' => $inputs->get('connectionInfo')
        ]);
        return 0;
    }
?>