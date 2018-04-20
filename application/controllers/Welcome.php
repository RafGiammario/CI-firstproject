<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()	{
		$this->load->view('global/head');
		$this->load->view('login');
		$this->load->view('global/foot');
	}

	public function login() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->model->validateCredential($email, $password);

            if ($user) {
                $data = array(
                    'id' => $user->id,
                    'email' => $user->email,
                    'logged-in' => true,
                );

                $this->session->set_userdata($data);

                redirect('app');
            } else {
                redirect('welcome');
            }

        }
    }
}
