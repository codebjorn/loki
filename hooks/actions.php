<?php
/*
|--------------------------------------------------------------------------
| File to store all actions of application
|--------------------------------------------------------------------------
*/
use Loki\Facades\Action;

Action::add('wp_enqueue_scripts', [\Loki\Setup\Enqueues::class, 'front']);
Action::add('admin_enqueue_scripts', [\Loki\Setup\Enqueues::class, 'admin']);
