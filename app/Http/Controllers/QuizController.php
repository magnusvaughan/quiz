<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\Answer;
use App\CorrectAnswer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz) {

        return view('quizzes.show', compact('quiz'));

    }

    public function result(Request $request) {

        $data = $request->all();
        $answers_array = [];
        $correct_answers_array = [];
        $correct_answers_array_filtered = [];
        $question_count = 0;
        foreach ($data as $key => $datum) {
            if($key != '_token' && $key != 'invisible') {
                $answers_array[$key] = $datum;
                $correct_answers_array[] =  json_decode(DB::table('correct_answers')->where('question_id', $key)->get(), true);
                $question_count++;
            }
        }
        foreach ($correct_answers_array as $correct_answer) {
            $correct_answers_array_filtered[$correct_answer[0]['question_id']] = $correct_answer[0]['answer_id'];
        }
        $correct_answers_count = count(array_intersect($answers_array, $correct_answers_array_filtered));

        return view('quizzes.result', compact('data','correct_answers_array_filtered', 'answers_array', 'correct_answers_count', 'question_count'));

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
//        highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
<?php
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
                    //Create CorrectAnswer instance
                    $correct_answer = CorrectAnswer::create(['question_id' => $question_instance->id, 'answer_id' => $answer_instance->id ]);
                }
            }
        }
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }
}

