@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>{{ $quiz->quiz }}</h1>
                    <form method="post" action="{{ url('quizzes/{quiz}') }}">
                        <input name="invisible" type="hidden" value="{{ $quiz->id }}">
                       {{ csrf_field() }}
                       <?php $i = 1 ?>
                        @foreach($quiz->questions as $question)
                            <fieldset class="form-group">
                                <legend>{{ $question->question }}</legend>
                                <?php $j = 1 ?>
                                <div class="form-check">
                                @foreach($question->answers as $answer)
                                        <label class="form-check-label">
                                            <label for="{{$question->id}}">  {{ $answer->answer }} </label>
                                            <input type="radio" class="form-check-input" name="{{$question->id}}" value="{{$answer->id}}" {{ $j==1 ? 'checked' : '' }}>
                                        </label>
                                    {{$j++}}
                                @endforeach
                                </div>
                            </fieldset>
                            <?php $i++ ?>
                        @endforeach
                        <button type="submit" class="btn btn-primary mt-5">Submit Answers</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
