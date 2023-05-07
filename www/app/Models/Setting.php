<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = 'setting';
    protected $primaryKey = 'settingId';

    protected $fillable = [
        'settingId',
        'max',
        'min',
        'numberOfQuestion',
        'percentageForPass',
        'factor',
        'rewardRate',
        'timeLimitaion',
        'addition',
        'subtraction',
        'multiplication',
        'division'
     ];
}
