<?php

namespace Loki\Providers;

use Mjolnir\Abstracts\AbstractServiceProvider;
use Mjolnir\Abstracts\AbstractApp;
use Mjolnir\Content\PostType;
use Loki\Content\PostTypes;
use Loki\Facades\Config;
use Loki\Setup\Enqueues;

class AppServiceProvider extends AbstractServiceProvider
{

    /** @var AbstractApp */
    protected $container;

    protected $provides = [
        PostTypes::class,
        Enqueues::class
    ];

    public function register()
    {
        $this->container->add(PostTypes::class)
            ->addArguments([new PostType('book'), new PostType('credits')]);
        $this->container->add(Enqueues::class)
            ->addArguments(['uri' => Config::get('app.uri.assets'), 'path' => Config::get('app.path.assets')]);
    }
}