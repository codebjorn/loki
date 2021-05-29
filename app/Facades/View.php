<?php

namespace Loki\Facades;

use Mjolnir\Abstracts\AbstractFacade;
use Loki\App;

/**
 * @method static render(string $view, array $variables = [])
 */
class View extends AbstractFacade
{
    protected static $app = App::class;
    protected static $accessor = 'view';
}