
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model {

        public function __construct()
        {
          parent::__construct();
            $this->load->library('session');
          // Your own constructor code
        }

        public function create($quizQuestion)
        {
            $this->db->insert('quiz', $quizQuestion);
        }
    
        public function display()
        {
            $this->load->database();
            return $this->db->get('quiz')->result_array();
        }
    
        public function getSingleUser($question_id)
        {
            $this->load->database();
            $this->db->where('question_id',$question_id);
            return $this->db->get('quiz')->row_array();
        }
    
        public function updateQuiz($question_id,$quizQuestion)
        {
            $this->load->database();
            $this->db->where('question_id',$question_id);
            $this->db->update('quiz',$quizQuestion);
        }
        
        public function deleteQuiz($question_id)
        {
            $this->load->database();
            $this->db->where('question_id',$question_id);
            $this->db->delete('quiz');
        }
    
        public function fetchAllData($data,$tablename)
        {
            $quizVisitArray = $this->db->get('quiz_visited')->result_array();
            
            $where = $quizVisitArray[0]['visited_quiz'];
            
            $query = $this->db->query('SELECT * FROM quiz WHERE question_id NOT IN (' . $where .') ORDER BY RAND() LIMIT 1');
            
            $result = $query->result_array();
            if(count($result) >0)
            {
                $quizVisit['visited_quiz'] = $where .", " . $result[0]['question_id'];
                $this->db->update('quiz_visited',$quizVisit);
            }
            else
            {
                $quizVisit['visited_quiz'] = 0;
                $this->db->update('quiz_visited',$quizVisit);
            }
            
            
            
            return $result;
        }
}
