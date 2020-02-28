
<div class="container">
<div class="form-group shadow-lg p-3 mb-5 bg-white rounded">
    <fieldset class="the-fieldset">
        <legend class="the-legend" align="center">
            <h1 style="color:#2775f2">Quiz App</h1>
            <img src="<?= assetUrl() ?>/img/quiz.jpg">
            <br>
            <h4 id="score" style="float:right;color:#5999ff"></h4>
        </legend>
        <div id="welcomeQuiz"><h3 align="center">Welcome to our Quiz!!</h3><br><br><h5 align="center">There will be some general questions asked and answers would be provided upon clicking "Check Answer"</h5><br><br></div>
        <div id="finishQuiz"><h3 align="center">Thank you for taking our Quiz!!</h3><br><br><h5 align="center">You are always welcome to take our quiz again!!</h5><br><br></div>
        <div id="displayQuiz" class='panel panel-primary'>
            <div class='panel-heading'>
                <div id="displayAnswer"></div>
                <h3 class='panel-title'>
                    <span id="labelQuestion" align="center"></span>
                </h3>
            </div>
            <div class='panel-body'>
                <div id='optionA'>
                        <input type='radio' id='optionsRadios1' name='question' value='A' required>
                        <label id="labelOptionA" ></label>
                </div>
                <div id='optionB'>
                        <input type='radio' id='optionsRadios2' name='question' value='B' required>
                        <label id="labelOptionB"></label>
                </div>
                <div id='optionC'>
                        <input type='radio' id='optionsRadios3' name='question' value='C' required>
                        <label id="labelOptionC"></label>
                </div>
                <div id='optionD'>
                        <input type='radio' id='optionsRadios4' name='question' value='D' required>
                        <label id="labelOptionD"></label>
                </div>
            </div>
        </div>
                    
<div class="panel-footer"  style="text-align: center">
        <button class="btn btn-dark" id="quizButton" role="button">Start</button>
        <button class="btn btn-dark" id="checkButton" role="button" disabled >Check Answer</button>
    </div>
    </fieldset>
    </div>

</div>
<script type="text/javascript">
    
        //displaying data on page start here
        $(document).ready(function(){
          var correct;
          var answerCount =0;
          var correctAnswer;
          var optionA;
          var optionB;
          var optionC;
          var optionD;
          $("#displayQuiz").hide();
          $("#finishQuiz").hide();

          $("#quizButton").on("click", function(){
            $.ajax({
                url:'<?=base_url()?>index.php?/Quiz/getData/',
                method: 'post',
                dataType: 'json',
                success: function(response)
                   {
                   var len = response.length;
                   
                   if(len >0){
                   $("#quizButton").text("Next");
                   $("#quizButton").prop('disabled', true);
                   $("#checkButton").prop('disabled', false);
                   $('input[name=question]').attr("disabled",false);
                   $('input:radio[name=question]:checked').prop('checked', false);
                   $("#score").text("Score : ("+ answerCount + "/ <?php echo $totalQuestions; ?>)");
                   $("#displayAnswer").hide();
                   $("#welcomeQuiz").hide();
                   var question = response[0].question;
                   optionA = response[0].option_A;
                   optionB = response[0].option_B;
                   optionC = response[0].option_C;
                   optionD = response[0].option_D;
                     correct = response[0].correct_answer;
                   $("#displayQuiz").show();
                   $("#labelQuestion").text(question);
                   $("#labelOptionA").text(optionA);
                   $("#labelOptionB").text(optionB);
                   $("#labelOptionC").text(optionC);
                   $("#labelOptionD").text(optionD);

                   }else{
                       $("#displayQuiz").hide();
                       $("#quizButton").text("Start Again");
                       $("#finishQuiz").show();
                       answerCount =0;
                   }
                }
                });
              });
             $("#checkButton").on("click", function(){
                      if(!$("input[name='question']:checked").val())
                      {
                        alert("Please select answer to proceed!!");
                      }
                      else{
                     $("#quizButton").prop('disabled', false);
                     $("#checkButton").prop('disabled', true);
                     $('input[name=question]').attr("disabled",true);
                     
                      var arr = $("input[name='question']:checked").val();
                      if(arr == correct)
                      {
                          answerCount++;
                          $("#score").text("Score : ("+ answerCount + "/ <?php echo $totalQuestions; ?>)");
                          $("#displayAnswer").show();
                          $("#displayAnswer").html("<div class='alert alert-success' role='alert'> Hooray!! You answered correctly!!</div>");
                      }
                      else
                      {
                          $("#score").text("Score : ("+ answerCount + "/ <?php echo $totalQuestions; ?>)");
                          $("#displayAnswer").show();
                          $("#displayAnswer").html("<div class='alert alert-danger' role='alert'> Sorry you answered incorrectly, Correct is : "+correct+"</div>");
                          
                      }
                    }
             });
        });

</script>
