<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name'];

    public function permissions() {
        return $this->belongsToMany(Permission::class,'permissions');
    }

}
