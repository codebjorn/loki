<?php
/*
|--------------------------------------------------------------------------
| File to store all filters of application
|--------------------------------------------------------------------------
*/
use Loki\Facades\Filter;

Filter::add('hello', function ($value) {
    echo $value;
});