<?php

namespace Loki\Facades;

use Mjolnir\Abstracts\AbstractFacade;
use Mjolnir\Hooks\Group;
use Loki\App;

/**
 * @method static do(...$arg)
 * @method static add(string $tag, $function, int $priority = 10, int $args = 1)
 */
class Action extends AbstractFacade
{
    protected static $app = App::class;
    protected static $accessor = 'action';

    public static function group(string $tag): Group
    {
        return static::resolveInstance(static::$accessor)
            ->group($tag);
    }
}