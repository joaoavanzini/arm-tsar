<?php

class Angle_model extends CI_Model
{
    public function insert_angle()
    {    
        $data = array(
            'attack' => $this->input->post('attack'),
            'elevator' => $this->input->post('elevator'),
            'body' => $this->input->post('body'),
            'claw' => $this->input->post('claw')
        );
        
        return $this->db->insert('moves', $data);
    }
    
    public function select_angle(){
        $data = array(
            'attack' => $this->input->post('attack'),
            'elevator' => $this->input->post('elevator'),
            'body' => $this->input->post('body'),
            'claw' => $this->input->post('claw')
        );
        return $data;
    }
}
?>