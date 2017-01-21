@extends('layouts.app')
@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')
    <!-- New Task Form -->
        <form action="{{ url('quizzes') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Task Name -->
            <div class="form-group">
                <label for="quiz-name" class="col-sm-3 control-label">Quiz Name</label>
                <div class="col-sm-6">
                    <input type="text" name="quizName" id="quiz-name" class="form-control">
                </div>
            </div>

            <table class="table" id="tab_logic">
                <thead>
                <tr>
                    <th>Question</th>
                    <th colspan="4">Answers</th>
                </tr>
                </thead>
                <tbody>
                <tr id="index1">
                    <fieldset class="form-group">
                        <td>
                            <label for="Question1">Question 1</label>
                            <input type="text" name="question1" id="Question1">
                        </td>
                        <td>
                            <table class="table-sm">
                                <tbody>
                                <tr>
                                    <fieldset class="form-group">
                                        <td>
                                            <div class="form-group">
                                                <label for="Question1AnswerInput1">Answer 1</label>
                                                <input type="text" class="form-control" id="Question1AnswerInput1" aria-describedby="Question1AnswerInput1" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="Question1AnswerInput2">Answer 2</label>
                                                <input type="text" class="form-control" id="Question1AnswerInput2" aria-describedby="Question1AnswerInput2" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="Question1AnswerInput3">Answer 3</label>
                                                <input type="text" class="form-control" id="Question1AnswerInput3" aria-describedby="Question1AnswerInput3" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3">
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="Question1AnswerInput4">Answer 4</label>
                                                <input type="text" class="form-control" id="Question1AnswerInput4" aria-describedby="Question1AnswerInput4" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios4" value="option4">
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                    </fieldset>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </fieldset>
                    <td>
                        <div id="add_question" class="btn btn-info">Add Question</div>
                    </td>
                </tr>
                <tr id='index2'></tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Create Quiz</button>
        </form>

        {{ $request }}
    </div>

    <script>
        $(document).ready(function(){
            var i=2;
            $("#add_question").click(function(){
                $('#index'+i).html('<td><label for="Question'+i+'">Question '+i+'</label><input type="text" name="question'+i+'" id="Question'+i+'"></td><td><table class="table-sm"><tbody><tr><fieldset class="form-group"><td><div class="form-group"><label for="Question'+i+'AnswerInput1">Answer '+i+'</label><input type="text" class="form-control" id="Question'+i+'AnswerInput1" aria-describedby="Question'+i+'AnswerInput1" placeholder="Enter answer"></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="question'+i+'OptionsRadios" id="question'+i+'OptionsRadios1" value="option1" checked>Correct?</label></div></td><td><div class="form-group"><label for="Question'+i+'AnswerInput2">Answer 2</label><input type="text" class="form-control" id="Question'+i+'AnswerInput2" aria-describedby="Question'+i+'AnswerInput2" placeholder="Enter answer"></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="question'+i+'OptionsRadios" id="question'+i+'optionsRadios2" value="option2">Correct?</label></div></td><td><div class="form-group"><label for="Question'+i+'AnswerInput3">Answer 3</label><input type="text" class="form-control" id="Question'+i+'AnswerInput3" aria-describedby="Question'+i+'AnswerInput3" placeholder="Enter answer"></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="question'+i+'optionsRadios" id="question'+i+'optionsRadios3" value="option3">Correct?</label></div></td><td><div class="form-group"><label for="Question'+i+'AnswerInput4">Answer 4</label><input type="text" class="form-control" id="Question'+i+'AnswerInput4" aria-describedby="Question1AnswerInput4" placeholder="Enter answer"></div><div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="question'+i+'optionsRadios" id="question'+i+'optionsRadios4" value="option4">Correct?</label></div></td></tr></tbody></table></td><td id="DeleteQuestionWrapper'+i+'"><button class="btn btn-danger row-delete" id="DeleteQuestion'+i+'">Delete Question</button></td> </fieldset>');
                $('#tab_logic').append('<tr id="index'+(i+1)+'"></tr>');
                var delete_button = $('#DeleteQuestion'+(i-1));
                delete_button.remove();
                if (i==3) {
                    $('#DeleteQuestion4').remove();
                }
                i++;
                console.log(i);
            });
            $(document.body).on('click', '.row-delete' ,function(){
                var row = $(this).closest('tr');
                row.remove();
                $('#index'+(i)).attr("id","index"+(i-1));
                var insertedDeleteButton = '<button class="btn btn-danger row-delete" id="DeleteQuestion'+(i)+'">Delete Question</button>';
                $('#DeleteQuestionWrapper'+(i-2)).append(insertedDeleteButton);
                i--;
                console.log(i);
            });
        });
    </script>

@endsection
