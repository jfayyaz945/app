<?php

namespace App\Search\AccountSearch\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Filter;

class Date implements Filter
{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        if(!empty($value) && isset($value['from']) && isset($value['to'])){
            $from = date('Y-m-d',strtotime($value['from']));
            $to = date('Y-m-d',strtotime($value['to']));
            $builder->whereBetween('date', [$from, $to]);
        }
        return $builder;
    }
}
