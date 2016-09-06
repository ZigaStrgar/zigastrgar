<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'name' ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
