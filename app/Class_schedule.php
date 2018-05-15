<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_schedule extends Model
{
    //
    public $timestamps = false;
    protected $table = 'class_schedule';
    protected $fillable = [
        'csid', 'ccode', 'class','day', 'start_time', 'end_time', 'campus', 'room', 'lecturer', 'quota'
    ];
}
