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
        $data["todos"] = $this->model->readAll('todo', $this->session->userdata('id'));

        $this->load->view('list', $data);
    }

    ////Methods for ToDo
    function todo($id) {
        $data['todo'] = $this->model->read('todo', $id, $this->session->userdata('id'));

        if ($data['todo']) {
            $this->load->view('update', $data);
        } else {
            show_404();
        }

    }

    function  newToDo() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('todo', 'ToDo Text', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_access' => $this->session->userdata('id'),
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

        $this->model->update('todo', $id, $data, $this->session->userdata('id'));

        $data["todos"] = $this->model->readAll('todo', $this->session->userdata('id'));

        $this->load->view('ajax/list', $data);
    }

    function uncheck($id) {
         $data = array(
            'completed' => false,
        );

        $this->model->update('todo', $id, $data, $this->session->userdata('id'));

        $data["todos"] = $this->model->readAll('todo', $this->session->userdata('id'));

        $this->load->view('ajax/list', $data);
    }

    function update() {
        $id = $this->input->post('id');

        $data = array(
            'text' => $this->input->post('text'),
        );

        $this->model->update('todo', $id, $data, $this->session->userdata('id'));

        redirect('app');
    }

    function delete($id) {
        $this->model->delete('todo', $id, $this->session->userdata('id'));

        $data["todos"] = $this->model->readAll('todo', $this->session->userdata('id'));

        $this->load->view('ajax/list', $data);
    }

    ////Methods for Attachment
    function new_attachment() {
        if (!($_FILES['file']['size'] == 0)) {
            $this->load->library('upload');

            $config['upload_path'] = "./resources/attachments";
        } else {

        }
    }

}