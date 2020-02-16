<?php

namespace Fanhai\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'company_id',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    public function company()
    {
        return $this->belongsTo('\Fanhai\Models\Company');
    }
}
