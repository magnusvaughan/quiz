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
                    <input type="text" name="quiz-name[1]" id="quiz-name[1]" class="form-control">
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
                            <label for="question-text[1]">Question 1</label>
                            <input type="text" name="question-text[1]" id="question-text[1]">
                        </td>
                        <td>
                            <table class="table-sm">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="answer[1][1]">Answer 1</label>
                                                <input type="text" class="form-control" name="answer[1][1]" id="answer[1][1]" aria-describedby="answer[1][1]" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label class="answer-check[1]">
                                                    <input type="radio" class="form-check-input" name="answer-check[1]" id="answer-check[1][1]" value="option1" checked>
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="answer[1][2]">Answer 2</label>
                                                <input type="text" class="form-control" name="answer[1][2]" id="answer[1][2]" aria-describedby="answer[1][2]" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label for="answer-check[1]" class="form-check">
                                                    <input type="radio" class="form-check-input" name="answer-check[1]" id="answer-check[1][2]" value="option2">
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="answer[1][3]">Answer 3</label>
                                                <input type="text" class="form-control" name="answer[1][3]" id="answer[1][3]" aria-describedby="answer[1][3]" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label for="answer-check[1][3]" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="answer-check[1]" id="answer-check[1][3]" value="option3">
                                                    Correct?
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="answer[1][4]">Answer 4</label>
                                                <input type="text" class="form-control" name="answer[1][4]" id="answer[1][4]" aria-describedby="answer[1][4]" placeholder="Enter answer">
                                            </div>
                                            <div class="form-check">
                                                <label for="answer-check[1]" class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="answer-check[1]" id="answer-check[1][4]" value="option4">
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
                $('#index'+i).html('<td><label for="question-text['+i+'1]">Question '+i+'</label><input type="text" name="question-text['+i+']" id="question-text['+i+']"></td><td><table class="table-sm"><tbody><tr><td><div class="form-group"><label for="answer['+i+'][1]">Answer 1</label><input type="text" class="form-control" name="answer['+i+'][1]" id="answer['+i+'][1]" aria-describedby="answer['+i+'][1]" placeholder="Enter answer"></div><div class="form-check"><label for="answer-check['+i+']" class="answer-check"><input type="radio" class="form-check-input" name="answer-check['+i+']" id="answer-check['+i+'][1]" value="option1" checked>Correct?</label></div></td><td><div class="form-group"><label for="answer['+i+'][2]">Answer 2</label><input type="text" class="form-control" name="answer['+i+'][2]" id="answer['+i+'][2]" aria-describedby="answer['+i+'][2]" placeholder="Enter answer"></div><div class="form-check"><label for="answer-check['+i+']" class="form-check"><input type="radio" class="form-check-input" name="answer-check['+i+']" id="answer-check['+i+'][2]" value="option2">Correct?</label></div></td><td><div class="form-group"><label for="answer['+i+'][3]">Answer 3</label><input type="text" class="form-control" name="answer['+i+'][3]" id="answer['+i+'][3]" aria-describedby="answer['+i+'][3]" placeholder="Enter answer"></div><div class="form-check"><label for="answer-check['+i+']" class="form-check-label"><input type="radio" class="form-check-input" name="answer-check['+i+']" id="answer-check['+i+'][3]" value="option3">Correct?</label></div></td><td><div class="form-group"><label for="answer['+i+'][4]">Answer 4</label><input type="text" class="form-control" name="answer['+i+'][4]" id="answer['+i+'][4]" aria-describedby="answer['+i+'][4]" placeholder="Enter answer"></div><div class="form-check"><label for="answer-check['+i+']" class="form-check-label"><input type="radio" class="form-check-input" name="answer-check['+i+']" id="answer-check['+i+'][4]" value="option4">Correct?</label></div></td></tr></tbody></table></td>');
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
