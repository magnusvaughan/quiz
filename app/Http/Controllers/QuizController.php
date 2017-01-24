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

        highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
//
//        //Create the new Quiz
//        $quiz = new Quiz;
//        $quiz->user_id = Auth::user()->id;
//        $quiz->quiz = $request->input('quiz_name');
//        $quiz->save();
//
//        $questions_array = [];
//        $answers_array = [];
//        $correct_answers_array = [];
//
//        foreach ($data as $key => $value) {
//
//            //Create Questions Array
//            if (starts_with($key, 'question')) {
//                $questions_array[] = [$key => $value];
//            }
//            if (starts_with($key, 'AnswerInput'))  {
//                $answers_array[strtolower($key)] =  $value;
//            }
//            if (starts_with($key, 'OptionsRadios')) {
//                $correct_answers_array[] = [$key => $value];
//            }
//        }
//
//
////        var_dump($key);
////        dd($correct_answers_array);
//
//        foreach ($data as $key => $value) {
//            //Create the new Questions
//            if (starts_with($key, 'question')) {
//                $question = new Question;
//                $question->quiz_id = $quiz->id;
//                $question->question = $value;
//                $question->save();
//                $question_reference = $question->id;
//                foreach ($answers_array as $answer_key => $value) {
//                    if ( str_contains($answer_key, $key) ) {
//                        $answer = new Answer;
//                        $answer->question_id = $question_reference;
//                        $answer->answer = $value[0];
//                        $answer_key_reference = $answer_key;
//                        $answer->save();
//                        $answer_id_reference = $answer->id;
//                        //Create the new CorrectAnswers
//                        foreach ($correct_answers_array as $correct_answer_key => $value) {
//                            $answer_key_reference_first = explode("answerinput", $answer_key_reference)[1];
//                            $answer_key_reference_second = explode("-", $answer_key_reference_first)[0];
//                            $answer_key_reference_int = intval($answer_key_reference_second);
//                            $value_reference = explode("option", key($value));
//                            $value_reference_int = intval($value_reference);
//                            if ($value_reference_int == $answer_key_reference_int) {
//                                $correct_answer = new CorrectAnswer;
//                                $correct_answer->question_id = $question_reference;
//                                $correct_answer->answer_id = $answer_id_reference;
//                                $correct_answer->save();
//                            }
//                        }
//                    }
//                }
//            }
//        }
        return view('quizzes.create', compact('questions_array', 'answers_array', 'correct_answers_array'));
    }
}

