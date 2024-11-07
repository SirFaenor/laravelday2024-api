<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    // Github Actions
    'deploy_actions' => [
        // 'down',
        'storage:link',
        'migrate --force',
        'optimize:clear',
        'view:clear',
        'view:cache',
        // 'up',
    ],

];
