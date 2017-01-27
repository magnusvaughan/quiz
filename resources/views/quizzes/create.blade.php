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
                <label for="quiz-name[1]" class="col-sm-3 control-label">Quiz Name</label>
                <div class="col-sm-6">
                    <input type="text" name="quiz-name" id="quiz-name" class="form-control">
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
                        <td>
                            <label for="question[1][question-text]">Question 1</label>
                            <input type="text" name="question[1][question-text]" id="question[1][question-text]">
                        </td>
                        <td>
                            <table class="table-sm">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="question[1][answers][1]">Answer 1</label>
                                                <input type="text" class="form-control" name="question[1][answers][1]" id="question[1][answers][1]" aria-describedby="question[1][answers][1]" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label class="question[1][answers][is_correct]">
                                                    <input type="radio" class="form-check-input" name="question[1][answers][is_correct]" id="question[1][answers][1][is_correct]" value="1" checked>
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="question[1][answers][2]">Answer 2</label>
                                                <input type="text" class="form-control" name="question[1][answers][2]" id="question[1][answers][2]" aria-describedby="question[1][answers][2]" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label for="question[1][answers][is_correct]" class="form-check">
                                                    <input type="radio" class="form-check-input" name="question[1][answers][is_correct]" id="question[1][answers][2][is_correct]" value="2">
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="question[1][answers][3]">Answer 3</label>
                                                <input type="text" class="form-control" name="question[1][answers][3]" id="question[1][answers][3]" aria-describedby="question[1][answers][3]" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label for="question[1][answers][3][is_correct]" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="question[1][answers][is_correct]" id="question[1][answers][3][is_correct]" value="3">
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="question[1][answers][4]">Answer 4</label>
                                                <input type="text" class="form-control" name="question[1][answers][4]" id="question[1][answers][4]" aria-describedby="question[1][answers][4]" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label for="question[1][answers][is_correct]" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="question[1][answers][is_correct]" id="question[1][answers][4][is_correct]" value="4">
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    <td>
                        <div id="add_question" class="btn btn-info">Add Question</div>
                    </td>
                </tr>
                <tr id='index2'></tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Create Quiz</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            var i=2;
            $("#add_question").click(function(){
                $('#index'+i).html('<td><label for="question['+i+'][question-text]">Question '+i+'</label><input type="text" name="question['+i+'][question-text]" id="question['+i+'][question-text]"></td><td><table class="table-sm"><tbody><tr><td><div class="form-group"><label for="question['+i+'][answers][1]">Answer 1</label><input type="text" class="form-control" name="question['+i+'][answers][1]" id="question['+i+'][answers][1]" aria-describedby="question['+i+'][answers][1]" placeholder="Enter answer"></div><div class="form-check"><label for="question['+i+'][answers][correct]" class="answer-check"><input type="radio" class="form-check-input" name="question['+i+'][answers][correct]" id="question['+i+'][answers][1][correct]" value="true" checked>Correct?</label></div></td><td><div class="form-group"><label for="question['+i+'][answers][2]">Answer 2</label><input type="text" class="form-control" name="question['+i+'][answers][2]" id="question['+i+'][answers][2]" aria-describedby="question['+i+'][answers][2]" placeholder="Enter answer"></div><div class="form-check"><label for="question['+i+'][answers][correct]" class="form-check"><input type="radio" class="form-check-input" name="question['+i+'][answers][correct]" id="question['+i+'][answers][2][correct]" value="true">Correct?</label></div></td><td><div class="form-group"><label for="question['+i+'][answers][3]">Answer 3</label><input type="text" class="form-control" name="question['+i+'][answers][3]" id="question['+i+'][answers][3]" aria-describedby="question['+i+'][answers][3]" placeholder="Enter answer"></div><div class="form-check"><label for="question['+i+'][answers][correct]" class="form-check-label"><input type="radio" class="form-check-input" name="question['+i+'][answers][correct]" id="question['+i+'][answers][3][correct]" value="true">Correct?</label></div></td><td><div class="form-group"><label for="question['+i+'][answers][4]">Answer 4</label><input type="text" class="form-control" name="question['+i+'][answers][4]" id="question['+i+'][answers][4]" aria-describedby="question['+i+'][answers][4]" placeholder="Enter answer"></div><div class="form-check"><label for="question['+i+'][answers][correct]" class="form-check-label"><input type="radio" class="form-check-input" name="question['+i+'][answers][correct]" id="question['+i+'][answers][4][correct]" value="true">Correct?</label></div></td></tr></tbody></table></td>');
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
