@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul>
                    @foreach ($quizzes as $quiz)
                    <li><h4>{{$quiz->quiz}}</h4></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection
