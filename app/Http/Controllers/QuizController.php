<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\Answer;
use App\CorrectAnswer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('quizzes.index');
    }
    public function create(Request $request)
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        //Prepare variables
        $data = $request->all();

        //Create the new Quiz
        $quiz = new Quiz;
        $quiz->user_id = Auth::user()->id;
        $quiz->quiz = $request->input('quiz_name');
        $quiz->save();

        foreach ($data as $key => $value) {

            //Create Questions Array
            if (starts_with($key, 'question')) {
                $questions_array[] = [$key => $value];
            }
            if (starts_with($key, 'AnswerInput')) {
                $answers_array[] = [$key => $value];
            }
            if (starts_with($key, 'OptionsRadios')) {
                $correct_answers_array[] = [$key => $value];
            }
        }

            //Create the new Questions
            if(starts_with($key, 'question')) {
                $question = new Question;
                $question->quiz_id = $quiz->id;
                $question->question = $value;
                $question->save();
                foreach ($answers_array as $key => $value) {
                    //Create the new Answers
                        $answer = new Answer;
                        $answer->question_id = $question->id;
                        $answer->answer = $value;
                        $answer->save();
                    //Create the new CorrectAnswers
                    foreach ($correct_answers_array as $key => $value) {
                        $correct_answer = new CorrectAnswer;
                        $correct_answer->question_id = $question->id;
                        $correct_answer->answer_id = intval(explode("option", $value)[1]);
                        $correct_answer->save();
                    }
                }
            }
        return view('quizzes.create', compact('questions_array', 'answers_array', 'correct_answers_array'));
    }
}

