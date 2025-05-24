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
    else
    {

        $data = array(
               
                   'name' => $this->input->post('name'),
                   'roll' => $this->input->post('roll'),
               );
            
               if ($this->Student_model->insert_student($data)) {
                 } else {
                    $this->session->set_flashdata('success', 'Student added successfully!');
                 }
               redirect('site');
    }
    

        }
     
    }
   
    
 


?>