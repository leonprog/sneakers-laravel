<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;


class Filter
{
    public string $title;

    public string $field;

    public array $value = [];

    public string $param;

    protected bool $multiple = false;

    protected string $view;

    public function __construct(string $title, string $field, $param, array $value)
    {
        $this->title = $title;
        $this->field = $field;
        $this->param = $param;
        $this->value = $value;
    }

    public static function make(...$arguments)
    {
        return new static(...$arguments);
    }

    private function hasRequest($request) : bool
    {
        if ($request->get('filters')) {
            return true;
        }

        return  false;
    }

    private function requestValue($request)
    {
        return ($request->get('filters')["{$this->field}_{$this->param}"]);
    }

    private function field() 
    {
        return "{$this->field}_{$this->param}";
    }

    public function apply(Builder $query, $request)
    {
        if (!$this->hasRequest($request)) {
            return $query;
        }

        if (!isset($request->get('filters')[$this->field()])) {
            return $query;
        }  

        $query = $query->whereIn($this->field(), $this->requestValue($request));

        return $query;
    }

    public function render()
    {
        return view("filters.{$this->view}", ['filter' => $this]);
    }
}
