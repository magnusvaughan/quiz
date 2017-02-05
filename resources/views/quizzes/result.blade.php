@extends('layouts.app')

@section('content')



    <h1>Your Results</h1>

    <h1>Correct Answers Count</h1>
    <h3>You answered {{ $correct_answers_count }} out of {{ $question_count }} correctly</h3>

    <?php $i = 1 ?>
    @foreach($data as $key => $datum)
      @if($key != '_token' && $key != 'invisible')

                <p>Your guess for question {{$i}} was {{$datum}}</p>

        <?php $i++ ?>
      @endif
    @endforeach
@endsection