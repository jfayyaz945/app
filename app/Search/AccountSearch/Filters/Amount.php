<?php

namespace App\Search\AccountSearch\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Filter;

class Amount implements Filter
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
        if($value){
            $builder->where('amount', 'LIKE', '%' . $value . '%');
        }
        return $builder;
    }
}
