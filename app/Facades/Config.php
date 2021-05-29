<?php

namespace Loki\Facades;

use Mjolnir\Abstracts\AbstractFacade;
use Loki\App;

/**
 *@method static get(string $identifier)
 */
class Config extends AbstractFacade
{
    protected static $app = App::class;
    protected static $accessor = 'configAccessor';
}