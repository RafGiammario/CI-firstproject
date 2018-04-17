<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    function index() {
        $data["todos"] = $this->model->readToDos();

        $this->load->view('list', $data);
    }

    function todo($id) {
        $data['todo'] = $this->model->readToDo($id);

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

            $this->model->createToDO($data);

            redirect('app');
        }
    }

    function check($id) {
        $data = array(
            'completed' => true,
        );

        $this->model->updateToDo($id, $data);

        redirect('app');
    }

    function uncheck($id) {
         $data = array(
            'completed' => false,
        );

        $this->model->updateToDo($id, $data);

        redirect('app');
    }

    function update() {
        $id = $this->input->post('id');

        $data = array(
            'text' => $this->input->post('text'),
        );

        $this->model->updateToDo($id, $data);

        redirect('app');
    }

    function delete($id) {
        $this->model->deleteToDo($id);

        redirect('app');
    }

}