<div class="container">
    <div class="form-group shadow-lg p-3 mb-5 bg-white rounded">
        <fieldset class="the-fieldset">
            <legend class="the-legend" align="center">
                <h1 style="color:#2775f2" align="center">Admin Panel</h1>
                <p><img class="aligncenter size-thumbnail" src="<?= assetUrl() ?>/img/crud.jpg" style="width: 100%"/></p>
            </legend>
                
                    <?php $success = $this->session->userdata('success');
                        if($success != ""){ ?>
                            <div class="alert alert-success">
                                <?= $success;?>
                            </div>
                            <?php } ?>
                
                <form id='quiz' method="post" action="">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <strong>Question:</strong>
                            <input name="question" type="text" id="question" class="form-control" size="40" value="<?php if(isset($quizData)){ $val = $quizData['question'];}else{$val = "";} echo set_value('question',$val); ?>" />
                                <span style="color:red"><?php echo form_error('question')?></span>
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <strong>Option A:</strong> <br>
                            <input name="optionA" type="text" id="optionA" size="40" class="form-control" value="<?php if(isset($quizData)){ $val = $quizData['option_A'];}else{$val = "";} echo set_value('optionA',$val); ?>" />
                            <span style="color:red"><?php echo form_error('optionA'); ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <strong>Option B:</strong> <br>
                            <input name="optionB" type="text" id="optionB" size="40" class="form-control" value="<?php if(isset($quizData)){ $val = $quizData['option_B'];}else{$val = "";} echo set_value('optionB',$val); ?>" />
                            <span style="color:red"><?php echo form_error('optionB'); ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <strong>Option C:</strong> <br>
                            <input name="optionC" type="text" id="optionC" size="40" class="form-control" value="<?php if(isset($quizData)){ $val = $quizData['option_C'];}else{$val = "";} echo set_value('optionC',$val); ?>" />
                            <span style="color:red"><?php echo form_error('optionC'); ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <strong>Option D:</strong> <br>
                            <input name="optionD" type="text" id="optionD" size="40" class="form-control" value="<?php if(isset($quizData)){ $val = $quizData['option_D'];}else{$val = "";} echo set_value('optionD',$val); ?>" />
                            <span style="color:red"><?php echo form_error('optionD'); ?></span>
                            <br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <strong>Correct Answer:</strong> <br>
                            <input name="correctAnswer" type="text" id="correctAnswer" size="40" class="form-control" value="<?php if(isset($quizData)){ $val = $quizData['correct_answer'];}else{$val = "";} echo set_value('correctAnswer',$val); ?>" />
                            <span style="color:red"><?php echo form_error('correctAnswer'); ?></span>
                            <br>
                        </div>
                    </div>
                    <?php if(!isset($updateFlag)){ ?><button type="submit" name="create" class="btn btn-dark" align="center" formaction="<?= base_url(); ?>index.php?/Edit/create">Create</button><?php } ?>
<?php if(isset($updateFlag)){ ?><button type="submit" name="update" class="btn btn-dark" align="center" formaction="<?php echo base_url().'index.php?/Edit/edit/'.$quizData['question_id']; ?>">Update</button><?php }?>
                </form>
<?php //} ?>
            
    <br>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Actions</th>
          <th scope="col">Question</th>
          <th scope="col">Option A</th>
          <th scope="col">Option B</th>
          <th scope="col">Option C</th>
          <th scope="col">Option D</th>
          <th scope="col">Correct Answer</th>
        </tr>
      </thead>
      <tbody>
        <? foreach ($quiz as $row) { ?>
        <tr>
          <th scope="row">
            <a href="<?php echo base_url().'index.php?/Edit/delete/'.$row['question_id']; ?>"><i style="color:red" class="fa fa-trash fa-2x"></i></a>
            <a href="<?php echo base_url().'index.php?/Edit/edit/'.$row['question_id']; ?>"><i style="color:blue" name ="edit" class="fa fa-edit fa-2x"></i></a>
          </th>
          <td><?= $row['question'] ?></td>
          <td><?= $row['option_A'] ?></td>
          <td><?= $row['option_B'] ?></td>
          <td><?= $row['option_C'] ?></td>
          <td><?= $row['option_D'] ?></td>
          <td><?= $row['correct_answer'] ?></td>
        </tr>
        <? } ?>
      </tbody>
    </table>
    </fieldset>
</div>
</div>
