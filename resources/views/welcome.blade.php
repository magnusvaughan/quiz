@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center home-page-title">Welcome to Quiz Machine</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="http://placehold.it/450x150" class="card-img-top" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Take a quiz</h4>
                    <p class="card-text">Take one of our fantastic quizzes</p>
                    <a href="/quizzes/index" class="btn btn-primary">Do it!</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <img src="http://placehold.it/450x150" class="card-img-top" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Create a Quiz</h4>
                    <p class="card-text">Sign up / log in to create a quiz</p>
                    <a href="/quizzes/create" class="btn btn-primary">Create Quiz</a>
                </div>
            </div>
        </div>
    </div>
@endsection