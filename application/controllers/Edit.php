<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
      $this->load->model('Quiz_model');
      $this->TPL['isActive'] = "edit";
      $this->TPL['quiz'] = $this->Quiz_model->display();
      $this->TPL['createFlag'] = false;
    // Your own constructor code
  }

  public function index()
  {
      $this->template->show('edit', $this->TPL);
      
  }
    
  public function create()
  {
      $this->form_validation->set_rules('question', 'Question','required|min_length[20]|max_length[140]',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('optionA', 'OptionA','required|min_length[2]|max_length[50]|alpha_numeric_spaces',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('optionB', 'OptionB','required|min_length[2]|max_length[50]|alpha_numeric_spaces',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('optionC', 'OptionC','required|min_length[2]|max_length[50]|alpha_numeric_spaces',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('optionD', 'OptionD','required|min_length[2]|max_length[50]|alpha_numeric_spaces',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('correctAnswer', 'CorrectAnswer','required|min_length[2]|max_length[50]|alpha_numeric_spaces',array('required' => 'You must provide a %s.'));
      

      
    if ($this->form_validation->run() == FALSE)
    {
        $this->template->show('edit', $this->TPL);
    }
    else
    {
        $quizQuestion = array();
         $quizQuestion['question'] = $this->input->post('question');
         $quizQuestion['option_A'] = $this->input->post('optionA');
         $quizQuestion['option_B'] = $this->input->post('optionB');
         $quizQuestion['option_C'] = $this->input->post('optionC');
         $quizQuestion['option_D'] = $this->input->post('optionD');
         $quizQuestion['correct_answer'] = $this->input->post('correctAnswer');
        $this->Quiz_model->create($quizQuestion);
        $this->session->set_flashdata('
                                      success', 'Quiz inserted successfully!');
        redirect(base_url().'index.php?/Edit');
    }
    
  }
  public function edit($question_id)
  {
      $quiz = $this->Quiz_model->getSingleUser($question_id);
      $this->TPL['quizData'] = $quiz;
      $this->TPL['updateFlag'] = TRUE;
      
      $this->form_validation->set_rules('question', 'Question','required|min_length[20]|max_length[140]',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('optionA', 'OptionA','required|min_length[2]|max_length[50]',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('optionB', 'OptionB','required|min_length[2]|max_length[50]',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('optionC', 'OptionC','required|min_length[2]|max_length[50]',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('optionD', 'OptionD','required|min_length[2]|max_length[50]',array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('correctAnswer', 'CorrectAnswer','required|min_length[2]|max_length[50]',array('required' => 'You must provide a %s.'));
      
      
      if ($this->form_validation->run() == FALSE)
      {
          $this->template->show('edit', $this->TPL);
      }
      else
      {
          $quizQuestion = array();
           $quizQuestion['question'] = $this->input->post('question');
           $quizQuestion['option_A'] = $this->input->post('optionA');
           $quizQuestion['option_B'] = $this->input->post('optionB');
           $quizQuestion['option_C'] = $this->input->post('optionC');
           $quizQuestion['option_D'] = $this->input->post('optionD');
           $quizQuestion['correct_answer'] = $this->input->post('correctAnswer');
          $this->Quiz_model->updateQuiz($question_id,$quizQuestion);
          $this->session->set_flashdata('success', 'Quiz updated successfully!');
          redirect(base_url().'index.php?/Edit');
      }
  }

    public function delete($question_id)
    {
        $this->Quiz_model->deleteQuiz($question_id);
        $this->session->set_flashdata('success','Quiz deleted successfully!');
        redirect(base_url().'index.php?/Edit');
    }
}

