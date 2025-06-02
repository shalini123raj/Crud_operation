<?php
class Address_model extends CI_Model
{
     public function __construct()
    {
        parent::__construct();


        

    }
    public function getAllAddress()
    {
      $this->db->select('sa.*,s.name, s.roll,s.class,s.mentor')->from('student_address as sa');
      $this->db->join('student as s', 's.id=sa.student_id');
      

        return $this->db->get()->result();

      
    }

        public function getAllstudent()
    {
      $query = $this->db->get('student');
      if($query){
        return $query->result();

      }
    }

    public function insert_student_Address($data)
    {
       $query =  $this->db->insert('student_address',$data); 
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
    public function getSingleStudentAddress($id)
    {
      $this->db->where('id', $id);
      $query= $this->db->get('student_address');
      if($query){
        return $query->row();

      }



    }

    public function UpdateAddressStudent($data, $id)
    {
      $this->db->where('id', $id);
      $query = $this->db->update('student_address', $data);
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
      $query = $this->db->delete('student_address');
      if($query){
        return true;

      }
      else{
        return false;
      }


    }
    
   

}

?>