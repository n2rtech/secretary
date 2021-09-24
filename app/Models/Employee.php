<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $primaryKey = 'ID';

    public function groups()
    {
        return $this->belongsToMany( 'App\Models\Group', 'employee_groups', 'employee_id', 'group_id' );

    }
}
