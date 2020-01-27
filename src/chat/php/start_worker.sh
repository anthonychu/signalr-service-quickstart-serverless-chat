#!/bin/bash
echo "$@"
if [[ "$@" =~ --port[[:space:]]([0-9]+) ]]; then
    port=${BASH_REMATCH[1]}
else
    echo "Could not parse port"
fi
php -S 0.0.0.0:$port worker.php