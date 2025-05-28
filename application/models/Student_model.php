<?php
class Student_model extends CI_Model
{
     public function __construct()
    {
        parent::__construct();


        

    }
    public function getAllStudent()
    {
      $query = $this->db->get('student');
      if($query){
        return $query->result();

      }
    }

    public function insert_student($data)
    {
       $query =  $this->db->insert('student',$data); 
       if($query){
        return true;
       } 
       else{
        return false;
       } 

    }

    public function select($data, $table, $where )
    {
       
      $this->db->select($data)->from($table)->where($where);
      $result = $this->db->get()->row_array();

    return $result;

    }
    public function getsinglestudent($id)
    {
      $this->db->where('id', $id);
      $query= $this->db->get('student');
      if($query){
        return $query->row();

      }



    }

    public function updatestudent($data, $id)
    {
      $this->db->where('id', $id);
      $query = $this->db->update('student', $data);
      if($query){
        return true;

      }
      else{
        return false;
      }

    }

    public function deleteItem($id)
    {
      $this->db->where('id', $id);
      $query = $this->db->delete('student');
      if($query){
        return true;

      }
      else{
        return false;
      }


    }
    
   

}

?>
