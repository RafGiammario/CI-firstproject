<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    function __construct() {
        parent::__construct();

        $loggedIn = $this->session->userdata('logged-in');

        if (!isset($loggedIn) || $loggedIn != true) {
            show_404();
        }
    }

    function index() {
        $data["todos"] = $this->model->readAll('todo');

        $this->load->view('list', $data);
    }

    function todo($id) {
        $data['todo'] = $this->model->read('todo', $id);

        $this->load->view('update', $data);
    }

    function  newToDo() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('todo', 'ToDo Text', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'text' => $this->input->post('todo'),
                'createdAt' => date('Y-m-d H:i:s')
            );

            $this->model->create('todo', $data);

            redirect('app');
        }
    }

    function check($id) {
        $data = array(
            'completed' => true,
        );

        $this->model->update('todo', $id, $data);

        redirect('app');
    }

    function uncheck($id) {
         $data = array(
            'completed' => false,
        );

        $this->model->update('todo', $id, $data);

        redirect('app');
    }

    function update() {
        $id = $this->input->post('id');

        $data = array(
            'text' => $this->input->post('text'),
        );

        $this->model->update('todo', $id, $data);

        redirect('app');
    }

    function delete($id) {
        $this->model->delete('todo', $id);

        redirect('app');
    }

}