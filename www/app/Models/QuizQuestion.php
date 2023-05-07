<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    //
    protected $table = 'quiz_questions';
    protected $primaryKey = 'question_id';
    protected $hidden = ['quiz'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    protected $fillable = [
        'question_id',
        'quiz_id',
        'question',
        'answer',
        'correction',
    ];
}
