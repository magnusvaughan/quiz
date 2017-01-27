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
        //Get Request Data
        $data = $request->all();

        //Echo data array
        highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");

        //Create Quiz instance
        $quiz = new Quiz;
        $quiz->user_id = Auth::user()->id;
        $quiz->quiz = $data['quiz-name'];
        $quiz->save();
        //Create Question Instance
        foreach ($data['question'] as $question_key => $question) {
            $question_instance = new Question;
            $question_instance->quiz_id = $quiz->id;
            $question_instance->question = $question['question-text'];
            $question_instance->save();
            //Create Answer Instance
            foreach ($question['answers'] as $answer_key => $answer ) {
                if($answer_key != "is_correct") {
                    var_dump($answer_key);
                    $answer_instance = new Answer;
                    $answer_instance->question_id = $question_instance->id;
                    $answer_instance->answer = $answer;
                    $answer_instance->save();
                }
                if($answer_key == 'is_correct'){
                    $correct_answer = CorrectAnswer::create(['question_id' => $question_instance->id, 'answer_id' => $answer_instance->id ]);
                }
////                //Create CorrectAnswer instance
//                if($answer_instance['correct'] == 'true') {
//                    $correct_answer_instance = new CorrectAnswer;
//                    $correct_answer_instance->question_id = $question_instance->id;
//                    $correct_answer_instance->answer_id = $answer_instance->id;
//                    $correct_answer_instance->save();
//                }
            }
        }
        return view('quizzes.create', compact('questions_array', 'answers_array', 'correct_answers_array'));
    }
}

