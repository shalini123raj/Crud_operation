<?php
class Student_model extends CI_Model
{
     public function __construct()
    {
        parent::__construct();


        

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

   

}

?>
