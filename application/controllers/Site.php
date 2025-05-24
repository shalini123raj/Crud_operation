<?php 
class Site extends CI_Controller
{
   public function __construct()
   {
     parent::__construct();
   }
    function index()
    {
        $this->load->view('superadmin/base');
       
        
    }
    public function getStudentByid($id)
{
    //  echo "hrlk";
     $this->load->model('Student_model');
   
    $data['students'] = $this->Student_model->select('*', 'student', ['id' => $id]);

     
;    $this->load->view('superadmin/view',$data);
    

     
}


    public function addstudent()
    {
       
        $this->load->model('Student_model');

       $this->form_validation->set_rules('name', 'Student Name', 'trim|required' );

       if($this->form_validation->run() == false){
        $data_error = [

            'error' => validation_errors()


        ];

        $this->session->set_flashdata($data_error);

        redirect('Site');
      

    }
    else {
            $result = $this->Student_model->insert_student([
                'name' => $this->input->post('name'),
                'roll' => $this->input->post('roll'),

            ]); 
            if($result){
                 $this->session->set_flashdata('inserted', 'your data has been successfully added!');

            } 
            redirect('Site ');
        } 
    

        }  
    
    }       


?>  