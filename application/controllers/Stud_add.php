<?php
class Stud_add extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()    
    {
        //  echo "hello";

         $data['Address_details'] = $this->Address_model->getAllAddress();
        //  echo "<pre>";
        //  print_r($data);
        //  die;
          

         $this->load->view('Add_view', $data);
        //  print_r($data);
        //  die;
    }
    public function getStudentAddressByid($id)
    {
        //  echo "hrlk";
        $this->load->model('Address_model');

        $data['student_address'] = $this->Address_model->select('*', 'student_address', ['id' => $id]);;
        $this->load->view('Add_view/Stud_add', $data);
    }


    public function AddStudentAddress()
    {

        $this->load->model('Address_model');

        $this->form_validation->set_rules('FatherName', 'MotherName', 'Address', 'Disti','trim|required');

        if ($this->form_validation->run() == false) {
            $data_error = [

                'error' => validation_errors()


            ];

            $this->session->set_flashdata($data_error);

            redirect('Stud_add');
        } else {

              
            $result = $this->Address_model->insert_student_Address([
                
                'Father_name' => $this->input->post('fathername'),
                'Mother_name' => $this->input->post('mothername'),
                'Address' => $this->input->post('Address'),
                'Disti' => $this->input->post('disti'),
                

            ]);
           
            if ($result) {
                $this->session->set_flashdata('inserted', 'your data has been successfully added!');
            }
            redirect('Stud_add');
        }
    }

    public function editstudentaddresss($id)
    {
         $data['singleaddressstudent'] = $this->Address_model->getSingleStudentAddress($id);
        $this->load->view('edit_view', $data);
        //   print_r($data);
        // die;
    }
    public function update($id)
    {

        $this->load->model('Student_model');

        $this->form_validation->set_rules('name', 'Student Name', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data_error = [

                'error' => validation_errors()


            ];

            $this->session->set_flashdata($data_error);

            redirect('Site');
        } else {
            $result = $this->Student_model->updatestudent([
                
                'name' => $this->input->post('name'),
                'roll' => $this->input->post('roll'),
                'class' => $this->input->post('class'),
                'mentor' => $this->input->post('mentor'),


            ], $id);

            if ($result) {
                $this->session->set_flashdata('inserted', 'your data has been successfully updated!');
            }
            redirect('Site');
        }

        

    }

    public function deletestudent($id)
    {
         $result = $this->Student_model->deleteItem($id);

    if ($result) {
        $this->session->set_flashdata('inserted', 'The student has been deleted successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to delete the student. Please try again.');
    }

    redirect('Site');
        
    }

}

?>