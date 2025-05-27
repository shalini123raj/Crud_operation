<?php
class Site extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $data['student_details'] = $this->Student_model->getAllStudent();
       
        // print_r($data['student_details']);
        // die;
        $this->load->view('superadmin/base',$data);
    }
    public function getStudentByid($id)
    {
        //  echo "hrlk";
        $this->load->model('Student_model');

        $data['students'] = $this->Student_model->select('*', 'student', ['id' => $id]);;
        $this->load->view('superadmin/view', $data);
    }


    public function addstudent()
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
            $result = $this->Student_model->insert_student([
                'name' => $this->input->post('name'),
                'roll' => $this->input->post('roll'),

            ]);
            if ($result) {
                $this->session->set_flashdata('inserted', 'your data has been successfully added!');
            }
            redirect('Site ');
        }
    }

    public function editstudent($id)
    {
         $data['singlestudent'] = $this->Student_model->getsinglestudent($id);
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

            ], $id);
            if ($result) {
                $this->session->set_flashdata('updated', 'your data has been successfully updated!');
            }
            redirect('Site');
        }
        

    }

}
