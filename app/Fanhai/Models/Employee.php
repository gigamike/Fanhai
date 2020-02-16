<?php

namespace Fanhai\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'department_id',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    public function department()
    {
        return $this->belongsTo('\Fanhai\Models\Department');
    }
}
