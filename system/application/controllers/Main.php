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

            $dataView['modal'] = '1';
            $this->load->view('controller', $dataView);

            $angles = $this->Angle_model->select_angle();

            $port = "COM3";
            exec("MODE $port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");

            $fp = fopen($port, 'w+');
            fwrite($fp, "q-".$angles['attack']);
            fclose($fp);
            sleep(1);

            exec("MODE $port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");
            $fp = fopen($port, 'w+');
            fwrite($fp, "w-".$angles['elevator']);
            fclose($fp);
            sleep(1);

            exec("MODE $port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");
            $fp = fopen($port, 'w+');
            fwrite($fp, "r-".$angles['body']);
            fclose($fp);
            sleep(1);

            exec("MODE $port BAUD=9600 PARITY=n DATA=8 XON=on STOP=1");
            $fp = fopen($port, 'w+');
            if ($angles['claw'] == "open"){
                fwrite($fp, "e-120");
            }elseif($angles['claw'] == "close"){
                fwrite($fp, "e-65");
            }
            fclose($fp);
            sleep(1);
        }
    }
}
?>