<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //
    public $timestamps = false;
    protected $table = 'enrollment';
    protected $fillable = [
        'eid', 'uid', 'year','semester', 'ccode', 'class', 'lab', 'retake', 'grade', 'Remark'
    ];
}
