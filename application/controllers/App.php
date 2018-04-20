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

    function createContents() {
        $data["todos"] = $this->model->readAll('todo', 'id_access', $this->session->userdata('id'));

        foreach ($data['todos'] as $todo) {
            $attachments = $this->model->readAll('attachment', 'id_todo', $todo->id);

            if ($attachments) {
                $todo->attachments = $attachments;
            }
        }

        return $data;
    }

    function index() {
        $data = $this->createContents();

        $this->load->view('global/head');
        $this->load->view('list', $data);
        $this->load->view('global/foot');
    }

    ////Methods for ToDo
    function todo($id) {
        $data['todo'] = $this->model->read('todo', $id, $this->session->userdata('id'));

        if ($data['todo']) {
            $this->load->view('global/head');
            $this->load->view('update', $data);
            $this->load->view('global/foot');
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

        $data = $this->createContents();

        $this->load->view('ajax/list', $data);
    }

    function uncheck($id) {
         $data = array(
            'completed' => false,
        );

        $this->model->update('todo', $id, $data, $this->session->userdata('id'));

        $data = $this->createContents();

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

        $data = $this->createContents();

        $this->load->view('ajax/list', $data);
    }

    ////Methods for Attachment
    function new_attachment($id) {
         if (!($_FILES['file']['size'] == 0)) {
             $this->load->library('upload');

             $config['upload_path'] = './resources/attachments';
             $config['allowed_types'] = "jpg|png";
             $config['overwrite'] = false;

             $this->upload->initialize($config);

             if ($this->upload->do_upload('file')) {

                 $file = $this->upload->data();

                 $data = array(
                     'id_todo' => $id,
                     'attachment' => $file['raw_name'],
                     'type_attachment' => $file['file_ext'],
                 );

                 $this->model->create('attachment', $data);

                 redirect('app');
             }
         }
    }

}