<?php

namespace Fanhai\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    public function department(){
        return $this->hasMany('\Fanhai\Models\Department');
    }
}
