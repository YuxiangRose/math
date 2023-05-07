<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    protected $table = 'quiz';
    protected $primaryKey = 'quiz_id';

    protected $fillable = [
        'quiz_id',
        'date',
        'duration',
        'correct',
        'wrong',
        'percentageOfCorrect',
        'isPass',
        'order',
    ];
}
