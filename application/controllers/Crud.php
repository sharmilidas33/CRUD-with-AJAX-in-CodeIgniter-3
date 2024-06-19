<?php
class Crud extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ModCrud'); // Ensure the model is loaded
    }

    public function index() {
        $data['allRecords'] = $this->ModCrud->getAllRecords();
        $this->load->view('home', $data);
    }

    public function addUser() {
        if (!$this->input->is_ajax_request()) {
            $this->session->set_flashdata('error', 'Please call the AJAX Request');
            redirect('crud');
        } else {
            $data['stName'] = $this->input->post('name', true);
            $data['stEmail'] = $this->input->post('email', true);
            $data['stPassword'] = $this->input->post('password', true);
            $data['stDate'] = date('Y-m-d H:i:s'); // Correct timestamp format

            // Call the model method to insert data
            $result = $this->ModCrud->addNewUser($data);

            if (is_integer($result)) {
                $lastRecord = $this->ModCrud->getLastRecord($result);
                if (count($lastRecord) === 1) {
                    echo json_encode($lastRecord);
                } else {
                    echo 'Doesn\'t work';
                }
            } else {
                echo "Failed to add user";
            }
        }
    }
}
?>
