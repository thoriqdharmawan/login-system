<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        if($this->session->userdata('email')){
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //jika validasi sukses
            $this->_login();
        }
    }

    private function _login() 
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
 
        //usernya ada
        if($user) {
            //jika usernya aktif/tidak
            if($user['is_active'] == 1){
                //cek password
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    
                    if($user['role_id'] == 1 ){
                        redirect('admin');
                    } else {
                        redirect('user');
                    }

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">Wrong password!</div>');
                    redirect('auth');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">This Email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            //tidak ada user
            $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }
    
    public function registration()
    {
        if($this->session->userdata('email')){
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont mathc!',
            'min_length' => 'Password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        
        if($this->form_validation->run() == false) {
            $data['title'] = 'WPU User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name'      => htmlspecialchars($this->input->post('name', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'image'     => 'default.jpg',
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'   => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // $this->db->insert('user', $data);

            $this->_sendEmail();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please login</div>');
            redirect('auth');
        }
    }

    private function _sendEmail()
    {
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'portofoliothoriq@gmail.com',
            'smtp_pass'     => 'ayambakargoreng',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('portofoliothoriq@gmail.com', 'Thoriq Dharmawan');
        $this->email->to('thoriqdharmawan378@gmail.com');
        $this->email->subject('Testing');
        $this->email->message('Hello World!');

        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    
    public function Logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}