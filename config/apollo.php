<?php

return [
    'namespaces' => explode(',', env('APOLLO_NAMESPACES', 'application')),
    'cluster' => env('APOLLO_CLUSTER', 'default'),
    'save_dir' => realpath(storage_path('apollo')),
    'config_server' => env('APOLLO_CONFIG_SERVER', 'http://192.168.100.184:8090'),
    'app_id' => env('APP_ID'),
    'timeout_interval' => 70
];