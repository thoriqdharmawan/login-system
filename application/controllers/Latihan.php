<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan extends CI_Controller {

    public function index()
    {       
        $data['title'] = 'Crud';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //seluruh data user
        
        $data['komik'] = $this->db->get('komik')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('latihan/crud', $data);
        $this->load->view('templates/footer');

    }
}
