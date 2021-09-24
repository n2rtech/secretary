<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

     public function employees()
    {
          return $this->belongsToMany( 'App\Models\Employee', 'employee_groups', 'group_id', 'employee_id' );

    }
}

