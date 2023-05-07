<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Setting;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Carbon\Carbon;

class HistoryController extends Controller
{
    private $settingss;
    
    public function __construct(){
        $this->settings = Setting::first();
    }
    
    public function index(){
        $quizzes = Quiz::orderBy('created_at', 'desc')->get();
        $quizArrayfor = array();
        foreach($quizzes as $quiz) {
            $temp = array(
                'date' => $quiz->date,
                'duration' => Carbon::now()->addMinutes($quiz->duration)->diff(Carbon::now())->format('%H:%I'),
                'correct' => $quiz->correct, 
                'wrong' => $quiz->wrong,
                'percentage' => $quiz->percentageOfCorrect,
                'isPass' => $quiz->isPass ? 'PASS' : 'NO', 
                'order' => $quiz->order, 
                'id' => $quiz->quiz_id,
            );
            $quizArrayfor[] = $temp;
        }
        return view('history', ['quizs'=> $quizArrayfor]);
    }

    public function show($id){
        $questions = QuizQuestion::where('quiz_id', $id)->get();

        return view('details', ['questions'=> $questions]);
    }
}
