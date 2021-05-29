<?php

namespace Loki\Setup;

use Mjolnir\Utils\Enqueue;

class Enqueues
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $uri;

    public function __construct(string $uri, string $path)
    {
        $this->path = $path;
        $this->uri = $uri;
    }

    public function front()
    {
        Enqueue::style('app', "{$this->uri}/app.css", [], "1.0.0");
        Enqueue::script('app', "{$this->uri}/app.js", [], "1.0.0");
    }

    public function admin()
    {
        Enqueue::script('blocks', "{$this->uri}/blocks.js", ['wp-block-editor', 'wp-components', 'wp-element', 'wp-i18n'], filemtime("{$this->path}/blocks.js"));
    }
}