<?php
/*
|--------------------------------------------------------------------------
| Main configuration file
|--------------------------------------------------------------------------
*/
return [
    /*
    |--------------------------------------------------------------------------
    | App paths
    |--------------------------------------------------------------------------
    */
    'path' => [
        'base' => dirname(__DIR__),
        'assets' => dirname(__DIR__) . "/assets"
    ],

    /*
    |--------------------------------------------------------------------------
    | App urls
    |--------------------------------------------------------------------------
    */
    'uri' => [
        'base' => get_template_directory_uri(),
        'assets' => get_template_directory_uri() . "/assets"
    ],

    /*
    |--------------------------------------------------------------------------
    | Template engine configurations
    |--------------------------------------------------------------------------
    */
    'view' => [
        'templatePath' => get_template_directory() . '/resources/views',
        'compiledPath' => wp_upload_dir()['basedir'] . '/cache/views'
    ],

    /*
    |--------------------------------------------------------------------------
    | Gutenberg blocks configurations
    |--------------------------------------------------------------------------
    */
    'blocks' => [
        'folder' => "blocks",
        'useSSR' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Providers
    |--------------------------------------------------------------------------
    */
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