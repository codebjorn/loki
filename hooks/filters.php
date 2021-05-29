<?php

use Loki\Facades\Filter;

Filter::add('hello', function ($value) {
    echo $value;
});