<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function index()
            {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('attack', 'attack', 'required');
        $this->form_validation->set_rules('elevator', 'elevator', 'required');
        $this->form_validation->set_rules('body', 'body', 'required');
        $this->form_validation->set_rules('claw', 'claw', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $dataView['modal'] = '0';
            $this->load->view('controller', $dataView);
        }
        else
        {
            $this->load->model('Angle_model');
            $this->Angle_model->insert_angle();

            $angles = $this->Angle_model->select_angle();
            $dataView['modal'] = '1';
            $dataView['angles'] = $angles;
            $this->load->view('controller', $dataView);
        }
    }
}
?>