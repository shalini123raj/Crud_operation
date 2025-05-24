<?php
class Student_model extends CI_Model
{
     public function __construct()
    {
        parent::__construct();


        

    }

    public function insert_student($data)
    {
        $this->db->insert('student',$data);   

    }

    public function update_student($data)
    {
        $this->db->replace('student', $data);
    

    }

   

}

?>
