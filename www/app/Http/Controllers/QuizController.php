<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Setting;
use App\Models\Quiz;
use App\Models\QuizQuestion;

class QuizController extends Controller
{
    private $settingss;
    
    public function __construct(){
        $this->settings = Setting::first();
    }
    
    public function index(){
        $isContainSub = false;
        $questions = array();
        $operators = array();
        if($this->settings->addition){
            $operators[] = '+';
        }
        if($this->settings->subtraction){
            $operators[] = '-';
            $isContainSub = true;
        }
        if($this->settings->multiplication){
            $operators[] = '*';
        }
        if($this->settings->division){
            $operators[] = '/';
        }
        
        for($i = 0; $i < $this->settings->numberOfQuestion; $i++){
            $question = '';
            $operator = '';
            $tempResult = 0;
            for($j=0; $j<$this->settings->factor; $j++){
                if($j+1 == $this->settings->factor){
                    if($operator == '-') {
                        $factor = rand(0, $tempResult);
                    } 
                    if($operator == '/'){
                        $factors = $this->getAllfactors($tempResult);
                        if(!empty($factors)) {
                            $factor = $factors[array_rand($factors)];
                        } else {
                            $factor = 1;
                        }
                    }
                    else {
                        $factor = rand($this->settings->min, $this->settings->max);
                    }
                    $question .= $factor;
                } else {
                    $operator = $operators[array_rand($operators)];
                    if($operator == '-' && $j != 0) {
                        $factor = rand(0, $tempResult);    
                    } 
                    if($operator == '/' && $j !=0){
                        $factors = $this->getAllfactors($tempResult);
                        if(!empty($factors)) {
                            $factor = $factors[array_rand($factors)];
                        } else {
                            $factor = 1;
                        }
                    }
                    else {
                        $factor = rand($this->settings->min, $this->settings->max);
                    }
                    
                    $question .= $factor;
                    $tempResult = eval("return ($question);");
                    $question .= $operator;
                }
            }

            $questions[] = $question;
        }

        return view('quiz', ['settings'=> $this->settings, 'questions'=> $questions]);
    }

    private function getAllfactors ($number) {
        $factors = [];

        for ($i = 1; $i <= $number; $i++) {
            if ($number % $i === 0) {
                $factors[] = $i;
            }
        }

        if (count($factors) > 2){
            array_shift($factors);
            array_pop($factors);
        }
        
        return  $factors;
    }

    public function quizSubmit(Request $request)
    {
        $quiz = new Quiz;
        $correct = 0;
        $wrong = 0;
        $isPass = true;
        $date = date('Y-m-d');
        $duration = 0;
        $questions = json_decode($request->input('questions'));
        
        if($request->input('countdown') == 0) {
            $isPass = false;
        } else {
            $duration = $this->settings->timeLimitaion - $request->input('countdown');
        }

        foreach($questions as $key => $question){
            if(eval("return ($question);") == $request->input($key)){
                $correct++;
            } else {
                $wrong++;
            }
        }

        $quizzTakenToday = Quiz::where('date', $date)->count();
        
        $quiz->date = $date;
        $quiz->duration = $duration;
        $quiz->correct = $correct;
        $quiz->wrong = $wrong;
        $quiz->percentageOfCorrect = $correct/$this->settings->numberOfQuestion * 100;
        $quiz->isPass = ($correct/$this->settings->numberOfQuestion * 100 >= $this->settings->percentageForPass && $request->input('countdown') > 0) ? true : false;
        $quiz->order = $quizzTakenToday + 1;
        
        $quiz->save();
        $newQuizId = $quiz->quiz_id;

        foreach($questions as $key => $questionText){
            $question = new QuizQuestion;
            $question->quiz_id = $newQuizId;
            $question->question = $questionText;
            $question->answer = $request->input($key);
            $question->correction = eval("return ($questionText);") == $request->input($key) ? true : false;

            $question->save();
        }

        //$quizzPassedCount = Quiz::where('isPass', true)->count();
        if($quiz->isPass) {
            $this->settings->stars++;
        }
        

        $this->settings->save();

        return redirect()->route('history');
    }
}
