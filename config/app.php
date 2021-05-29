<?php

return [
    'path' => [
        'base' => dirname(__DIR__),
        'assets' => dirname(__DIR__) . "/assets"
    ],

    'uri' => [
        'base' => get_template_directory_uri(),
        'assets' => get_template_directory_uri() . "/assets"
    ],

    'view' => [
        'folder' => "templates",
        'templatePath' => get_template_directory() . '/resources/views',
        'compiledPath' => wp_upload_dir()['basedir'] . '/cache/views'
    ],

    'blocks' => [
        'folder' => "blocks",
        'useSSR' => true,
    ],

    'providers' => [
        //Base Providers
        \Mjolnir\Providers\ExceptionServiceProvider::class,
        \Mjolnir\Providers\HooksServiceProvider::class,
        \Mjolnir\Providers\ViewServiceProvider::class,
        \Mjolnir\Providers\GutenbergServiceProvider::class,

        //App Providers
        \Loki\Providers\AppServiceProvider::class
    ]
];