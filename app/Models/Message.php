<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name','mobile','email','subject','body','comment','sender_id','reciver_id','time_sent','in_draft'];
}
