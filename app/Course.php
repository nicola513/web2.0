<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public $timestamps = false;
    protected $table = 'course';
    protected $fillable = [
        'ccode', 'cname', 'credit_hour','type', 'year', 'pre_req'
    ];
}
