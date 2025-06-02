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
         $data['student'] = $this->Address_model->getAllstudent();

        //  print_r($data);
        //  echo "<pre>";
        //  print_r($data['Address_details']);
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
                
                'student_id' => $this->input->post('student_id'),
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
        $this->load->view('Address_edit_view', $data);
        //   print_r($data);
        // die;
    }
    public function update($id)
    {

        $this->load->model('Address_model');

        $this->form_validation->set_rules('FatherName', 'MotherName', 'Address', 'Disti', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data_error = [

                'error' => validation_errors()


            ];

            $this->session->set_flashdata($data_error);

            redirect('Stud_add');
        } else {
            $result = $this->Address_model->UpdateAddressStudent([
                
                 'student_id' => $this->input->post('student_id'),
                'Father_name' => $this->input->post('fathername'),
                'Mother_name' => $this->input->post('motherName'),
                'Address' => $this->input->post('address'),
                'Disti' => $this->input->post('Disti'),


            ], $id);

            if ($result) {
                $this->session->set_flashdata('inserted', 'your data has been successfully updated!');
            }
            redirect('Stud_add');
        }

        

    }

    public function deleteAddressStudent($id)
    {
         $result = $this->Address_model ->deleteItem($id);

    if ($result) {
        $this->session->set_flashdata('inserted', 'The student has been deleted successfully.');
    } else {
        $this->session->set_flashdata('error', 'Failed to delete the student. Please try again.');
    }

    redirect('Stud_add');
        
    }

}

?>