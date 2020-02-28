
<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
      $this->load->model('Quiz_model');
      $this->load->library('session');
      $this->TPL['isActive'] = "quiz";

    // Your own constructor code
  }

  public function index()
  {
    $questions = $this->Quiz_model->display();
    
      $this->TPL['totalQuestions'] = count($questions);
    $this->template->show('quiz', $this->TPL);
  }
    
    public function getData()
    {
        $resultList = $this->Quiz_model->fetchAllData('*','quiz');
        $quizVisitArray = $this->db->get('quiz_visited')->result_array();
        $questions = $this->Quiz_model->display();
        $this->TPL['totalQuestions'] = count($questions);
        $where = $quizVisitArray[0]['visited_quiz'];
        echo json_encode($resultList);
    }
}
