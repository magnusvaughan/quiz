<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $request->inputs =  $request->all();

        return view('quizzes.create', compact('request'));
    }
}
