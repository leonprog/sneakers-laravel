<?php

namespace App\Filters;

class App
{
    protected array $filters = [];

    public function registerFilters(array $filters) : void
    {
        $this->filters = $filters;
    }

    public function filters()
    {
        return $this->filters;
    }
}
