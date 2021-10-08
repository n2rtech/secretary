<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarInformation extends Model
{
    protected $table = 'calendar_informations';
    protected $fillable = ['employee_id', 'from_date', 'from_time', 'start', 'to_date', 'to_time', 'end', 'event_type', 'event_activity', 'status', 'message_status'];
}
