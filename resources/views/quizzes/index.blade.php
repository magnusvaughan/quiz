@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Select a Quiz</h1>
                    <ul class="list-group">
                    @foreach ($quizzes as $quiz)
                    <li class="list-group-item"><h3><a href="/quizzes/{{$quiz->id}}">{{$quiz->quiz}}</a></h3></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection
