<?php

namespace App\Filters\Filter;

use App\Filters\Filter;

class CheckboxFilters extends Filter
{
    protected  string $view = 'checkbox';

    protected bool $multiple = true;
}
